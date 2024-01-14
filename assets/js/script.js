window.addEventListener("scroll", function () {
  let nav = this.document.querySelector("nav");
  let windowPosition = window.scrollY > 10;

  nav.classList.toggle("scrolling-active", windowPosition);
});

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector("nav .nav-right");
const navLink = document.querySelectorAll(".navBarLinksCont a");
const navBar = document.querySelector("nav");

hamburger.addEventListener("click", mobileMenu);
navLink.forEach((n) => n.addEventListener("click", closeMenu));

function mobileMenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
  navBar.classList.toggle("nav-white");
}

function closeMenu() {
  hamburger.classList.remove("active");
  navMenu.classList.remove("active");
}

$(window).on("load", function () {
  $(".Mainsection1").addClass("loaded");
  $(".safetyCenterContainer").addClass("loaded");
  $(".umakDiscoveryPage").addClass("loaded");
  $(".umakDiscoveryWrapper .wrapper").addClass("loaded");
});
