const http = require('http')
const fs = require('fs')
const port = process.argv[2]
const path = process.argv[3]

const server = http.createServer(function (request, response) {
   request.setEncoding('utf-8')
   request.on('readable', function () {
      var file = fs.createReadStream(path,'utf-8')
      file.pipe(text)
   })
   request.on('end', function () {
      console.log(text)
   })
   request.on('error', function (error) {
      console.log(error)
   })
})
server.listen(port)

var text = undefined