//Dark mode / Light mode

let mode = 0
const navbar = document.querySelector("#navbar")
const main = document.querySelector("#main")
const sign_in_btn = document.querySelector("#sign-in-btn")
const log_in_btn = document.querySelector("#log-in-btn")
const leaderboard_btn = document.querySelector("#leaderboard-btn")
const settings_btn = document.querySelector("#settings-btn")
const start_btn = document.querySelector("#start-btn")
const search_field = document.querySelector("#search-field")
const body = document.querySelector("body")
const modeBtn = document.querySelector("#mode-btn")
const btnList = {
    sign_in_btn,
    log_in_btn,
    leaderboard_btn,
    settings_btn,
    start_btn,
    search_field,
    modeBtn
}

modeBtn.addEventListener("click", function() {
    if (mode == 0) {
        navbar.classList.add("light")
        main.classList.add("light")
        body.style.backgroundColor = "#ffffff"
        for (let i = 0; i < btnList.length; i++) {
            btnList[i].style.color = "#ffffff"
        }
        mode = 1
    }
    else {
        navbar.classList.remove("light")
        main.classList.remove("light")
        body.style.backgroundColor = "#000000";
        for (let i = 0; i < btnList.length; i++) {
            btnList[i].style.color = "#000000"
        }
        mode = 0
    }
})
