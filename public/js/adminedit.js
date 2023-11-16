const fileInput = document.getElementById("fileInput");
const imagePreview = document.getElementById("imagePreview");

fileInput.addEventListener("change", (event) => {
  const file = event.target.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = (event) => {
      imagePreview.src = event.target.result;
    };
    imagePreview.classList.remove("d-none");
    reader.readAsDataURL(file);
  }
});

function retundAdmin(){
    window.history.back();
}
