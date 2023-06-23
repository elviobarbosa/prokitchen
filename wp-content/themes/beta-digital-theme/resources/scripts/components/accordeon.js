import $ from 'jquery';
export default class Accordeon {

    constructor() {
        this.selector = '[data-js=accordeon]';
        this.init();
    }

    init() {
        const $accordeon = $(this.selector);
        const $accordeonControl = $('.accordeon-control', $accordeon);

        const $initialCat = $('.accordeon-opened', $accordeon);
        const $initialContent = $('.accordeon-content', $initialCat);
        const $initialPlus = $('.accordeon-open', $initialCat);
        const $initialMinus = $('.accordeon-close', $initialCat);

        $initialContent.show( "fast", function() {});
        $initialPlus.hide();
        $initialMinus.show().css('display','flex');
           
        $accordeonControl.each(function() {
            $(this).on('click', () => {
                const $parent = $(this).parent('.accordeon-group');
                const $accordeonContent = $('.accordeon-content', $parent);
                const $accordeonPlus = $('.accordeon-open', $parent);
                const $accordeonMinus = $('.accordeon-close', $parent);

                $parent.toggleClass('accordeon-opened');
                
                if ( $parent.hasClass('accordeon-opened') ) {
                    $accordeonContent.show( "fast", function() {
                        // Animation complete.
                    });
                    $accordeonPlus.hide();
                    $accordeonMinus.show().css('display','flex');
                } else {
                    $accordeonContent.hide( "fast", function() {
                        // Animation complete.
                    });
                    $accordeonMinus.hide();
                    $accordeonPlus.show();
                }
            })
        });
    }
}
