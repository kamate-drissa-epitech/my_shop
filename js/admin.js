const profil = document.querySelector(".profil");
const logoutBtn = document.querySelector(".logout");
const test = document.querySelector(".test");
const mainRight = document.querySelector(".main-right");
const allUsers = document.querySelector(".all-users");
const addUser = document.querySelector(".add-user");
const allCategories = document.querySelector(".all-categories");
const addCategorie = document.querySelector(".add-categorie");
const allProducts = document.querySelector(".all-product");
const addProduct = document.querySelector(".add-product");
const addform = document.querySelector(".addform");


profil.addEventListener("click", function () {
  if (logoutBtn.style.display === "none") {
    logoutBtn.style.display = "flex";
  } else {
    logoutBtn.style.display = "none";
  }
});

allUsers.addEventListener("click", function () {
  addform.style.display = 'block'
});

