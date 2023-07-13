import $ from 'jquery';
import anime from 'animejs/lib/anime.es.js';

export default class HeaderFront {

    constructor() {
        this.selector = '[data-js=txt-anim-child]';
        this.init();
    }

    init() {
        const selectors = document.querySelectorAll(this.selector);

        if (selectors.length > 0) {
            this.start(selectors);
        }
    }
   
    start(elements) {
        let index = 0;
        const $txtContainer = $(elements);
        const $txtChildren = $('.letters', $txtContainer);
        const letters = document.querySelectorAll('.ml10 .letters');
        
        for (const letter of letters ) {
            letter.innerHTML = letter.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
            if (index > 0) $(this).hide();
            index+=1;
        }
        
        let counter = 0;

        const animation = (target) => {
            $(target).css({rotateY: '-90deg', opacity: 0});

            anime.timeline({loop: false})
                .add({
                    targets: target,
                    opacity: [0,1],
                    rotateY: [-90, 0],
                    duration: 1300,
                    delay: (el, i) => 45 * i
                })
        }

        animation('#letter0 .letter')

        setInterval(function () {
            const $outEl = $('.letters', $txtContainer).eq(counter);
            $outEl.fadeOut( "fast", function() {
                counter += 1;
                if (counter >= $txtChildren.length) counter = 0;
                const $inEl = $('.letters', $txtContainer).eq(counter);
                
                $inEl.fadeIn()
                const target = $inEl.attr('id');
                animation(`#${target} .letter`);
            });
            
        }, 3500);

    }
}
