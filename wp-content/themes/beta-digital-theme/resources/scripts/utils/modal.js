import $ from 'jquery';
/**
 *
 * Modal
 *
 * 
 */

export default function Modal(settings) {
    const { selector, onOpenModal = null } = settings;
    const $modal = $(selector);
    const $close = $('[data-js=close-modal]');
    
    $modal.on('click', (ev) => {
        const $this = $(ev.currentTarget);
        const $modal = $('#' + $this.attr('data-modal'));
        $modal.addClass('open');
        $modal.fadeIn('fast');
        if (onOpenModal) onOpenModal(ev.currentTarget);
    });

    $close.each((index, element) => {
        $(element).on('click', (ev) => {
            const $parent = $(ev.currentTarget).parents('.c-modal');
            $parent.fadeOut('fast');
        });
    });
}
