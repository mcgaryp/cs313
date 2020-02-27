const mymodule = require('./mymodule.js')

function logDir(error, file) {
   if (!error) {
      console.log(file)
   } else console.log(error)
}

mymodule(process.argv[2], process.argv[3], logDir)