<?php

namespace App\Http\Controllers;

use App\Models\Lectura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use ZipArchive;

class LecturaController extends Controller
{
    public function create()
    {
        $grados = DB::table('grado')->select('id', 'nombre')->orderByDesc('id')->get();
        return view('lectura', ['grados' => $grados]);
    }

    public function registrar(Request $request)
    {
        $lectura = new Lectura();
        $nombre_lectura = $request->input('nombre');
        $lectura->nombre = $nombre_lectura;
        $tiempo_lectura = $request->input('tiempo');
        $lectura->tiempo = $tiempo_lectura;
        $lectura->grado_id = $request->input('grado');
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $lectura->imagen = $image->getClientOriginalName();
        }
        $lectura->save();

        $image->move(public_path('lecturas/' . $lectura->id), $image->getClientOriginalName());

        try {
            return redirect()->route('lectura')->with('success', 'La lectura se ha creado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('lectura')->with('error', 'Ha habido un error al crear la lectura: ' . $e->getMessage());
        }
    }

    public function eliminar($id)
    {
        $lectura = Lectura::find($id);

        if ($lectura) {
            $lectura->delete();
            return redirect()->back()->with('success', 'La lectura ha sido eliminada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'La lectura no se pudo encontrar.');
        }
    }

    public function editarLectura($id)
    {
        $lectura = Lectura::find($id);

        return view('editar-lectura', compact('lectura'));
    }

    public function actualizarLectura(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'tiempo' => 'required|integer',
            'imagen' => 'image|max:1024'
        ]);

        $lectura = Lectura::find($id);
        $lectura->nombre = $request->input('nombre');
        $lectura->tiempo = $request->input('tiempo');

        if ($request->hasFile('imagen')) {
            Storage::delete($lectura->imagen);

            $path = $request->file('imagen')->store('public/lecturas');
            $lectura->imagen = $path;
        }

        $lectura->save();

        try {
            return redirect()->route('lectura')->with('success', 'La lectura se ha actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('lectura')->with('error', 'Ha habido un error al actualizar la lectura: ' . $e->getMessage());
        }
    }


    public function lecturas()
    {
        $lecturas = DB::table('lectura')->join('grado', 'lectura.id', '=', 'grado.id')
            ->select('lectura.id AS id', 'lectura.nombre AS nombre', 'lectura.tiempo AS tiempo', 'lectura.imagen AS imagen', 'grado.nombre AS grado')
            ->orderByDesc('id')->get();
        return view('lectura', ['lecturas' => $lecturas]);
    }
}
