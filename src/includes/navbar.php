<?php
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
?>

<div class="d-flex flex-column h-100 justify-content-between">
  <!-- Header -->
  <div class="d-flex flex-wrap justify-content-center">
    <a class="my-4" href="./index.html">
      <img alt="KeyRace logo" width="100px" src="./src/images/logo.png">
    </a>
    <input class="search border-0 m-2 px-3 py-2 w-100 rounded-pill" type="search" id="search-field"
    name="search-field" placeholder="Search for a player">
  </div>

  <?php // Buttons here ?>

  <div class="footer d-flex w-100 flex-wrap justify-content-center">
    <a href="./support.html">Support</a>
    <br><br>
    <small class="w-100 mb-3 text-center">© KeyRace 2022</small>
  </div>
</div>

<?php
/* OLD JAVASCRIPT
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
            <div class="d-flex flex-wrap justify-content-center">
              <a class="my-4" href="./index.html">
                <img alt="KeyRace logo" width="100px" src="./src/images/logo.png">
              </a>
              <input class="search border-0 m-2 px-3 py-2 w-100 rounded-pill" type="search" id="search-field"
              name="search-field" placeholder="Search for a player">
            </div>
        `

        // Create nav buttons dynamically, depending on user status (logged in
        // or not).
        let isLoggedIn = false // DEV: CHANGE LINE TO A LOGGED IN VERIFICATION
        let nav = ``

        if (isLoggedIn) {
            // If user is logged in
            nav = `
                <div class="navbar">
                  <button>Profile</button>
                  <button>Campaign</button>
                  <button>Multiplayer</button>
                  <button>Training</button>
                  <button>Leaderboard</button>
                  <button>Customization</button>
                  <button>Settings</button>
                </div>
            `
        } else {
            // If user isn't logged in
            nav = `
                <div class="d-flex flex-column justify-content-between">
                  <button class="btn m-2">Sign in</button>
                  <button class="btn m-2">Log in</button>
                  <button class="btn m-2">Leaderboard</button>
                  <button class="btn m-2">Settings</button>
                </div>
            `
        }


        // Footer HTML code
        const footer = `
            <div class="footer d-flex w-100 flex-wrap justify-content-center">
              <a href="./support.html">Support</a>
              <br><br>
              <small class="w-100 mb-3 text-center">© KeyRace 2022</small>
            </div>
        `
        
        // Add all parts to shadow's HTML
        shadow.innerHTML = `
            <div class="d-flex flex-column h-100 justify-content-between">
              ${includes}
              ${header}
              ${nav}
              ${footer}
            </div>
        `
    }
})
*/

?>