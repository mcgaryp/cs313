const fs = require('fs');
var numOfLines = undefined;

function readFile(callback) {
   fs.readFile(process.argv[2], function doneReading(error, buffer) {
      numOfLines = buffer.toString().split('\n').length - 1;
      callback();
   });
}

function logNumber() {
   console.log(numOfLines);
}

readFile(logNumber);