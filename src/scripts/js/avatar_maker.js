const helmetbtn = document.querySelector('#helmet-btn')
if (helmetbtn) {
    helmetbtn.addEventListener('click', () => {
        const subSelection = document.querySelector('#sub-selection')
        subSelection.innerHTML = `
            <div class="w-100 justify-content-evenly d-flex">
            <button id="helmet-default-btn" class="btn col-2">Default</button>
            <button id="helmet-duck-btn" class="btn col-2">Duck</button>
            <button id="helmet-cross-btn" class="btn col-2">Cross</button>
            <button id="helmet-sport-btn" class="btn col-2">Sport</button>
            <button id="helmet-race-btn" class="btn col-2">Race</button>
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
            <button id="visor-default-btn" class="btn col-2">Default</button>
            <button id="visor-cross-btn" class="btn col-2">Cross</button>
            <button id="visor-sport-btn" class="btn col-2">Sport</button>
            <button id="visor-race-btn" class="btn col-2">Race</button>
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
            <button id="vest-default-btn" class="btn col-2">Road</button>
            <button id="vest-cross-btn" class="btn col-2">Vintage</button>
            <button id="vest-sport-btn" class="btn col-2">Cross</button>
            <button id="vest-race-btn" class="btn col-2">Race</button>
            </div>
        `
    })
}

const defaultBtn = document.querySelector('#helmet-default-btn')
if (defaultBtn) {
    defaultBtn.addEventListener('click', () => {
        const helmetDropdown = document.querySelector('#helmet-dropdown')
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="special">Special</option>
        `
    })
}

const duckBtn = document.querySelector('#helmet-duck-btn')
if (duckBtn) {
    duckBtn.addEventListener('click', () => {
        const helmetDropdown = document.querySelector('#helmet-dropdown')
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="red">Red</option>
        <option value="white">White</option>
        <option value="yellow">Yellow</option>
        <option value="special">Special</option>
        `
    })
}

const crossBtn = document.querySelector('#helmet-cross-btn')
if (crossBtn) {
    crossBtn.addEventListener('click', () => {
        const helmetDropdown = document.querySelector('#helmet-dropdown')
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="blue">Blue</option>
        <option value="white">White</option>
        <option value="orange">Orange</option>
        `
    })
}

const sportBtn = document.querySelector('#helmet-sport-btn')
if (sportBtn) {
    sportBtn.addEventListener('click', () => {
        const helmetDropdown = document.querySelector('#helmet-dropdown')
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="blue">Blue</option>
        <option value="white">White</option>
        <option value="pink">Pink</option>
        <option value="red">Red</option>
        <option value="test">Test</option>
        <option value="dreamtime">Dreamtime</option>
        <option value="mugello">Mugello</option>
        <option value="soleluna">Soleluna</option>
        `
    })
}

const raceBtn = document.querySelector('#helmet-race-btn')
if (raceBtn) {
    raceBtn.addEventListener('click', () => {
        const helmetDropdown = document.querySelector('#helmet-dropdown')
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="LS">LS</option>
        <option value="white">White</option>
        <option value="WC">WC</option>
        <option value="WT">WT</option>
        <option value="futuro">Futuro</option>
        <option value="speciale">Speciale</option>
        `
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
