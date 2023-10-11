function betalbtn() {
  document.getElementById("betal").style.display = "block";
  setTimeout(close(), 10000);
}



function close() {
  console.log("timer funker");
  document.getElementById("betal").style.display = "none";
}
