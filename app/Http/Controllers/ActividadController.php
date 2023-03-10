<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Lectura;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ActividadController extends Controller
{
    public function subir($lectura_id)
    {
        $lectura = Lectura::find($lectura_id);

        return view('subir-actividad', ['lectura' => $lectura]);
    }

    public function registrarActividad(Request $request, $id)
    {
        
        $actividad = new Actividad();

        $actividad->lectura_id = $id;

        $actividad->nombre = $request->input('nombre');
        $actividad->archivo = "index.html";
        $actividad->lectura_id = $request->input('lectura_id');
        if ($request->hasFile("imagen")) {
            $image = $request->file("imagen");
            $actividad->imagen = $image->getClientOriginalName();
        }

        $actividad->save();

        $image->move(public_path('actividades/' . $actividad->id), $image->getClientOriginalName());
        if ($request->hasFile("archivo")) {
            $archivo = $request->file("archivo");
            if ($_FILES["archivo"]["name"]) {
                $nombre = $_FILES["archivo"]["name"];
                $ruta = $_FILES["archivo"]["tmp_name"];
                $tipo = $_FILES["archivo"]["type"];
                $zip = new ZipArchive();
                if ($zip->open($ruta) === true) {
                    $extraido = $zip->extractTo(public_path('actividades/' . $actividad->id));
                    $zip->close();
                }
            }
        }

        try {
            return redirect()->route('subir-actividad', ['id' => $actividad->lectura_id])->with('success', 'La actividad se ha subido exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('subir-actividad', ['id' => $actividad->lectura_id])->with('error', 'Ha habido un error al subir la actividad: ' . $e->getMessage());
        }
    }

    public function mostrarActividades($id) {
        $lectura = Lectura::findOrFail($id);
        $actividades = $lectura->actividades;
        return view('subir-actividad', compact('lectura', 'actividades'));
    }    
}