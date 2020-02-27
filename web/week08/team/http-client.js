const url = process.argv[2];
const http = require('http')

http.get(url, function callback(response) {
   response.on('data', function (data) {
      console.log(data.toString())
   })

   response.on('error', function (error) {
      console.log(error)
   })

   response.on('end', function () {
      return
   })
})


// SOLUTION
// const http = require('http')
    
//     http.get(process.argv[2], function (response) {
//       response.setEncoding('utf8')
//       response.on('data', console.log)
//       response.on('error', console.error)
//     }).on('error', console.error)