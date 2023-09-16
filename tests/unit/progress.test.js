
require('./progress.js');

describe('Testing progress', ()=>{
let circles, progressBar, buttons;

beforeAll(()=>{
document.body.innerHTML=  `

<div class="steps">
<span class="circle active">1</span>
<span class="circle">2</span>
<span class="circle">3</span>
<span class="circle">4</span>
<span class="circle">5</span>
<span class="circle">6</span>
<span class="circle">7</span>
<span class="circle">8</span>
<span class="circle">9</span>
<span class="circle">10</span>
<span class="circle">11</span>
<div class="progressbar">
    <span class="indicator"></span>

</div>

</div>

<div class="buttons">
<button id="prev" disabled>Prev</button>
<button id="next" >Next</button>

</div>
</div>    
`;
});

beforeEach(()=>{

    circles=document.querySelectorAll(".circle"); 
 progressBar=document.querySelector(".indicator");
 buttons=document.querySelectorAll("button");

});

test('initial state is set correctly', ()=>{
    expect (circles[0].classList.add("active")).toBe(true);

});


test('update steps increcementing when clicking next ', ()=>{
    buttons[1].dispatchEvent(new Event('click'));
    expect (circles[1].classList.add("active")).toBe(true);

});


test('progress bat=r width is ypdated correctly  ', ()=>{
    buttons[1].dispatchEvent(new Event('click'));
    expect (progressBar.style.width).toBe('50%');

});

test('when clicking next dsabelling next at the last step   ', ()=>{
    for(let i =0; i<circles.length -1; i++){
        buttons[1].dispatchEvent(new Event('click'));
    }

    expect (buttons[1].disabled).toBe(true);
});




test('clicking prev enables the next button  ', ()=>{
    buttons[1].dispatchEvent(new Event('click'));
    buttons[0].dispatchEvent(new Event('click'));
    expect (buttons[1].disabled).toBe(false);

});


});


   

   

