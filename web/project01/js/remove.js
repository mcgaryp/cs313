let buttons = document.getElementsByClassName("delete-button");
for (let i = 0; i < buttons.length; i++) {
   let button = buttons[i];
   let itemId = button.getAttribute('id');
   button.addEventListener('click', () => {
      confirm()
   });
}