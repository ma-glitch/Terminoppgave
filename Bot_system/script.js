var mySql = require('sync-mysql')

var connection = new mySql({
  host: 'localhost',
  user: 'root',
  password: 'Admin',
  database: "BotDB"
});





  function betalbtn() {
  document.getElementById("betal").style.display = "block";
  }

   function openForm() {
    document.getElementById("myForm").style.display = "block";
   }
   function closeForm() {
    document.getElementById("myForm").style.display = "none";
   }