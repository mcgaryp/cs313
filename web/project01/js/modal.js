let buttons = document.getElementsByClassName("modal-button");
for (let i = 0; i < buttons.length; i++) {
   let button = buttons[i];
   let modalID = button.getAttribute('data-target');
   console.log(modalID);
   let modal = document.getElementById(modalID);
   console.log(modal);
   button.addEventListener('click', function() {
      // do something to my modal!
      modal.classList.add("is-active");
      modal.classList.remove("fade");
      console.log("made it to the listener");
   });
}