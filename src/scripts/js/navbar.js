/**
 * @file navbar.js
 * 
 * @brief Script for the navbar. 
 * 
 * @author Anto "Opixelum" Benedetti
 * @author Romain "Invorom" Nerot
 * @author Jérémy "Saygel" Micu
 */


function getCookie(key) {
    var keyEQ = key + "=";
    var cookies = document.cookie.split(';');

    for (let cookie of cookies) {
        while (cookie.charAt(0)==' ') {
            cookie = cookie.substring(1, cookie.length);
        }

        if (cookie.indexOf(keyEQ) == 0) {
            return cookie.substring(keyEQ.length, cookie.length);
        }
    }
    return null;
}

if (getCookie("isLoggedIn")) {
    // If user isn't logged in

    // Profile button
    const profileBtn = document.querySelector("#profile-btn")
    profileBtn.addEventListener("click", () => {
        window.location.href = "./profile.php"
    })

    // Campaign button
    const campaignBtn = document.querySelector("#campaign-btn")
    campaignBtn.addEventListener("click", () => {
        window.location.href = "./campaign.php"
    })

    // Multiplayer button
    const multiplayerBtn= document.querySelector("#multiplayer-btn")
    multiplayerBtn.addEventListener("click", () => {
        window.location.href = "./multiplayer.php"
    })

    // Training button
    const trainingBtn = document.querySelector("#training-btn")
    trainingBtn.addEventListener("click", () => {
        window.location.href = "./training.php"
    })

    // Customization button
    const customizationBtn = document.querySelector("#customization-btn")
    customizationBtn.addEventListener("click", () => {
        window.location.href = "./customization.php"
    })
} else {
    // If user is logged in

    // Sign in button
    const signUpBtn = document.querySelector("#sign-up-btn")
    signUpBtn.addEventListener("click", () => {
        window.location.href = "./signup.php"
    })

    // Log in button
    const logInBtn = document.querySelector("#log-in-btn")
    logInBtn.addEventListener("click", () => {
        window.location.href = "./login.php"
    })
}

// Leaderboard button
const leaderboardBtn = document.querySelector("#leaderboard-btn")
leaderboardBtn.addEventListener("click", () => {
    window.location.href = "./leaderboard.php"
})

// Settings button
const settingsBtn = document.querySelector("#settings-btn")
settingsBtn.addEventListener("click", () => {
    window.location.href = "./settings.php"
})
