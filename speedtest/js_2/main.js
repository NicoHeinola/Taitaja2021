// Your code here
var popup = document.getElementById("popup");

window.addEventListener("scroll", function() {
    if (window.scrollY >= 200) {
        popup.style.display = "block";
    } else {
        popup.style.display = "none";
    }
    console.log(window.scrollY)
  });