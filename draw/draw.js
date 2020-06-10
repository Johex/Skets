var c = document.getElementById("canvas");
var ctx = c.getContext("2d");
document.getElementById("canvas").style.cursor = "crosshair";
mouse_pressed = false

canvas.addEventListener('mousedown', function () {
    mouse_pressed = true
})


canvas.addEventListener('mouseup', function () {
    mouse_pressed = false
    data = {
        x: mouse.x,
        y: mouse.y
    }
    data = JSON.stringify(data)

});

mouse = {
    x: undefined,
    y: undefined
}
canvas.addEventListener('mousemove', function () {
    if (mouse_pressed == true) {
        mouse_history = {
            x: event.x,
            y: event.y
        }
    } else {
        mouse_history = {
            x: undefined,
            y: undefined
        }
    }


    ctx.beginPath();
    ctx.moveTo(mouse_history.x - 10, mouse_history.y - 10);
    ctx.lineTo(mouse.x - 10, mouse.y - 10);
    ctx.lineWidth = 3
    ctx.stroke();
    mouse = {
        x: event.x,
        y: event.y
    }

})



