const fs = require('fs');
const path = require('path');
const dirPath = process.argv[2];
const filter = process.argv[3];
var fileList = undefined;

function createDirList(callback) {
   fs.readdir(dirPath, function dirList(error, list) {
      if (error) {
         console.log(error);
         return;
      }
      var extension = '.' + filter; 
      
      fileList = new Array();

      for(var i = 0; i < list.length; i++) {
         if (path.extname(list[i]) == extension) {
            fileList.push(list[i]);
         }
      }

      callback();
   });
}

function logDir() {
   for(var i = 0; i < fileList.length; i++) {
      console.log(fileList[i]);
   }
}

createDirList(logDir);

// SOLUTION
// const fs = require('fs')
//     const path = require('path')
    
//     const folder = process.argv[2]
//     const ext = '.' + process.argv[3]
    
//     fs.readdir(folder, function (err, files) {
//       if (err) return console.error(err)
//       files.forEach(function (file) {
//         if (path.extname(file) === ext) {
//           console.log(file)
//         }
//       })
//     })