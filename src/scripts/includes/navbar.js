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


// Create "Navbar" class, inherited from "HTMLElement" class with "extends"
class Navbar extends HTMLElement {

    // Constructor method for initiate objects automatically
    constructor() {
        super() // Call "HTMLElement"'s constructor

        // Our Navbar is a "shadow" element that will be attached to the DOM
        // of our website's pages.
        // The 'mode: "open"' makes the shadow element visible globally to all
        // of our JavaScript code.
        this.shadow = this.attachShadow({mode: "open"})
    }

    // Method called when "nav-bar" is inserted in the DOM
    connectedCallback() {
        this.render()
    }

    render() {
        this.shadow.innerHTML = `
            <div id="navbar">
              <img alt="KeyRace logo" width="50px" src="./src/images/logo.png">

              <input type="search" id="search-field" name="search-field"
              placeholder="Search a player">

              <nav>
                <ul>
                  <li><button id="login-btn">Log in</button></li>
                  <li><button id="signin-btn">Sign in</button></li>
                  <li><button id="leaderboard-btn">Leaderboard</button></li>
                  <li><button id="settings-btn">Settings</button></li>
                </ul>
              </nav>

              <a href="./src/php/contact.php">Support</a>

              <small>© KeyRace 2022</small>
            </div>
        `
    }
}

// Make our elememt available for the HTML
customElements.define("nav-bar", Navbar)