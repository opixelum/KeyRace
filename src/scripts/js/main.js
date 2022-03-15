/**
 * @file main.js
 * 
 * @brief Script for the whole website. 
 * 
 * @author Anto "Opixelum" Benedetti
 * @author Romain "Invorom" Nerot
 * @author Jérémy "Saygel" Micu
 */


window.onload = () => {
    if (localStorage.getItem("theme") === "dark") {
        // Change from light to dark theme
        document.body.classList.remove("light-theme")
        document.body.classList.add("dark-theme")
        localStorage.setItem("theme", "dark")
        setTimeout(() => {themeSwitch.checked = false}, 100)
    } else {
        // Change from dark to light theme
        document.body.classList.remove("dark-theme")
        document.body.classList.add("light-theme")
        localStorage.setItem("theme", "light")
        setTimeout(() => {themeSwitch.checked = true}, 100)
    }
}

// Sign in button
const signUpBtn = document.querySelector("#sign-up-btn")
signUpBtn.addEventListener("click", function() {
    window.location.href = "./signup.php"
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