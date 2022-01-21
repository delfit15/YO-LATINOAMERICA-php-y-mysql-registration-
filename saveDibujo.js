
 document.getElementById('snap').addEventListener('click', function() {
  context.drawImage(canvas, 0, 0, 400, 300);
  canvas.toBlob(function (blob) {
    var formData = new FormData();
    formData.append('snapshot', blob);
    formData.append('image-description', 'MFW Im writing an answer on SO');

    var req = new XMLHttpRequest();
    req.open('POST', 'uploadimage.php');

    req.onload = function () {
      console.log('upload complete, server response:', req.response);
    };

    console.log('uploading snapshot...');
    req.send(formData);
  });
});