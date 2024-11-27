// Toggle class active for navbar
const navbarNav = document.querySelector(".navbar-nav");
const hamburgerMenu = document.querySelector("#hamburger-menu");
hamburgerMenu.onclick = () => {
  navbarNav.classList.toggle("active");
};

// Toggle class active for search form
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const searchButton = document.querySelector("#search-button");
searchButton.onclick = (e) => {
  searchForm.classList.toggle("active");
  searchBox.focus();
  e.preventDefault();
};

// Toggle class active for shopping cart
const shoppingCart = document.querySelector(".shopping-cart");
const shoppingCartButton = document.querySelector("#shopping-cart-button");
shoppingCartButton.onclick = (e) => {
  shoppingCart.classList.toggle("active");
  e.preventDefault();
};

// Click outside element to close active states
document.addEventListener("click", function (e) {
  if (!hamburgerMenu.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }

  if (!searchButton.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove("active");
  }

  if (
    !shoppingCartButton.contains(e.target) &&
    !shoppingCart.contains(e.target)
  ) {
    shoppingCart.classList.remove("active");
  }
});