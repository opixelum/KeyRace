const helmetbtn = document.querySelector('#helmet-btn')
if (helmetbtn) {
    helmetbtn.addEventListener('click', () => {
        const subSelection = document.querySelector('#sub-selection')
        subSelection.innerHTML = `
            <div class="w-100 justify-content-evenly d-flex">
            <button id="default-btn" class="btn col-2">Default</button>
            <button id="duck-btn" class="btn col-2">Duck</button>
            <button id="cross-btn" class="btn col-2">Cross</button>
            <button id="sport-btn" class="btn col-2">Sport</button>
            <button id="race-btn" class="btn col-2">Race</button>
            </div>
        `
    })
}

const visorBtn = document.querySelector('#visor-btn')
if (visorBtn) {
    visorBtn.addEventListener('click', () => {
        const subSelection = document.querySelector('#sub-selection')
        subSelection.innerHTML = `
            <div class="w-100 justify-content-evenly d-flex">
            <button id="default-btn" class="btn col-2">Default</button>
            <button id="cross-btn" class="btn col-2">Cross</button>
            <button id="sport-btn" class="btn col-2">Sport</button>
            <button id="race-btn" class="btn col-2">Race</button>
            </div>
        `
    })
}

const vestBtn = document.querySelector('#vest-btn')
if (vestBtn) {
    vestBtn.addEventListener('click', () => {
        const subSelection = document.querySelector('#sub-selection')
        subSelection.innerHTML = `
            <div class="w-100 justify-content-evenly d-flex">
            <button id="default-btn" class="btn col-2">Road</button>
            <button id="cross-btn" class="btn col-2">Vintage</button>
            <button id="sport-btn" class="btn col-2">Cross</button>
            <button id="race-btn" class="btn col-2">Race</button>
            </div>
        `
    })
}

const defaultBtn = document.querySelector('#default-btn')
if (defaultBtn) {
    defaultBtn.addEventListener('click', () => {
        
    })
}

const crossBtn = document.querySelector('#cross-btn')
if (crossBtn) {
    crossBtn.addEventListener('click', () => {
        
    })
}

const sportBtn = document.querySelector('#sport-btn')
if (sportBtn) {
    sportBtn.addEventListener('click', () => {
        
    })
}

const raceBtn = document.querySelector('#race-btn')
if (raceBtn) {
    raceBtn.addEventListener('click', () => {
        
    })
}


window.onload = function() {
    // Helmet
    const helmetDropdown = document.querySelector("#helmet-dropdown")
    helmetDropdown.addEventListener("change", function() {
        const helmetNum = helmetDropdown.value
        const helmetName = "helmet" + helmetNum + ".png"
        helmet.src = "assets/helmets/" + helmetName
    })

    const helmet = new Image()
    const helmetNum = helmetDropdown.value
    const helmetName = "helmet" + helmetNum + ".png"
    helmet.src = "assets/helmets/" + helmetName

    helmet.onload = function() {
        buildAvatar()
    }


    // Vest
    const vestDropdown = document.querySelector("#vest-dropdown")
    vestDropdown.addEventListener("change", function() {
        const vestNum = vestDropdown.value
        const vestName = "vest" + vestNum + ".png"
        vest.src = "assets/vests/" + vestName 
    })

    const vest = new Image()
    const vestNum = vestDropdown.value
    const vestName = "vest" + vestNum + ".png"
    vest.src = "assets/vests/" + vestName

    vest.onload = function() {
        buildAvatar()
    }


    // Background color
    const bgColorDropdown = document.querySelector("#bg-color-dropdown")
    let bgColor = "white"

    bgColorDropdown.addEventListener("change", function() {
        bgColor = bgColorDropdown.value
        buildAvatar()
    })

    // Add all assets to the avatar
    function buildAvatar() {
        const avatar = document.querySelector("#avatar")
        const context = avatar.getContext("2d")
        avatar.width = 300
        avatar.height = 300

        // Draw rectangle as background
        context.beginPath()
        context.rect(0, 0, 300, 300)
        context.fillStyle = bgColor
        context.fill()

        context.drawImage(vest, 0, 0)
        context.drawImage(helmet, 0, 0)
    }
}
