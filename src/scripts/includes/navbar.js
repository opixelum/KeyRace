/**
 * @file navbar.js
 * @version 1.0.0
 * 
 * @brief Navigation bar components
 * 
 * This file contains the html code for generating the navigation bar for our
 * website. It will be displayed on all pages and its content will differ,
 * depending on multiple factors such as if a user is logged in or not.
 * 
 * @author Jérémy "Saygel" Micu
 * @author Romain "Invorom" Nerot
 * @author Anto "Opixelum" Benedetti
 * 
 * Date created  : 02/19/2022
 * Date last edit: 02/19/2022
 */


class Navbar extends HTMLElement {
    constructor() {
        super()
        this.shadow = this.attachShadow({mode: "open"})
    }

    connectedCallback() {
        this.render()
    }

    render() {
        this.shadow.innerHTML = `
            <nav>
              <img alt="KeyRace logo" width="50px" src="./src/images/logo.png">
            </nav>
        `
    }
}

customElements.define("nav-bar", Navbar)