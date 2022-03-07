//Dark mode / Light mode

// 0 = dark mode, 1 = light mode
let mode = 0

const navbar = document.querySelector("#navbar")
const main = document.querySelector("#main")
const searchField = document.querySelector("#search-field")
const body = document.querySelector("body")
const themeSwitch = document.querySelector("#theme-switch")

// Select all buttons on website

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
