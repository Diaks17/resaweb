// Toujours commencer son code js par ça: document.addEventListener("DOMContentLoaded", function () {}
document.addEventListener("DOMContentLoaded", function () {
  var sliders = document.querySelector(".sliders");
  var slider = [...document.querySelectorAll(".slider")];
  var photoWidth;

  window.addEventListener("load", function () {
    photoWidth = slider[0].offsetWidth; // 100vw
    console.log(photoWidth);
  });
  window.addEventListener("resize", function () {
    photoWidth = slider[0].offsetWidth; // 100vw
    console.log(photoWidth);
  });

  var left = document.querySelector(".left");
  var right = document.querySelector(".right");

  // position slide courante
  var position = 1;
  var minPosition = 0;
  var maxPosition = slider.length - 1;

  // Q2. Décalage d'une image vers la gauche
  function decaleDroite() {
    position++;

    // Q3. Détection qu'on a atteint la photo la plus à droite
    if (position > maxPosition) {
      retourDebut();
      setTimeout(function () {
        sliders.classList.remove("no-anime");
        decaleDroite();
      }, 20);
    } else {
      sliders.style.left = position * -photoWidth + "px";
    }
    console.log("YESS");
  }

  function decaleGauche() {
    position--;
    if (position < minPosition) {
      retourFin();
      setTimeout(function () {
        sliders.classList.remove("no-anime");
        decaleGauche();
        console.log("YESS");
      }, 20);
    } else {
      sliders.style.left = position * -photoWidth + "px";
    }
  }

  function retourDebut() {
    position = minPosition + 1;
    // sliders.style.left = "0px";
    sliders.classList.add("no-anime");
    sliders.style.left = position * -photoWidth + "px";
  }
  function retourFin() {
    position = maxPosition - 1;
    // sliders.style.left = "0px";
    sliders.classList.add("no-anime");
    sliders.style.left = position * -photoWidth + "px";
  }
  left.addEventListener("click", decaleGauche);
  left.addEventListener("click", console.log("YESS"));

  right.addEventListener("click", decaleDroite);
  filtre = document.querySelector(".filtre");
  trie = document.querySelector(".trier");
  function cacher() {
    console.log("yess");
    filtre.classList.remove("hidden");
  }
});
