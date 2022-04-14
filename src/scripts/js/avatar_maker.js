const customizationMenu = document.querySelector('#customization-menu')

function displayAvatarMaker() {
    
    customizationMenu.innerHTML = `
        <button id="helmet-btn" class="btn col-3">Helmet</button>
        <button id="visor-btn" class="btn col-3">Visor</button>
        <button id="vest-btn" class="btn col-3">Vest</button>
        <button id="background-btn" class="btn col-3">Background</button>
        <div id="assets-selection" class="container d-flex flex-wrap border align-items-start h-75"></div>
    `

    const assetsSelection = document.querySelector('#assets-selection')

    const helmetBtn = document.querySelector('#helmet-btn')
    if (helmetBtn) {
        helmetBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
                <div id="cross-helmet" class="row">
                    <p class="w-100 m-0">Cross</p>
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_blue.png">
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_white.png">
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_orange.png">
                </div>
                <div id="sport-helmet" class="row">
                    <p class="w-100 m-0">Sport</p>
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_blue.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_white.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_pink.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_red.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_dreamtime.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_mugello.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_soleluna.png">
                    <img class="w-25" src="src/images/avatar/helmet/sport/helmet_sport_helmet_test.png">
                </div>
                <div id="race-helmet" class="row">
                    <p class="w-100 m-0">Race</p>
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_futuro.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_LS.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_speciale.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_WC.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_WT.png">
                </div>
                <div id="default-helmet" class="row">
                    <p class="w-100 m-0">Default</p>
                    <img class="w-25" src="src/images/avatar/helmet/default/helmet_default_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/default/helmet_default_helmet_white.png">
                    <img class="w-25" src="src/images/avatar/helmet/default/helmet_default_helmet_special.png">
                </div>
                <div id="duck-helmet" class="row">
                <p class="w-100 m-0">Duck</p>
                <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_black.png">
                <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_white.png">
                <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_red.png">
                <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_yellow.png">
                <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_special.png">
            </div>
            `
        })
    }

    const visorBtn = document.querySelector('#visor-btn')
    if (visorBtn) {
        visorBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
            
            `
        })
    }

    const vestBtn = document.querySelector('#vest-btn')
    if (vestBtn) {
        vestBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
            
            `
        })
    }

    const backgroundBtn = document.querySelector('#background-btn')
    if (backgroundBtn) {
        backgroundBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
            
            `
        })
    }

}
