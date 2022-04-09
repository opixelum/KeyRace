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

let helmet = new Image()
// Helmet choice
function helmetChoice(type, color) {
    const helmetDropdown = document.querySelector(`#helmet-dropdown`)
    helmetDropdown.addEventListener("change", function() {
        const helmetName = `helmet_${type}_helmet_${color}` + ".png"
        helmet.src = `./src/images/avatar/helmet/${type}/` + helmetName
    })

    const helmetName = `helmet_${type}_helmet_${color}` + ".png"
    helmet.src = `./src/images/avatar/helmet/${type}/` + helmetName

    helmet.onload = function() {
        buildAvatar()
    }
}

let vest = new Image()
// Vest choice
function vestChoice(type, brand, color) {
    const vestDropdown = document.querySelector(`#vest-dropdown`)
    vestDropdown.addEventListener("change", function() {
        const vestName = `body_${type}_${brand}_${color}` + ".png"
        vest.src = `./src/images/avatar/vest/${type}/${brand}/` + vestName
    })

    const vestName = `body_${type}_${brand}_${color}` + ".png"
    vest.src = `./src/images/avatar/vest/${type}/${brand}/` + vestName

    vest.onload = function() {
        buildAvatar()
    }
}

let visor = new Image()
// visor choice
function visorChoice(type, color) {
    const visorDropdown = document.querySelector(`#visor-dropdown`)
    visorDropdown.addEventListener("change", function() {
        const visorName = `helmet_${type}_visor_${color}` + ".png"
        visor.src = `./src/images/avatar/visor/${type}/` + visorName
    })

    const visorName = `helmet_${type}_visor_${color}` + ".png"
    visor.src = `./src/images/avatar/visor/${type}/` + visorName

    visor.onload = function() {
        buildAvatar()
    }
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

    context.drawImage(vest, -110, -110)
    context.drawImage(helmet, -110, -110)
    context.drawImage(visor, -110, -110)
}


helmetChoice("sport", "black")
vestChoice("cross", "fox", "black")
visorChoice("sport", "cyan")
