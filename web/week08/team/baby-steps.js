console.log(printSum());

function printSum() {
   var i = 2;
   var total = 0;
   while (i < process.argv.length) {
      total += +process.argv[i];
      i++;
   }
   return total;
}