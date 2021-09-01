// Your code here
var form = document.querySelector('form');

var inputs = form.getElementsByTagName("input");
var firstname = inputs[0];
var lastname = inputs[1];

form.addEventListener('submit', function (event) {
	event.preventDefault();
    let fname = firstname.value;
    let lname = lastname.value;
    let username = lname.substr(0,3).toUpperCase() + fname.substr(0,2).toUpperCase();
    document.getElementById("answer").textContent = username;
});