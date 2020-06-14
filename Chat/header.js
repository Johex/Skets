$(function () {
    const c = $('#header')[0];
    const ctx = c.getContext('2d');
    c.width = window.innerWidth
    c.height = 200
    let balls = []
    let amount = 50
    let mouse = {
        x: undefined,
        y: undefined
    }

    c.addEventListener("mousemove", function () {
        mouse.x = event.x
        mouse.y= event.y
    })

    c.addEventListener("mouseout", function () {
        mouse.x = undefined
        mouse.y= undefined
    })


    class Ball {
        constructor() {
            this.r = Math.floor(Math.random() * (50 - 25)) + 25;
            this.x = Math.floor(Math.random() * (innerWidth - this.r - this.r) + this.r)
            this.y = Math.floor(Math.random() * (200 - this.r - this.r) + this.r)
            this.xdir = Math.floor(Math.random() * (3 - 1)) + 1;
            this.ydir = Math.floor(Math.random() * (3 - 1)) + 1
            this.red = Math.floor(Math.random() * 255)
            this.green = Math.floor(Math.random() * 255)
            this.blue = Math.floor(Math.random() * 255)
            this.color = 'rgb(' + this.red + ',' + this.green + ',' + this.blue + ')'
            this.color2 = 'rgb(' + this.green + ',' + this.blue + ',' + this.red + ')'
        }

        move() {
            this.x += this.xdir
            this.y += this.ydir
            if (this.x + this.r > c.width) {
                this.xdir *= -1
            }
            if (this.y + this.r > c.height) {
                this.ydir *= -1
            }
            if (this.x - this.r < 0) {
                this.xdir *= -1
            }
            if (this.y - this.r < 0) {
                this.ydir *= -1
            }
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI);
            if (mouse.x < this.x + this.r && mouse.x > this.x - this.r && mouse.y < this.y + this.r && mouse.y > this.y - this.r) {
                ctx.fillStyle = this.color2
            }
            else {
                ctx.fillStyle = this.color
            }
            ctx.fill()

        }
    }

    function animate() {
        ctx.clearRect(0,0,innerWidth,innerHeight)
        for (let i=0;i<amount;i++) {
            balls[i].move()
        }
        ctx.font = "80px Arial";
        ctx.fillStyle = 'white'
        ctx.fillText("Skets.js", innerWidth/2 - 150, 200/2 + 20);
        window.requestAnimationFrame(animate)

    }



    for (let i=0;i<amount;i++) {
        balls[i] = new Ball()
    }
    animate()
})