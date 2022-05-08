/**
 * @file settings.js
 * 
 * @brief Script for the settings page.
 * 
 * @author Anto "Opixelum" Benedetti
 * @author Romain "Invorom" Nerot
 * @author Jérémy "Saygel" Micu
 */

const themeSwitch = document.querySelector("#theme-switch")

window.onload = () => {
    if (localStorage.getItem("theme") === "dark") {
        themeSwitch.checked = false
    } else {
        themeSwitch.checked = true
    }
}

themeSwitch.addEventListener("change", function() {
    if (this.checked) {
        // Change from dark to light theme
        document.body.classList.remove("dark-theme")
        document.body.classList.add("light-theme")
        localStorage.setItem("theme", "light")
    } else {
        // Change from light to dark theme
        document.body.classList.remove("light-theme")
        document.body.classList.add("dark-theme")
        localStorage.setItem("theme", "dark")
    }
})

// Account Button
const accountBtn = document.querySelector("#account-btn")
if (accountBtn) {
    accountBtn.addEventListener("click", () => {
        displayAccount()
    })
}

// Database Button
const databaseBtn = document.querySelector("#database-btn")
if (databaseBtn) {
    databaseBtn.addEventListener("click", () => {
        displayDatabase()
    })
}
