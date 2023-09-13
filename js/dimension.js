var PlaySlider= new Swiper('.play-slider', {
 effect:'coverflow', 
 grabCursor:true, 
 centeredSlides: true, 
 loop:true, 
 slidesPerView: 'auto', 
 coverflowEffect:{
    rotate:0, 
    stretch:0, 
    depth:100, 
    modifier:2.5,

 },
 folio:{
    el: '.swiper-folio', 
    clickable: true,
 }, 
 navigation:{
    nextEl:'.swiper-button-next',
    prevEl:'.swiper-button-prev',
 }



});


