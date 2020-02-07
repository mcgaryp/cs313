let cart;
// Fetch to get the data from the session on the server "cart"
fetch("../php/getCart.php", {
   method: 'GET'
})
.then((response) => {
   var temp = ""
   try {
      temp = response.json();
   } catch (e) {
      console.log(temp);
      return;
   }
   return temp;
})
.catch(function() {
   console.log("Failed to parse right");
})
.then((response) => {
   cart = response;
});

let deleteButton = document.getElementsByClassName("fa-trash-o");
for (let i = 0; i < deleteButton.length; i++) {
   deleteButton[i].addEventListener("click", function() {
      let btn = deleteButton[i];
      let id = btn.getAttribute["item-id"];
      console.log(id);
      // Delete item from the list
      cart.items = cart.items.filter((id) => {
         console.log(id != id);
         return id != id;
      });
      console.log("new updated cart: ");
      console.log(cart);
      postData("../php/save.php", cart);
      subtotal();
      refreshPage();
   });
}

function refreshPage() {
   window.location.href = "./viewcart.php";
   if (cart.items.length == 0) {
      window.location.href= "../";
   }
}

function subtotal() {
   let subtotalTag = document.getElementById("subtotal");
   let subtotal = 0;
   for (let i = 0; i <cart.items.length; i++) {
      subtotal += cart.items[i].totalprice;
   }
   subtotalTag.innerHTML = "$" + subtotal.toFixed(2);
}
