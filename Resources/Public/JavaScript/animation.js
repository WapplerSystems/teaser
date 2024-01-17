
document.addEventListener("DOMContentLoaded", function() {
  let currentIndex = 0;
  const divs = document.querySelectorAll(".teaser2 > div");
  const numberOfDivs = divs.length;

  setInterval(function() {
    if (divs[currentIndex]) {
      divs[currentIndex].classList.remove("teaser2__item--active");
    }

    currentIndex = (currentIndex + 1) % numberOfDivs;

    if (divs[currentIndex]) {
      divs[currentIndex].classList.add("teaser2__item--active");
    }
  }, 3000);
});
