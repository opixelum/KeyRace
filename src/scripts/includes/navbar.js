/**
 * @file navbar.js
 * @version 1.0.6
 * 
 * @brief Navigation bar components
 * 
 * This file contains the html code for generating the navigation bar for our
 * website. It will be displayed on all pages and its content will differ,
 * depending on multiple factors such as if a user is logged in or not.
 * 
 * @author Jérémy "Saygel"   Micu
 * @author Romain "Invorom"  Nerot
 * @author Anto   "Opixelum" Benedetti
 * 
 * Date created  : 02/19/2022
 * Date last edit: 02/20/2022
 */


// Create a class for our navbar, inherited from "HTMLElement"
customElements.define("nav-bar", class extends HTMLElement {

    // Method fired when "nav-bar" is inserted in the DOM
    connectedCallback() {

        // Our navbar is a shadow elememt that will be attached to each of our
        // website pages DOM.
        // {mode: "open"} makes the shadow element visible globally to all of
        // our JavaScript code.
        const shadow = this.attachShadow({mode: "open"})

        // Header HTML code
        const header = `
            <header>
            <a href="./index.html">
                <img alt="KeyRace logo" width="50px" src="./src/images/logo.png">
            </a>
            <input type="search" id="search-field" name="search-field"
            placeholder="Search a player">
            </header>
        `

        // Nav buttons HTML code
        const navOpening = `<nav><ul>`

        // Create nav buttons dynamically, depending on user status (logged in
        // or not).
        let isLoggedIn = false // DEV: CHANGE LINE TO A LOGGED IN VERIFICATION
        let navButtons = ``

        if (isLoggedIn) {
            // If user is logged in
            navButtons = `
                <li><button>Profile</button></li>
                <li><button>Campaign</button></li>
                <li><button>Multiplayer</button></li>
                <li><button>Training</button></li>
                <li><button>Leaderboard</button></li>
                <li><button>Customization</button></li>
                <li><button>Settings</button></li>
            `
        } else {
            // If user isn't logged in
            navButtons = `
                <li><button>Log in</button></li>
                <li><button>Sign in</button></li>
                <li><button>Leaderboard</button></li>
                <li><button>Settings</button></li>
            `
        }

        const navClosing = `</ul></nav>`

        // Bundle all parts together
        const nav = `
            ${navOpening}
            ${navButtons}
            ${navClosing}
        `

        // Footer HTML code
        const footer = `
            <footer>
            <a href="./support.html">Support</a>
            <small>© KeyRace 2022</small>
            </footer>
        `
        
        // Add all parts to shadow's HTML
        shadow.innerHTML = `
            <div id="navbar">
              ${header}
              ${nav}
              ${footer}
            </div>
        `
    }
})

