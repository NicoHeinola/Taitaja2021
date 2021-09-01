// Your code here
var moving = false;
var move_element = null;
var pos = 0;

function moveSquare(element) {
    element.style.position = "relative";
    move_element = element;
    moving = true;
}

function move() {
    if (moving) {
        if (pos < 500) {
            pos += 4;
            move_element.style.left = pos + "px";
        } else {
            move_element.style.left = "500px";
            moving = false;
        }
    }
}

setInterval(move, 10)