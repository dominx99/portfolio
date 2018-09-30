export default class Nav {
    constructor() {
        this.openButton = '.nav .open';
        this.menu = '.nav .menu';

        this.bind();
    }

    bind() {
        let button = document.querySelector(this.openButton);
    
        button.addEventListener('click', () => this.toggleMenu());
    }

    toggleMenu() {
        let menu = document.querySelector(this.menu);
        let openButton = document.querySelector(this.openButton);

        if (menu.hasClass('opened')) {
            menu.removeClass('opened');
            openButton.removeClass('opened');
        } else {
            menu.addClass('opened');
            openButton.addClass('opened');
        }
    }
}
