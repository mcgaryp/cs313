const net = require('net')
const portNumber = process.argv[2]
const server = net.createServer(function (socket) {
   socket.end(function () {
   })
})
server.listen(portNumber, function () {
   console.log(today)
})

var today = new Date()