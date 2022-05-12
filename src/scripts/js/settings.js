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
        let url = 'src/includes/connected_settings.php'
        const request = new XMLHttpRequest()
        request.open("GET", url)
        request.onreadystatechange = function () {
            const test = document.querySelector("#test")
            if (request.readyState === 4 && request.status === 200)
            {
                html.innerHTML = request.responseText
            }
        }
        request.send()
    })
}

// Database Button
const databaseBtn = document.querySelector("#database-btn")
if (databaseBtn) {
    databaseBtn.addEventListener("click", () => {
        let url = 'src/includes/users.php'
        const searchInput = document.querySelector("#search-input")
        if (searchInput && searchInput.value.length > 1)
        {
            url += "?search=" + searchInput.value
        }
        const request = new XMLHttpRequest()
        request.open("GET", url)
        request.onreadystatechange = function () {
            const test = document.querySelector("#test")
            if (request.readyState === 4 && request.status === 200)
            {
                test.innerHTML = request.responseText
            }
        }
        request.send()
    })
}
