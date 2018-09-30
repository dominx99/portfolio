import Nav from "./components/nav";
import DomExtensions from './utilities/DomExtensions';

HTMLElement.prototype.addClass = DomExtensions.addClass;
HTMLElement.prototype.removeClass = DomExtensions.removeClass;
HTMLElement.prototype.hasClass = DomExtensions.hasClass;

const nav = new Nav();
