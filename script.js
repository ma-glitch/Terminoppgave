function betalbtn() {
  document.getElementById("betal").style.display = "block";
  close()
}

setTimeout(close(), 30000);

function close() {
  document.getElementById("betal").style.display = "none";
}
