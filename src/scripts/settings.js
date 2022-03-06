//Dark mode / Light mode

// 0 = dark mode, 1 = light mode
let mode = 0

const navbar = document.querySelector("#navbar")
const main = document.querySelector("#main")
const searchField = document.querySelector("#search-field")
const body = document.querySelector("body")
const modeBtn = document.querySelector("#mode-btn")

// Select all buttons on website
const allBtns = document.getElementsByTagName("button")

modeBtn.addEventListener("click", function() {
    if (mode == 0) {
        // If current mode is dark, change to light mode
        navbar.classList.add("light")
        main.classList.add("light")
        body.style.backgroundColor = "white"
        searchField.style.color = "white"

        // Change all buttons font color to white
        for (let i = 0; i < allBtns.length; i++) {
            allBtns[i].style.color = "white"
        }
        mode = 1
    } else {
        // If current mode is light, change to dark mode
        navbar.classList.remove("light")
        main.classList.remove("light")
        body.style.backgroundColor = "black";
        searchField.style.color = "black"

        // Change all buttons font color to black 
        for (let i = 0; i < allBtns.length; i++) {
            allBtns[i].style.color = "black"
        }
        mode = 0
    }
})
