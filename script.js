function betalbtn() {
  document.getElementById("betal").style.display = "block";
  document.getElementById("betal").style.display = "none";
  setTimeout(close(), 10000);
}



function close() {
  document.getElementById("betal").style.display = "none";
}
