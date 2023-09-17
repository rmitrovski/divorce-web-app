const initializeProgress = require('../../js/progress.js');

describe('Testing progress', () => {
  let circles, progressBar, buttons;

  beforeAll(() => {
    document.body.innerHTML = `
      <div class="steps">
        <span class="circle active">1</span>
        <span class="circle">2</span>
        <div class="progressbar">
          <span class="indicator"></span>
        </div>
      </div>
      <div class="buttons">
        <button id="prev" disabled>Prev</button>
        <button id="next">Next</button>
      </div>
    `;

    initializeProgress(document);

    circles = document.querySelectorAll(".circle"); 
    progressBar = document.querySelector(".indicator");
    buttons = document.querySelectorAll("button");
  });

  test('initial state is set correctly', () => {
    expect(circles[0].classList.contains("active")).toBe(true);
  });

});
