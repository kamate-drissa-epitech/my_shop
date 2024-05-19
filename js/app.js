const successMessage = document.querySelector(".success-message");
const menuIcon = document.querySelector(".menu-icon");
const mobileLoginGroup = document.querySelector(".mobile-login-group");
const userConnected = document.querySelector(".user-connected");
const logoutSettings = document.querySelector(".logout-settings");



// Toggle menu to display login group
menuIcon.addEventListener("click", function () {
  console.log('clicked');
  if (mobileLoginGroup.style.display === "none") {
    mobileLoginGroup.style.display = "flex";
  } else {
    mobileLoginGroup.style.display = "none";
  }
});

userConnected.addEventListener("click", function () {
  if (logoutSettings.style.display === "none") {
    logoutSettings.style.display = "flex";
  } else {
    logoutSettings.style.display = "none";
  }
});

// console.log(window.matchMedia("(max-width: 700px)").matches);

if (window.matchMedia("(min-width: 810px)").matches) {
  // TODO
}
