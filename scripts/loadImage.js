$(document).ready(function () {
    function loadImage() {
        $.get('draw/data/canvasURL.txt', function (data) {
            // console.log('loading' + data)
            $('#drawing').attr('src', data);
        });
    }
    loadImage();
    let interval = setInterval(loadImage, 1000);
});