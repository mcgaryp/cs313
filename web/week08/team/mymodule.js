module.exports = function (dirName, extension, callback) { 

   const fs = require('fs')
   const path = require('path')
    
   const folder = dirName
   const ext = '.' + extension
    
   fs.readdir(folder, function (err, files) {
      if (err) return callback(err)
      files.forEach(function (file) {
         if (path.extname(file) === ext) {
         callback(null, file)
         }
      })
   })
 }

