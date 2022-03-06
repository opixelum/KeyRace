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

//Dark mode / Light mode
const modeBtn = document.querySelector("#settings-btn")
modeBtn.addEventListener("click", function() {
    const darkNavbar = document.querySelector(".rgb-shadow-dark")
    darkNavbar.className = "navbar col-2 p-0 me-2 rounded rgb-shadow-light"
    const darkMain = document.querySelector(".rgb-shadow-dark")
    darkMain.className = "main col ms-2 rounded rgb-shadow-light"
    darkBody = document.querySelector("body")
    darkBody.style.backgroundColor = "#ffffff";
    const darkText = document.querySelectorAll(".dark-btn")
    darkText.className = "btn m-2 light-btn"
})
