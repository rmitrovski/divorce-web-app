// progress.js

function initializeProgress(document) {
    const circles = document.querySelectorAll(".circle");
    const progressBar = document.querySelector(".indicator");
    const buttons = document.querySelectorAll("button");
    let currentStep = 1;
  
    function updateSteps(e) {
      circles[currentStep - 1].classList.remove("active");
  
      currentStep = e.target.id === "next" ? ++currentStep : --currentStep;
      circles[currentStep - 1].classList.add("active");
  
      progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`;
  
      if (currentStep === circles.length) {
        buttons[1].disabled = true;
      } else if (currentStep === 1) {
        buttons[0].disabled = true;
      } else {
        buttons.forEach((button) => (button.disabled = false));
      }
    }
  
    buttons.forEach((button) => {
      button.addEventListener("click", updateSteps);
    });
  
    circles[0].classList.add("active");
  }
  
  if (typeof module !== "undefined" && module.exports) {
    module.exports = initializeProgress;
  }
  