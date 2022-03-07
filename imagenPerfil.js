
// al clickear el input con ID imagen, abrimos el buscador de archivos y la mostramos al elegir una.
function triggerClick(e) {
  document.querySelector('#imagen').click();
}
function displayImage(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }

}