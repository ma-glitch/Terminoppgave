var mySql = require("sync-mysql");

var connection = new mySql({
  host: "localhost",
  user: "root",
  password: "Admin",
  database: "BotDB",
});

var passord = connection.query("SELECT * from login");

function login() {
  var bruker = document.getElementById("bruker");
  var passord = document.getElementById("passord");

  var loginnavn = "SELECT * from login WHERE " + bruker + "= '" + passord + "'";

  var logetin = connection.query(loginnavn);
  if (logetin < 1) {
    console.log("det fungerer å loge in");
  } else if (logetin === 0) {
    console.log("ingen med det navnet");
  }
}

function displaymembers() {
  var visfolk = connection.query("SELECT * from login");

  for (var i = 0; i < visfolk.length; i++) {
    const HTMLString =
      "<tr>" +
      "<td>" +
      visfolk[i].brukernavn +
      "</td>" +
      "<td>" +
      visfolk[i].boter +
      "</td>" +
      "<td>" +
      visfolk[i].ubetalt +
      "</td>" +
      "</tr>";
    document.getElementById("score").innerHTML += HTMLString;
  }
}

function betalbtn() {
  document.getElementById("betal").style.display = "block";
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
