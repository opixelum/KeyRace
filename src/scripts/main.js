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


window.onload = () => {
    if (localStorage.getItem("theme") === "dark") {
        // Change from light to dark theme
        console.log("dark theme")
        document.body.classList.remove("light-theme")
        document.body.classList.add("dark-theme")
        localStorage.setItem("theme", "dark")
    } else {
        // Change from dark to light theme
        console.log("light theme")
        document.body.classList.remove("dark-theme")
        document.body.classList.add("light-theme")
        localStorage.setItem("theme", "light")
    }
}

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
