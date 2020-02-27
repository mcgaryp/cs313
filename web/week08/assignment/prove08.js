const http = require('http')
const url = require('url')

const server = http.createServer(function (incomingMessage, response) {
   pathname = url.parse(incomingMessage.url).pathname
   if (pathname == '/home') {
      response.writeHead(200, {"Content-Type":"text/html"})
      response.write("<h1>Welcome to the Home Page</h1>")
      response.end()
      console.log("Welcome to the Home Page");
      return
      
   } else if (pathname == '/getData') {
      response.writeHead(200, {"Content-Type":"application/json"})
      response.write("{'name':'Porter McGary', 'class':'cs313'}")
      response.end()
      console.log("{'name':'Porter McGary', 'class':'cs313'}")
      return

   } else if (pathname == '/add') {
      var query = url.parse(incomingMessage.url).query
      var strArr = query.split('&')
      var num = 0
      var message = "<h1>"

      for (i = 0; i < strArr.length; i++) {
         num += parseInt(strArr[i])
         if (i != strArr.length - 1) message += strArr[i] + " + "
         else message += strArr[i] + " = "
      }

      message += num + "</h1>"

      response.writeHead(200, {"Content-Type":"text/html"})
      response.write(message)
      response.end()
      return

   } else {
      response.writeHead(404, {"Content-Type":"text/html"})
      response.write("Page Not Found")
      response.end()
      console.log("Page Not Found")
      return
   }
})
server.listen(8000)