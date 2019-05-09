let e1;
let e2;

function setup() {
    var canvas = createCanvas(90, 40);
    canvas.parent('con');
    noStroke();
    e1 = new Eye(20, 20, 40);
    e2 = new Eye(70, 20, 40);
}

function draw() {
    background(64);
    e1.update(mouseX, mouseY);
    e2.update(mouseX, mouseY);
    e1.display();
    e2.display();
}

function Eye(tx, ty, ts) {
    this.x = tx;
    this.y = ty;
    this.size = ts;
    this.angle = 0;

    this.update = function(mx, my) {
        this.angle = atan2(my - this.y, mx - this.x);
    };

    this.display = function() {
        push();
        translate(this.x, this.y);
        fill(255);
        ellipse(0, 0, this.size, this.size);
        rotate(this.angle);
        fill(51);
        ellipse(this.size / 4, 0, this.size / 2, this.size / 2);
        pop();
    };
}