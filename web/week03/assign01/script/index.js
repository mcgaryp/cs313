let data, cart;
// Fetch to get the data from the database
fetch("./php/getItems.php", { 
   method: 'GET' 
})
.then((response) => {
   return response.json()
})
.then((response) => {
   data = response
});

// Fetch to get the data from the session on the server "cart"
fetch("./php/getCart.php", {
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
var total = 0;
console.log(total);

// Get a list of buttons from the page and set onclick listener
let addToCartButtons = document.getElementsByClassName("add-to-cart");
console.log(addToCartButtons);
for (let i = 0; i < addToCartButtons.length; i++) {
   addToCartButtons[i].addEventListener("click", function() {
      // Button is pushed now do this
      let id = addToCartButtons[i].getAttribute("item-id");
      let item = data.find(element => element.id == id);
      let inCart = alreadyInCart(id);
      if (!inCart) {
         cart.items.push({
            id: id,
            title : item.title,
            quantity : 1,
            price : item.price,
            subtotal : item.price,
            url : "../" + item.url
         });
         total = total + item.price;
         console.log(total);
         cart.total = total.toFixed(2);
      }
      console.log(cart);
      postData("./php/save.php", cart);
      alert(`Added "${item.title}" to your cart!`);
   }, false);
};

let viewCartButton = document.getElementById("cart");
viewCartButton.addEventListener("click", function() {
    if (cart.items.length <= 0) {
        alert("You have no items in your cart");
        return;
    }
    viewCartButton.classList.add("is-loading");
    postData("./php/save.php", cart).then(() => {
        window.location.href = "pages/viewCart.php";
    }); 
});

function alreadyInCart(id) {
    return cart.items.find(element => element.id == id);
}