import $ from 'jquery';
export default class FormProduct {

    constructor() {
        this.selector = '[data-js=cta-form-products]';
        this.init();
    }

    init() {
        const $cta = $(this.selector);
        const $formModal = $('[data-js=form-products]')
        
        $cta.on('click', function() {
            $formModal.toggleClass('open');
        })
    }
}
