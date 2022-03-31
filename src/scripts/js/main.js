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

// Start button
if (getCookie("isLoggedIn")) {
    const startBtn = document.querySelector("#start-btn")
    if (startBtn) {
        startBtn.addEventListener("click", function() {
        window.location.href = "./training.php"
        })
    }
}
else {
    const startBtn = document.querySelector("#start-btn")
    startBtn.addEventListener("click", function() {
    window.location.href = "./signup.php"
    })
}
