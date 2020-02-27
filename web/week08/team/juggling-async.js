const http = require('http')
const url1 = process.argv[2]
const url2 = process.argv[3]
const url3 = process.argv[4]
var yes1 = false
var yes2 = false
var yes3 = false
message1 = ""
message2 = ""
message3 = ""

function getMessages(url, callback, num) {
   var message = ""
   http.get(url, function (response) {
      response.setEncoding('utf-8')
      response.on('data', function (data) {
         message += data
      })
      response.on('end', function () {
         callback(num, message)
      })
      response.on('error', function (error) {return false})
   }).on('error', function (error) {return false})
}

getMessages(url1, done, '1')
getMessages(url2, done, '2')
getMessages(url3, done, '3')

function print() {
   console.log(message1)
   console.log(message2)
   console.log(message3)
}

function done(yes, message) {
   if (yes == '1') {
      yes1 = true
      message1 = message
   } 
   if (yes == '2') {
      yes2 = true
      message2 = message
   }
   if (yes == '3') {
      yes3 = true
      message3 = message
   }
   if (yes1 && yes2 && yes3) {
      print()
   }
}


//  SOLUTION
// const http = require('http')
//     const bl = require('bl')
//     const results = []
//     let count = 0
    
//     function printResults () {
//       for (let i = 0; i < 3; i++) {
//         console.log(results[i])
//       }
//     }
    
//     function httpGet (index) {
//       http.get(process.argv[2 + index], function (response) {
//         response.pipe(bl(function (err, data) {
//           if (err) {
//             return console.error(err)
//           }
    
//           results[index] = data.toString()
//           count++
    
//           if (count === 3) {
//             printResults()
//           }
//         }))
//       })
//     }
    
//     for (let i = 0; i < 3; i++) {
//       httpGet(i)
//     }