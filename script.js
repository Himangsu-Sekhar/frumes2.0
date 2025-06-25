window.addEventListener('scroll', function () {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
      navbar.classList.add('navbar-glass');
    } else {
      navbar.classList.remove('navbar-glass');
    }
});
 
  setTimeout(() => {
    const alertBox = document.getElementById("alertBox");
    if (alertBox) {
      alertBox.classList.remove("show");
      alertBox.classList.add("fade");
      setTimeout(() => alertBox.remove(), 500); // remove from DOM after fade
    }
  }, 1000);

