// Change the color with a button
function changeColor() {
   var color = document.getElementById("changeCoralDiv").value;
   document.getElementById("coralDiv").style.backgroundColor = color;
}

// Change the color of the item to what is given in the text box
$(document).ready(function () {
   $("#changeGreenButton").click(function () {
       $("#greenDiv").css("backgroundColor", $("#changeGreenDiv").val())
   })
});

// toggle fade in or out
$(document).ready(function() {
   $("#changeBlueButton").click(function() {
      $("#blueDiv").fadeToggle(2000);
   });
});
