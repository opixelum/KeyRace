/**
 * @file main.js
 * @version 1.1.1
 * 
 * @brief Script for dynamic UI. 
 * 
 * @author Anto "Opixelum" Benedetti
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

// Start button
const startBtn = document.querySelector("#start-btn")
startBtn.addEventListener("click", function() {
    window.location.href = "./signin.php"
})

let mode = 0
//Dark mode / Light mode
const modeBtn = document.querySelector("#settings-btn")
modeBtn.addEventListener("click", function() {
    if (mode == 0)
    {
        const darkNavbar = document.querySelector(".rgb-shadow-dark")
        darkNavbar.className = "navbar col-2 p-0 me-2 rounded rgb-shadow-light"
        const darkMain = document.querySelector(".rgb-shadow-dark")
        darkMain.className = "main col ms-2 rounded rgb-shadow-light"
        darkBody = document.querySelector("body")
        darkBody.style.backgroundColor = "#ffffff";
        const sign_in_btn = document.querySelector("#sign-in-btn")
        sign_in_btn.style.color = "#ffffff"
        const log_in_btn = document.querySelector("#log-in-btn")
        log_in_btn.style.color = "#ffffff"
        const leaderboard_btn = document.querySelector("#leaderboard-btn")
        leaderboard_btn.style.color = "#ffffff"
        const settings_btn = document.querySelector("#settings-btn")
        settings_btn.style.color = "#ffffff"
        const start_btn = document.querySelector("#start-btn")
        start_btn.style.color = "#ffffff"
        const search_field = document.querySelector("#search-field")
        search_field.style.color = "#ffffff"
        mode = 1
    }
    else
    {
        const lightNavbar = document.querySelector(".rgb-shadow-light")
        lightNavbar.className = "navbar col-2 p-0 me-2 rounded rgb-shadow-dark"
        const lightMain = document.querySelector(".rgb-shadow-light")
        lightMain.className = "main col ms-2 rounded rgb-shadow-dark"
        lightBody = document.querySelector("body")
        lightBody.style.backgroundColor = "#000000";
        const sign_in_btn = document.querySelector("#sign-in-btn")
        sign_in_btn.style.color = "#000000"
        const log_in_btn = document.querySelector("#log-in-btn")
        log_in_btn.style.color = "#000000"
        const leaderboard_btn = document.querySelector("#leaderboard-btn")
        leaderboard_btn.style.color = "#000000"
        const settings_btn = document.querySelector("#settings-btn")
        settings_btn.style.color = "#000000"
        const start_btn = document.querySelector("#start-btn")
        start_btn.style.color = "#000000"
        const search_field = document.querySelector("#search-field")
        search_field.style.color = "#000000"
        mode = 0
    }
})
