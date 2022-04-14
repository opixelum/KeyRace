const customizationMenu = document.querySelector('#customization-menu')

function displayAvatarMaker() {
    
    customizationMenu.innerHTML = `
        <button id="helmet-btn" class="btn col-2">Helmet</button>
        <button id="visor-btn" class="btn col-2">Visor</button>
        <button id="vest-btn" class="btn col-2">Vest</button>
        <button id="background-btn" class="btn col-2">Background</button>
        <div id="assets-selection" class="container border"></div>
    `

    const assetsSelection = document.querySelector('#assets-selection')

    const helmetBtn = document.querySelector('#helmet-btn')
    if (helmetBtn) {
        helmetBtn.addEventListener('click', () => {
            assetsSelection.innerHTML = `

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
