global.Swiper= jest.fn();
describe('PlaSlider Initialization', () =>{

    // claer all instances and calls to the swiper constructor 
beforeEach(()=>{
global.Swiper.mockClear();
});
it('should initialize swiper with the correct paramerets', ()=>{
// run the playslider from the code 
require('./path to the slider file ');
expect(global.Swiper).toHaveBeenCalledTimes(1);

const swiperInitArguments=global.Swiper.mock.calls[0];

expect(swiperInitArguments[0]).toEqual('.play-slider');

expect(swiperInitArguments[1]).toMatchObject({
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


});
});
