let buttons = document.getElementsByClassName("modal-button");
for (let i = 0; i < buttons.length; i++) {
   let button = buttons[i];
   let modalID = button.getAttribute('data-target');
   let modal = document.getElementById(modalID);
   button.addEventListener('click', function() {
      // do something to my modal!
      $(modal).modal('show');
   });
}

$(document).ready(function(){
   $('.toast').toast('show');
 });