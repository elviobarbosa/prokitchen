import $ from 'jquery';
export default class FormProduct {

    constructor() {
        this.selector = '[data-js=cta-form-products]';
        this.init();
    }

    init() {
        const $cta = $(this.selector);
        const $close = $('[data-js=close-contact]');
        const $formModal = $('[data-js=form-products]');

        $close.on('click', function() {
            $formModal.removeClass('open');
        })
        
        $cta.on('click', function() {
            $formModal.toggleClass('open');
        })
    }
}
