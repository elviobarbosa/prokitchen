export default class Scrolling {

    constructor() {
        this.init();
    }

    init() {
        const header = document.getElementById('menu-header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                header.classList.add('menu-collapse');
            } else {
                header.classList.remove('menu-collapse');
            }
        });
    }

}
