const http = require('http')
const url = process.argv[2]
var message = ""

http.get(url, function (response) {
   response.setEncoding('utf-8')
   response.on('data', function (data) {
      message += data
   })
   response.on('end', function () {
      console.log(message.length)
      console.log(message)
   })
   response.on('error', function (error) {console.log(error)})
}).on('error', function (error) {console.log(error)})
