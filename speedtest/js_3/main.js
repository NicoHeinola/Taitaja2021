// Your code here
var form = document.querySelector('form');

var input = form.getElementsByTagName("input")[0];

form.addEventListener('submit', function (event) {
    event.preventDefault();
    let original = input.value;
    korvaaKirjaimet(original)
});

function korvaaKirjaimet(teksti){
    let changed = teksti.replaceAll("a", "u");
    console.log("Alkuperäinen: " + teksti + ", Muutettu: " + changed)
}