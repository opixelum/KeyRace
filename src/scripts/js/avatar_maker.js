const customizationMenu = document.querySelector('#customization-menu')

function displayAvatarMaker() {
    
    customizationMenu.innerHTML = `
        <button id="helmet-btn" class="btn col-3">Helmet</button>
        <button id="visor-btn" class="btn col-3">Visor</button>
        <button id="vest-btn" class="btn col-3">Vest</button>
        <button id="background-btn" class="btn col-3">Background</button>
        <div id="assets-selection" class="container d-flex flex-wrap border rounded-3 align-items-start h-75"></div>
        <canvas id="avatar"></canvas>
    `

    const assetsSelection = document.querySelector('#assets-selection')

    const helmetBtn = document.querySelector('#helmet-btn')
    if (helmetBtn) {
        helmetBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
                <div id="default-helmet" class="row">
                    <p class="w-100 m-0 bg-dark">Default</p>
                    <img class="w-25" src="src/images/avatar/helmet/default/helmet_default_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/default/helmet_default_helmet_white.png">
                    <img class="w-25" src="src/images/avatar/helmet/default/helmet_default_helmet_special.png">
                </div>
                <hr>
                <div id="duck-helmet" class="row">
                    <p class="w-100 m-0 bg-dark">Duck</p>
                    <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_white.png">
                    <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_red.png">
                    <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_yellow.png">
                    <img class="w-25" src="src/images/avatar/helmet/duck/helmet_duck_helmet_special.png">
                </div>
                <hr>
                <div id="cross-helmet" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_blue.png">
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_white.png">
                    <img class="w-25" src="src/images/avatar/helmet/cross/helmet_cross_helmet_orange.png">
                </div>
                <hr>
                <div id="sport-helmet" class="row">
                    <p class="w-100 m-0 bg-dark">Sport</p>
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
                <hr>
                <div id="race-helmet" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_black.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_futuro.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_LS.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_speciale.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_WC.png">
                    <img class="w-25" src="src/images/avatar/helmet/race/helmet_race_helmet_WT.png">
                </div>
            `
        })
    }

    const visorBtn = document.querySelector('#visor-btn')
    if (visorBtn) {
        visorBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
                <div id="default-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Default</p>
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_black.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_blue.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_cyan.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_green.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_orange.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_pink.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_purple.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_red.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_white.png">
                    <img class="w-25" src="src/images/avatar/visor/default/helmet_default_visor_yellow.png">
                </div>
                <hr>
                <div id="cross-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_black.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_blue.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_cyan.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_green.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_orange.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_pink.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_purple.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_red.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_white.png">
                    <img class="w-25" src="src/images/avatar/visor/cross/helmet_cross_visor_yellow.png">
                </div>
                <hr>
                <div id="sport-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Sport</p>
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_black.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_blue.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_cyan.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_green.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_orange.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_pink.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_purple.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_red.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_white.png">
                    <img class="w-25" src="src/images/avatar/visor/sport/helmet_sport_visor_yellow.png">
                </div>
                <hr>
                <div id="race-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_black.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_blue.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_cyan.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_green.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_orange.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_pink.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_purple.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_red.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_white.png">
                    <img class="w-25" src="src/images/avatar/visor/race/helmet_race_visor_yellow.png">
                </div>
            `
        })
    }

    const vestBtn = document.querySelector('#vest-btn')
    if (vestBtn) {
        vestBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
                <div id="vintage-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Vintage</p>
                    <img class="w-25" src="src/images/avatar/vest/vintage/alp/body_vintage_alp_black.png">
                    <img class="w-25" src="src/images/avatar/vest/vintage/har/body_vintage_har_grey.png">
                    <img class="w-25" src="src/images/avatar/vest/vintage/ix/body_vintage_ix_marron.png">
                </div>
                <hr>
                <div id="cross-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <img class="w-25" src="src/images/avatar/vest/cross/alp/body_cross_alp_black.png">
                    <img class="w-25" src="src/images/avatar/vest/cross/fox/body_cross_fox_black.png">
                </div>
                <hr>
                <div id="road-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Road</p>
                    <img class="w-25" src="src/images/avatar/vest/road/ix/body_road_ix_black.png">
                    <img class="w-25" src="src/images/avatar/vest/road/long/body_road_long_black.png">
                </div>
                <hr>
                <div id="race-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <img class="w-25" src="src/images/avatar/vest/race/dns/body_race_dns_black.png">
                    <img class="w-25" src="src/images/avatar/vest/race/fur/body_race_fur_black.png">
                </div>
            `
        })
    }

    const backgroundBtn = document.querySelector('#background-btn')
    if (backgroundBtn) {
        backgroundBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `
                <div class="w-100 d-flex flex-wrap" id="classic-backgrounds" class="row">
                    <p class="w-100 m-0 bg-dark">Classic backgrounds</p>
                    <div id="black-div"><p></p></div>
                    <div id="white-div"><p></p></div>
                </div>
                <div class="w-100 d-flex flex-wrap" id="primary-backgrounds" class="row">
                    <p class="w-100 m-0 bg-dark">Primary backgrounds</p>
                    <div id="red-div"><p></p></div>
                    <div id="green-div"><p></p></div>
                    <div id="blue-div"><p></p></div>
                </div>
                <div class="w-100 d-flex flex-wrap" id="mix-backgrounds" class="row">
                    <p class="w-100 m-0 bg-dark">Mix backgrounds</p>
                    <div id="cyan-div"><p></p></div>
                    <div id="orange-div"><p></p></div>
                    <div id="pink-div"><p></p></div>
                    <div id="purple-div"><p></p></div>
                    <div id="yellow-div"><p></p></div>                 
                </div>
            `
        })
    }

    const avatar = document.querySelector("#avatar")
    const context = avatar.getContext("2d")
    avatar.width = 300
    avatar.height = 300

    // Draw rectangle as background
    context.beginPath()
    context.rect(0, 0, 300, 300)
    context.fillStyle = black
    context.fill()

    context.drawImage(vest, -110, -110)
    context.drawImage(helmet, -110, -110)
    context.drawImage(visor, -110, -110)
}
