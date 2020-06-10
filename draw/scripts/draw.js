$(function () {
	const canvas = $('#canvas').get(0);
	const ctx = canvas.getContext("2d");
	canvas.style.cursor = "crosshair";
	let mouse_pressed = false;
	let mouse = {
		x: undefined,
		y: undefined
	}
	let drawStle = ''
	let mouse_history = mouse
	drawStle = 'pencil'
	ctx.lineWidth = 3

	$('#clear-button').click(function () {
		ctx.fillStyle = 'white'
		ctx.fillRect(0, 0, 500, 500);
	})
	$('#black-pencil').click(function () {
		ctx.strokeStyle = 'black'
		drawStle = 'pencil'

	})
	$('#red-pencil').click(function () {
		ctx.strokeStyle = 'red'
		drawStle = 'pencil'
		ctx.lineWidth = 3
	})
	$('#green-pencil').click(function () {
		ctx.strokeStyle = 'green'
		drawStle = 'pencil'
		ctx.lineWidth = 3
	})
	$('#blue-pencil').click(function () {
		ctx.strokeStyle = 'blue'
		drawStle = 'pencil'
		ctx.lineWidth = 3
	})
	$('#black-fill').click(function () {
		ctx.fillStyle = 'black'
		drawStle = 'fill'
	})
	$('#red-fill').click(function () {
		ctx.fillStyle = 'red'
		drawStle = 'fill'
	})
	$('#green-fill').click(function () {
		ctx.fillStyle = 'green'
		drawStle = 'fill'
	})
	$('#blue-fill').click(function () {
		ctx.fillStyle = 'blue'
		drawStle = 'fill'
	})
	$('#big-eraser').click(function () {
		ctx.strokeStyle = 'white'
		ctx.lineWidth = 12
		drawStle = 'pencil'
	})
	$('#medium-eraser').click(function () {
		ctx.strokeStyle = 'white'
		ctx.lineWidth = 9
		drawStle = 'pencil'
	})
	$('#small-eraser').click(function () {
		ctx.strokeStyle = 'white'
		ctx.lineWidth = 6
		drawStle = 'pencil'
	})


	$('#canvas').mousedown(function () {
		mouse_pressed = true
	})


	$('#canvas').mouseup(function () {
		mouse_pressed = false
	});


	$('#canvas').mousemove(function () {
		if (mouse_pressed == true && drawStle == 'pencil') {
			mouse_history = {
				x: event.x,
				y: event.y
			}
		}
		else {
			mouse_history = {
				x: undefined,
				y: undefined
			}
		}




		ctx.beginPath();
		ctx.moveTo(mouse_history.x, mouse_history.y);
		ctx.lineTo(mouse.x, mouse.y);
		ctx.stroke();
		mouse = {
			x: event.x,
			y: event.y
		}
	})

	$('#canvas').click(function () {
		if (drawStle == 'fill') {
			ctx.fillRect(0, 0, 500, 500);
		}
	})
})