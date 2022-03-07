/**
 * @file main.js
 * 
 * @brief Script for dynamic UI. 
 * 
 * @author Anto "Opixelum" Benedetti
 * @author Romain "Invorom" Nerot 
 * 
 * @bug No known bug
 */


// Sign in button
const signInBtn = document.querySelector("#sign-in-btn")
signInBtn.addEventListener("click", function() {
    window.location.href = "./signin.php"
})

// Log in button
const logInBtn = document.querySelector("#log-in-btn")
logInBtn.addEventListener("click", function() {
    window.location.href = "./login.php"
})

// Settings button
const settingsBtn = document.querySelector("#settings-btn")
settingsBtn.addEventListener("click", function() {
    window.location.href = "./settings.php"
})

// Start button
const startBtn = document.querySelector("#start-btn")
startBtn.addEventListener("click", function() {
    window.location.href = "./signin.php"
})
