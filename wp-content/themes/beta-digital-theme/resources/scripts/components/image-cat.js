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
        const $container = $('[data-js=image-category]')
        $btns.each(function() {
            $(this).on('mouseover', () => {
                $container.empty();
                const $img = $('<img>');
                $img.attr( { src : $(this).attr('data-url') } );
                $img.appendTo($container);
            })
        });
    }
}
