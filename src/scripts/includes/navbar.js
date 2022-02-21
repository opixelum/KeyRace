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

        // Files to include for styling
        const includes = `
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="./src/bootstrap/css/bootstrap.min.css">

            <!-- Custom CSS -->
            <link rel="stylesheet" href="./src/css/style.css">
        `

        // Header HTML code
        const header = `
            <header class="d-flex flex-wrap justify-content-center">
              <a navbar-brand href="./index.html">
                <img alt="KeyRace logo" width="50px" src="./src/images/logo.png">
              </a>
              <input class="w-100" type="search" id="search-field"
              name="search-field" placeholder="Search for a player">
            </header>
        `

        // Create nav buttons dynamically, depending on user status (logged in
        // or not).
        let isLoggedIn = false // DEV: CHANGE LINE TO A LOGGED IN VERIFICATION
        let nav = ``

        if (isLoggedIn) {
            // If user is logged in
            nav = `
                <nav class="navbar">
                  <button>Profile</button>
                  <button>Campaign</button>
                  <button>Multiplayer</button>
                  <button>Training</button>
                  <button>Leaderboard</button>
                  <button>Customization</button>
                  <button>Settings</button>
                </nav>
            `
        } else {
            // If user isn't logged in
            nav = `
                <nav class="navbar justify-content-center w-100">
                  <button class="btn w-90">Sign in</button>
                  <button class="btn w-90">Log in</button>
                  <button class="btn w-90">Leaderboard</button>
                  <button class="btn w-90">Settings</button>
                </nav>
            `
        }


        // Footer HTML code
        const footer = `
            <footer class="d-flex flex-wrap justify-content-center">
              <a href="./support.html">Support</a>
              <small>© KeyRace 2022</small>
            </footer>
        `
        
        // Add all parts to shadow's HTML
        shadow.innerHTML = `
            <div id="navbar" class="d-flex h-100 flex-wrap justify-content-between">
              ${includes}
              ${header}
              ${nav}
              ${footer}
            </div>
        `
    }
})