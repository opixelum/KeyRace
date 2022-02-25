/**
 * @file navbar.js
 * @version 1.0.0
 * 
 * @brief Script for navbar functionnalities
 * 
 * @author Anto "Opixelum" Benedetti
 * @bug No known bug
 */

const signInBtn = document.querySelector("#sign-in-btn")
signInBtn.addEventListener("click", function() {
    console.log("Button clicked")
    window.location.href = "../connect.php"
})
