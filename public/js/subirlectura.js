const imageUploadInput = document.getElementById("image-upload-input");
imageUploadInput.addEventListener("change", function () {
    const fileName = this.value.split("\\").pop();
    this.parentNode.querySelector(".image-upload-name").innerHTML = fileName;
});
