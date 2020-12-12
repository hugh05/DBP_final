var db = require('./db.js');
var http = require('http'); // 서버 구동을 위함
var fs = require('fs'); // 파일 읽어오고 쓰기를 위함

var port = 80;

//404: 페이지 오류가 발생하였을 때
function send404Message(response){
  response.writeHead(404,{"Content-Type":"text/plain"});
  response.write("404 에러");
  response.end();
}


//200: 정상적인 요청일 때
function onRequest(request, response){
  if(request.method =="GET" && request.url == '/'){
          response.writeHead(200,{"Content-Type":"text/html"});
          fs.createReadStream("./map.html").pipe(response);

  }else if (request.method == "GET" && request.url == '/index.css') {
    response.writeHead(200,{"Content-Type":"text/css"});
    fs.createReadStream("./index.css").pipe(response);
    //  res.end(html);
  }else{
    //html파일이 없을 경우
    send404Message(response);
  }
}



 http.createServer(onRequest).listen(port, "0.0.0.0");

console.log('Server running at http://0.0.0.0:'+port);
