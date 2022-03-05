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
