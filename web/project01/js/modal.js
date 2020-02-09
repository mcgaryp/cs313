let butons = document.getElementsByClassName("modal-button");
for (let i = 0; i < buttons.length; i++) {
   let button = buttons[i];
   console.log(button);
   let modalID = button.getAtrributes('data-target');
   console.log(modalID);
   let modal = document.getElementById(modalID);
   console.log(modal);
   button.addEventListener('click', function() {
      // do something to my modal!
      modal.classList.add("is-active");
      console.log("made it to the listener");
   });
}