const successMessage = document.querySelector(".success-message");
const menuIcon = document.querySelector(".menu-icon");
const mobileLoginGroup = document.querySelector(".mobile-login-group");



//Disable success message after 5s
if (successMessage) {
  setTimeout(() => {
    successMessage.style.display = "none";
  }, 5000);
}

// Toggle menu to display login group
menuIcon.addEventListener("click", function () {
  if ((mobileLoginGroup.style.display === "none")) {
    mobileLoginGroup.style.display = "flex";
  }else{
    mobileLoginGroup.style.display = "none";
  }
});



// console.log(window.matchMedia("(max-width: 700px)").matches);

if(window.matchMedia("(min-width: 810px)").matches){
  // TODO
}
