import $ from 'jquery';
export default class ImageCat {

    constructor() {
        this.selector = '[data-js=prod-image]';
        this.init();
    }

    init() {
        const selectors = document.querySelectorAll(this.selector);

        if (selectors.length > 0) {
            this.do(selectors);
        }
    }

    do(elements) {
        const $btns = $(elements);
        const $container = $('[data-js=image-category]');

        const displayImage = (imgURL) => {
            const $container = $('[data-js=image-category]');
            $container.empty();
            const $img = $('<img>');
            $img.attr( { src : imgURL } );
            $img.appendTo($container);
        }

        if ( $(window).width() > 600 ) {
            const first = $btns[0];
            displayImage( $(first).attr('data-url') );
            
            $btns.each(function() {
                $(this).on('mouseover', () => {
                    displayImage( $(this).attr('data-url') );
                })
            });
        }
    }
}
