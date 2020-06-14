$(function () {
	const canvas = $('#canvas').get(0);
	const ctx = canvas.getContext("2d");
	canvas.style.cursor = "crosshair";
	let mouse_pressed = false;
	let mouse = {
		x: undefined,
		y: undefined
	}
	let mouse_history = mouse
	let drawStyle = 'pencil'
	ctx.lineWidth = 2

	$('#clear-button').click(function () {
		ctx.fillStyle = 'white'
		ctx.fillRect(0, 0, 500, 500);
		updateURL()
	})
	$('#black-pencil').click(function () {
		ctx.strokeStyle = 'black'
		drawStyle = 'pencil'
		ctx.lineWidth = 2
	})
	$('#red-pencil').click(function () {
		ctx.strokeStyle = 'red'
		drawStyle = 'pencil'
		ctx.lineWidth = 2
	})
	$('#green-pencil').click(function () {
		ctx.strokeStyle = 'green'
		drawStyle = 'pencil'
		ctx.lineWidth = 2
	})
	$('#blue-pencil').click(function () {
		ctx.strokeStyle = 'blue'
		drawStyle = 'pencil'
		ctx.lineWidth = 2
	})
	$('#black-fill').click(function () {
		ctx.fillStyle = 'black'
		drawStyle = 'fill'
	})
	$('#red-fill').click(function () {
		ctx.fillStyle = 'red'
		drawStyle = 'fill'
	})
	$('#green-fill').click(function () {
		ctx.fillStyle = 'green'
		drawStyle = 'fill'
	})
	$('#blue-fill').click(function () {
		ctx.fillStyle = 'blue'
		drawStyle = 'fill'
	})
	$('#big-eraser').click(function () {
		ctx.strokeStyle = 'white'
		ctx.lineWidth = 12
		drawStyle = 'erase'
	})
	$('#medium-eraser').click(function () {
		ctx.strokeStyle = 'white'
		ctx.lineWidth = 9
		drawStyle = 'erase'
	})
	$('#small-eraser').click(function () {
		ctx.strokeStyle = 'white'
		ctx.lineWidth = 6
		drawStyle = 'erase'
	})
	$('#black-brush').click(function () {
		ctx.strokeStyle = 'black'
		drawStyle = 'brush'
		ctx.lineWidth = 6
	})
	$('#red-brush').click(function () {
		ctx.strokeStyle = 'red'
		drawStyle = 'brush'
		ctx.lineWidth = 6
	})
	$('#green-brush').click(function () {
		ctx.strokeStyle = 'green'
		drawStyle = 'brush'
		ctx.lineWidth = 6
	})
	$('#blue-brush').click(function () {
		ctx.strokeStyle = 'blue'
		drawStyle = 'brush'
		ctx.lineWidth = 6
	})
	$('#small-pencil').click(function () {
		drawStyle = 'pencil'
		ctx.lineWidth = 1
	})
	$('#medium-pencil').click(function () {
		drawStyle = 'pencil'
		ctx.lineWidth = 2
	})
	$('#big-pencil').click(function () {
		drawStyle = 'pencil'
		ctx.lineWidth = 3
	})
	$('#small-brush').click(function () {
		drawStyle = 'brush'
		ctx.lineWidth = 4
	})
	$('#medium-brush').click(function () {
		drawStyle = 'brush'
		ctx.lineWidth = 6
	})
	$('#big-brush').click(function () {
		drawStyle = 'brush'
		ctx.lineWidth = 8
	})


	$('#canvas').mousedown(function () {
		mouse_pressed = true
	})


	$('#canvas').mouseup(function () {
		mouse_pressed = false
	});


	$('#canvas').mousemove(function () {
		if (mouse_pressed == true && (drawStyle == 'pencil' || drawStyle == 'erase' || drawStyle == 'brush')) {
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
		if (drawStyle == 'fill') {
			ctx.fillRect(0, 0, 500, 500);
		}
		updateURL()

	})
	function updateURL() {
		let canvasForURL = $('#canvas')
		let dataURL = canvasForURL[0].toDataURL();
		$.post('../draw/updateCanvas.php', {
			dataURL: dataURL
		})
	}

// //	interval for if user doesnt release mouse for 0.7 seconds
// 	let int = setInterval(updateURL, 700)
})