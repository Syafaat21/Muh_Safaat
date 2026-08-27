function hamburg() {
  const navbar = document.querySelector(".dropdown");
  navbar.style.transform = "translateY(0px)";
}

function cancel() {
  const navbar = document.querySelector(".dropdown");
  navbar.style.transform = "translateY(-500px)";
}

const texts = ["PROGRAMMER", "INFORMATIC", "STUDENT"];
let speed = 100;
const textElements = document.querySelector(".typewriter-text");
let textIndex = 0;
let characterIndex = 0;

function typeWriter() {
  if (characterIndex < texts[textIndex].length) {
    textElements.innerHTML += texts[textIndex].charAt(characterIndex);
    characterIndex++;
    setTimeout(typeWriter, speed);
  } else {
    setTimeout(eraseText, 1000);
  }
}

function eraseText() {
  if (textElements.innerHTML.length > 0) {
    textElements.innerHTML = textElements.innerHTML.slice(0, -1);
    setTimeout(eraseText, 50);
  } else {
    textIndex = (textIndex + 1) % texts.length;
    characterIndex = 0;
    setTimeout(typeWriter, 500);
  }
}

document.querySelectorAll(".dropdown .links a").forEach((link) => {
  link.addEventListener("click", () => {
    cancel();
  });
});

window.onload = typeWriter;
document.addEventListener("DOMContentLoaded", function () {
  const hamburg = document.querySelector(".hamburg");
  const cancel = document.querySelector(".cancel");
  const dropdown = document.querySelector(".dropdown");

  if (hamburg && cancel && dropdown) {
    hamburg.addEventListener("click", function () {
      dropdown.style.transform = "translateY(0)";
      dropdown.style.display = "block";
    });

    cancel.addEventListener("click", function () {
      dropdown.style.transform = "translateY(-500px)";
      setTimeout(() => {
        dropdown.style.display = "none";
      }, 300); // Sesuaikan dengan durasi transisi
    });
  }
});
