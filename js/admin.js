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

// Gallery
const imgSlide = document.querySelector(".imgs");
const imgs = document.querySelectorAll(".imgs img");
const left = document.querySelector(".left");
const right = document.querySelector(".right");
const size = imgs[0].clientWidth;

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

// Show/hide menu & gallert
const aMenu = document.querySelector("#admin-menu");
const aGallery = document.querySelector("#admin-gallery");
const theMenu = document.querySelector("#menu");
const theGallery = document.querySelector("#gallery");

aMenu.addEventListener("click", () => {
  theGallery.style.display = "none";
  theMenu.style.display = "block";
});

aGallery.addEventListener("click", () => {
  theGallery.classList.remove("hide");
  theMenu.style.display = "none";
  theGallery.style.display = "block";
});
