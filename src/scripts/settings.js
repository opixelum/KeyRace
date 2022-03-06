let mode = 0
const Navbar = document.querySelector("#navbar")
const Main = document.querySelector("#main")
const sign_in_btn = document.querySelector("#sign-in-btn")
const log_in_btn = document.querySelector("#log-in-btn")
const leaderboard_btn = document.querySelector("#leaderboard-btn")
const settings_btn = document.querySelector("#settings-btn")
const start_btn = document.querySelector("#start-btn")
const search_field = document.querySelector("#search-field")
const body = document.querySelector("body")
const btnList = {
    sign_in_btn,
    log_in_btn,
    leaderboard_btn,
    settings_btn,
    start_btn,
    search_field
}

//Dark mode / Light mode
const modeBtn = document.querySelector("#mode-btn")
modeBtn.addEventListener("click", function() {
    if (mode == 0) {
        Navbar.className = "navbar col-2 p-0 me-2 rounded rgb-shadow-light"
        Main.className = "main col ms-2 rounded rgb-shadow-light"
        body.style.backgroundColor = "#ffffff"
        for (let i = 0; i < btnList.length; i++) {
            btnList[i].style.color = "#ffffff"
        }
        mode = 1
    }
    else {
        Navbar.className = "navbar col-2 p-0 me-2 rounded rgb-shadow-dark"
        Main.className = "main col ms-2 rounded rgb-shadow-dark"
        body.style.backgroundColor = "#000000";
        for (let i = 0; i < btnList.length; i++) {
            btnList[i].style.color = "#000000"
        }
        mode = 0
    }
})
