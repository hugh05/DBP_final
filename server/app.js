var db = require('./db.js');
var http = require('http');

var port = 80;

var app = http.createServer(function(req, res){

    db.query('SELECT * FROM recycleb', function(error, result){
      console.log(result)

      var html =
      ` <!doctype html>
      <html>
      <head>
      <title>nodejs - mysql </title>
      <meta charset="utf-8">
      </head>
      <body> nodejs - mysql

      <p>${result[0].id} / ${result[0].address} / ${result[0].grp}</p>
      <p>${result[1].id} / ${result[1].address} / ${result[1].grp}</p>
      <p>${result[2].id} / ${result[2].address} / ${result[2].grp}</p>
      <p>${result[3].id} / ${result[3].address} / ${result[3].grp}</p>
      <p>${result[4].id} / ${result[4].address} / ${result[4].grp}</p>
      <p>${result[5].id} / ${result[5].address} / ${result[5].grp}</p>
      <p>${result[6].id} / ${result[6].address} / ${result[6].grp}</p>

      </body>
      </html> `


      res.writeHead(200);
      res.end(html);

    });

}).listen(port, "0.0.0.0");

console.log('Server running at http://0.0.0.0:'+port);
