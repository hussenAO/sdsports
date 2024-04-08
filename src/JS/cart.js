/*
Naam script     : shoppingCart.js
Omschrijving    : Beheert het winkelwagentje in een webshop door items toe te voegen, te verwijderen, de hoeveelheid te wijzigen en de totale prijs bij te werken.
Auteur          : hussen brasco dominik
Project         : periode 3
Aanmaakdatum    : 01-02-2024
*/

// OPEN & CLOSE CART
const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

// Event listener voor het openen van het winkelwagentje
cartIcon.addEventListener("click", () => {
  cart.classList.add("active");
});

// Event listener voor het sluiten van het winkelwagentje
closeCart.addEventListener("click", () => {
  cart.classList.remove("active");
});

// Start wanneer het document klaar is met laden
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", start);
} else {
  start();
}

// =============== START ====================
function start() {
  addEvents();
}

// ============= UPDATE & RERENDER ===========
function update() {
  addEvents();
  updateTotal();
}

// =============== ADD EVENTS ===============
function addEvents() {
  // Verwijder items uit het winkelwagentje
  let cartRemove_btns = document.querySelectorAll(".cart-remove");
  cartRemove_btns.forEach((btn) => {
    btn.addEventListener("click", handle_removeCartItem);
  });

  // Wijzig de hoeveelheid van een item in het winkelwagentje
  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
    input.addEventListener("change", handle_changeItemQuantity);
  });

  // Voeg een item toe aan het winkelwagentje
  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });

  // Plaats een bestelling
  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);
}

// ============= HANDLE EVENTS FUNCTIONS =============
let itemsAdded = [];

function handle_addCartItem() {
  let product = this.parentElement;
  let title = product.querySelector(".product-title").innerHTML;
  let price = product.querySelector(".product-price").innerHTML;
  let imgSrc = product.querySelector(".product-img").src;

  let newToAdd = {
    title,
    price,
    imgSrc,
  };

  // Controleer of het item al bestaat in het winkelwagentje
  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("Dit item staat al in het winkelwagentje!");
    return;
  } else {
    itemsAdded.push(newToAdd);
  }

  // Voeg het product toe aan het winkelwagentje
  let cartBoxElement = CartBoxComponent(title, price, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  update();
}

function handle_removeCartItem() {
  this.parentElement.remove();
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title !=
      this.parentElement.querySelector(".cart-product-title").innerHTML
  );

  update();
}

function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value < 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value); // Zorg ervoor dat de waarde een geheel getal blijft

  update();
}

function handle_buyOrder() {
  if (itemsAdded.length <= 0) {
    alert("Er zijn nog geen items om te bestellen! \nVoeg eerst een item toe aan het winkelwagentje.");
    return;
  }
  const cartContent = cart.querySelector(".cart-content");
  cartContent.innerHTML = "";
  alert("Uw bestelling is succesvol geplaatst :)");
  itemsAdded = [];

  update();
}

// =========== UPDATE & RERENDER FUNCTIONS =========
function updateTotal() {
  let cartBoxes = document.querySelectorAll(".cart-box");
  const totalElement = cart.querySelector(".total-price");
  let total = 0;
  cartBoxes.forEach((cartBox) => {
    let priceElement = cartBox.querySelector(".cart-price");
    let price = parseFloat(priceElement.innerHTML.replace("$", ""));
    let quantity = cartBox.querySelector(".cart-quantity").value;
    total += price * quantity;
  });

  // Houd 2 decimalen na de komma
  total = total.toFixed(2);

  totalElement.innerHTML = "$" + total;
}

// ============= HTML COMPONENTS =============
function CartBoxComponent(title, price, imgSrc) {
  return `
    <div class="cart-box">
        <img src=${imgSrc} alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- Verwijder item uit het winkelwagentje -->
        <i class='bx bxs-trash-alt cart-remove'></i>
    </div>`;
}
