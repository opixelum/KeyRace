const customizationMenu = document.querySelector('#customization-menu')

function displayAvatarMaker() {
    
    customizationMenu.innerHTML = `
        <button id="helmet-btn" class="btn col-3">Helmet</button>
        <button id="visor-btn" class="btn col-3">Visor</button>
        <button id="vest-btn" class="btn col-3">Vest</button>
        <button id="background-btn" class="btn col-3">Background</button>
        <div id="assets-selection" class="container d-flex flex-wrap border align-items-start"></div>
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
