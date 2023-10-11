function betalbtn() {
  var element = document.getElementById("betal");
  element.classList.toggle("betalblock");
  setTimeout(close(), 5000);
}



function close() {
 var element = document.getElementById("betal");
 element.classList.toggle("betal");
}
