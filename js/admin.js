const profil = document.querySelector(".profil");
const logoutBtn = document.querySelector(".logout");
const successMessage = document.querySelector(".success-message");

profil.addEventListener("click", function () {
  if (logoutBtn.style.display === "none") {
    logoutBtn.style.display = "flex";
  } else {
    logoutBtn.style.display = "none";
  }
});

//Disable success message after 5s
if (successMessage) {
  setTimeout(() => {
    successMessage.style.display = "none";
  }, 2000);
}
