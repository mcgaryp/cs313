const fs = require('fs');

function readFile(filename) {
   var buffer = fs.readFileSync(filename);
   const string = buffer.toString();
   const stringArray = string.split('\n');

   return stringArray.length - 1;
}

console.log(readFile(process.argv[2]));