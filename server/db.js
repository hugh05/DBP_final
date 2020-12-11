var mysql = require('mysql');

var db = mysql. createConnection({
  host : 'localhost',
  user : 'admin',
  password : 'admin',
  database : 'recycleb'
});

module.exports = db;
