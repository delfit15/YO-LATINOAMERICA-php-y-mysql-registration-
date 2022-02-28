
// función que convierte el canvas de paint en una imagen y lo sube a la base de datos. 

document.getElementById('drawing_end').addEventListener('click', function() {



});



/* var canvas = document.getElementById("defaultCanvas0");
var dataURL = canvas.toDataURL("image/png");
document.getElementById('hidden_data').value = dataURL;

var xhr = new XMLHttpRequest();
xhr.open('POST', 'saveDibujo.php', true);

// le avisamos cuando el dibujo se subió a la base de datos. 
xhr.upload.onprogress = function(e) {
    if (e.lengthComputable) {
        var percentComplete = (e.loaded / e.total) * 100;
        console.log(percentComplete + '% uploaded');
        alert('Succesfully uploaded');
    }
}; */