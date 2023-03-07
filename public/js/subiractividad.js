const imageUploadInput = document.getElementById("image-upload-input");
imageUploadInput.addEventListener("change", function () {
    const fileName = this.value.split("\\").pop();
    this.parentNode.querySelector(".image-upload-name").innerHTML = fileName;
});
const fileUploadInput = document.getElementById("file-upload-input");
fileUploadInput.addEventListener("change", function () {
    const fileName = this.value.split("\\").pop();
    this.parentNode.querySelector(".file-upload-name").innerHTML = fileName;
});
