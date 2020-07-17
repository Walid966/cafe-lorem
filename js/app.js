$(document).ready(function () {
  // Add smooth scrolling to all links
  $("a").on("click", function (event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate(
        {
          scrollTop: $(hash).offset().top,
        },
        500,
        function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        }
      );
    } // End if
  });
});

const nav = document.querySelector("header");
const navBar = document.querySelector(".nav-bar");
const hamburger = document.querySelector(".hamburger");
const main = document.querySelector("main");
const mobileLogo = document.querySelector(".mobile-logo");
const copyRight = document.querySelector(".nav-bar .copy-right");

// hide/show header onscroll
let previous = window.scrollY;
window.addEventListener("scroll", function () {
  if (window.scrollY > previous && window.scrollY > 57) {
    nav.style.top = "-57px";
    nav.classList.remove("header-shadow");
  } else {
    nav.style.top = "0px";
    nav.classList.add("header-shadow");
  }

  if (window.scrollY > previous || window.scrollY < previous) {
    navBar.classList.remove("slide");
    hamburger.classList.remove("clicked");
  }

  previous = window.scrollY;

  if (previous === 0) {
    nav.classList.remove("header-shadow");
  }
});

// open/close nav bar on mobile devices
hamburger.addEventListener("click", function () {
  navBar.classList.toggle("slide");
  hamburger.classList.toggle("clicked");
  // copyRight.style.display = "block";
});

// hide nav bar when clicking outside of it
main.addEventListener("click", function (e) {
  if (e.target.id !== "nav-link") {
    navBar.classList.remove("slide");
    hamburger.classList.remove("clicked");
  }
});

//food menu section
const bld = document.querySelectorAll(".bld div");
const bldH3 = document.querySelectorAll(".bld div h3");
const lunch = document.querySelector(".bld-l h3");
const dinner = document.querySelector(".bld-d h3");
const breakfast = document.querySelector(".bld-b h3");
const showLunch = document.querySelector(".lunch");
const showDinner = document.querySelector(".dinner");
const showBreakfast = document.querySelector(".breakfast");
const bldB = document.querySelector(".bld-b");
const bldL = document.querySelector(".bld-l");
const bldD = document.querySelector(".bld-d");

bldL.addEventListener("click", function () {
  showBreakfast.style.display = "none";
  showDinner.classList.remove("show");
  dinner.classList.remove("h3-clicked", "red");
  breakfast.classList.remove("h3-clicked", "red");
  lunch.classList.add("h3-clicked", "red");
  showLunch.classList.add("show");
});

bldD.addEventListener("click", function () {
  showBreakfast.style.display = "none";
  showLunch.classList.remove("show");
  lunch.classList.remove("h3-clicked", "red");
  breakfast.classList.remove("h3-clicked", "red");
  dinner.classList.add("h3-clicked", "red");
  showDinner.classList.add("show");
});

bldB.addEventListener("click", function () {
  showLunch.classList.remove("show");
  showDinner.classList.remove("show");
  dinner.classList.remove("h3-clicked", "red");
  lunch.classList.remove("h3-clicked", "red");
  breakfast.classList.add("h3-clicked", "red");
  showBreakfast.style.display = "flex";
});

// form validation
const names = {
  name: /^[a-z]{3,}[a-z ]*$/i,
  email: /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
};

const inputs = document.querySelectorAll(".input");

function validate(inputField, regex) {
  if (regex.test(inputField.value)) {
    inputField.classList.remove("invalid");
    inputField.classList.add("valid");
  } else {
    inputField.classList.remove("valid");
    inputField.classList.add("invalid");
  }
}

inputs.forEach((input) => {
  input.addEventListener("keyup", function (e) {
    //console.log(e.target.attributes.name.value);
    validate(e.target, names[e.target.attributes.name.value]);
  });
});

// sent message
const sent = document.querySelector(".sent");
if (sent.innerHTML) {
  sent.style.display = "block";
}

// Gallery
const imgSlide = document.querySelector(".imgs");
const imgs = document.querySelectorAll(".imgs img");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const size = imgs[0].clientWidth;

imgSlide.addEventListener("mouseout", () => {
  left.classList.remove("flexx");
  left.classList.add("none");
  right.classList.remove("flexx");
  right.classList.add("none");
});

imgSlide.addEventListener("mouseover", () => {
  left.classList.remove("none");
  left.classList.add("flexx");
  right.classList.remove("none");
  right.classList.add("flexx");
});

let counter = 0;

function reset() {
  imgs.forEach((img) => {
    img.style.display = "none";
  });
}

function slideLeft() {
  reset();
  imgs[counter - 1].style.display = "block";
  counter--;
}

function slideRight() {
  reset();
  imgs[counter + 1].style.display = "block";
  counter++;
}

left.addEventListener("click", function () {
  if (counter === 0) {
    counter = imgs.length;
  }

  slideLeft();
});

right.addEventListener("click", function () {
  if (counter === imgs.length - 1) {
    counter = -1;
  }

  slideRight();
});

function start() {
  reset();
  imgs[0].style.display = "block";
}

start();
