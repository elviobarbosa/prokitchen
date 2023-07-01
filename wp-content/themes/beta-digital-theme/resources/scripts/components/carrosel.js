import $ from 'jquery';
import 'slick-carousel/slick/slick';
export default class Carrosel {
    constructor() {
        this.selector = '.swiper';
        this.init();
    }

    init() {
        const sliders = document.querySelectorAll(this.selector);
        const slick = document.querySelectorAll('[data-js=slick]');

        if ( sliders ) this.initSwiper(sliders);
        if ( slick ) this.initSlick(slick);
        
    }

    initSwiper(sliders) {
        let i = 1;
        sliders.forEach((sliderEl) => {
        const swiperClass = `js-swiper-${i}`;
        const params = (sliderEl.dataset.params) ? JSON.parse(sliderEl.dataset.params) : {};

        // adding class to separate each swiper
        sliderEl.classList.add(swiperClass);
        // For multiple swipers on a same page it is necessary to call different instances
        sliders = [
            ...sliders,
            new Swiper(`.${swiperClass}`, {
            ...params,
            }),
        ];
        i++;
        });
    }

    initSlick(sliders) {
        sliders.forEach((sliderEl) => {
            const params = (sliderEl.dataset.slick) ? JSON.parse(sliderEl.dataset.slick) : {};
            setTimeout(function () {
                $(sliderEl).slick(params);
            }, 5000);
            
        });
        $(document).on('ready', function () {
            // initialization of slick carousel
            alert('ok')
        });
    }
}
