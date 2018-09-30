export default {
    addClass(className) {
        if (this.classList) {
            this.classList.add(className);
        }
        else {
            this.className += ' ' + className;
        }
    },

    removeClass(className) {
        if (this.classList) {
            this.classList.remove(className);
        }
        else {
            this.className = this.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
        }
    },

    hasClass(className) {
        if (this.classList) {
            return this.classList.contains(className);
        }
        else {
            return new RegExp('(^| )' + className + '( |$)', 'gi').test(this.className);
        }
    }
}
