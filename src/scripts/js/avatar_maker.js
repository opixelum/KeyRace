// Choose a sub_selection (Helmet, Vest or Visor)
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
        const dropdownMenu = document.querySelector('#dropdown-menu')
        dropdownMenu.innerHTML = `
        <label for="helmet">Choose a helmet:</label>
        <select name="helmet" id="helmet-dropdown"></select>
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
        const dropdownMenu = document.querySelector('#dropdown-menu')
        dropdownMenu.innerHTML = `
        <label for="visor">Choose a visor:</label>
        <select name="visor" id="visor-dropdown"></select>
        `
    })
}

const vestBtn = document.querySelector('#vest-btn')
if (vestBtn) {
    vestBtn.addEventListener('click', () => {
        const subSelection = document.querySelector('#sub-selection')
        subSelection.innerHTML = `
            <div class="w-100 justify-content-evenly d-flex">
            <button id="vest-road-btn" class="btn col-2">Road</button>
            <button id="vest-cross-btn" class="btn col-2">Vintage</button>
            <button id="vest-sport-btn" class="btn col-2">Cross</button>
            <button id="vest-race-btn" class="btn col-2">Race</button>
            </div>
        `
        const dropdownMenu = document.querySelector('#dropdown-menu')
        dropdownMenu.innerHTML = `
        <label for="vest">Choose a vest:</label>
        <select name="vest" id="vest-dropdown"></select>
        `
    })
}

const backgroundBtn = document.querySelector('#background-btn')
if (backgroundBtn) {
    backgroundBtn.addEventListener('click', () => {
        const dropdownMenu = document.querySelector('#dropdown-menu')
        dropdownMenu.innerHTML = `
            <label for="bg-color">Choose a background color:</label>
            <select name="bg-color" id="bg-color-dropdown">
                <option value="rgb(255,255,255)">White</option>
                <option value="rgb(255,0,0)">Red</option>
                <option value="rgb(255,150,0)">Orange</option>
                <option value="rgb(255,255,0)">Yellow</option>
                <option value="rgb(0,255,0)">Green</option>
                <option value="rgb(0,255,255)">Cyan</option>
                <option value="rgb(0,0,255)">Blue</option>
                <option value="rgb(150,0,255)">Purple</option>
                <option value="rgb(255,0,255)">Pink</option>
                <option value="rgb(0,0,0)">Black</option>
            </select>
        `
    })
}

const helmetDropdown = document.querySelector('#helmet-dropdown')
const vestDropdown = document.querySelector('#vest-dropdown')

// Choose the category if the selection is helmet
const helmetDefaultBtn = document.querySelector('#helmet-default-btn')
if (helmetDefaultBtn) {
    helmetDefaultBtn.addEventListener('click', () => {
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="special">Special</option>
        `

        helmetDropdown.addEventListener('click', () => {
            helmetChoice("default", helmetDropdown.value)
        })
    })
}

const helmetDuckBtn = document.querySelector('#helmet-duck-btn')
if (helmetDuckBtn) {
    helmetDuckBtn.addEventListener('click', () => {
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="red">Red</option>
        <option value="white">White</option>
        <option value="yellow">Yellow</option>
        <option value="special">Special</option>
        `

        helmetDropdown.addEventListener('click', () => {
            helmetChoice("duck", helmetDropdown.value)
        })
    })
    
}

const helmetCrossBtn = document.querySelector('#helmet-cross-btn')
if (helmetCrossBtn) {
    helmetCrossBtn.addEventListener('click', () => {
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="blue">Blue</option>
        <option value="white">White</option>
        <option value="orange">Orange</option>
        `

        helmetDropdown.addEventListener('click', () => {
            helmetChoice("cross", helmetDropdown.value)
        })
    })
    
}

const helmetSportBtn = document.querySelector('#helmet-sport-btn')
if (helmetSportBtn) {
    helmetSportBtn.addEventListener('click', () => {
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

        helmetDropdown.addEventListener('click', () => {
            helmetChoice("sport", helmetDropdown.value)
        })
    })
    
}

const helmetRaceBtn = document.querySelector('#helmet-race-btn')
if (helmetRaceBtn) {
    helmetRaceBtn.addEventListener('click', () => {
        helmetDropdown.innerHTML = `
        <option value="black">Black</option>
        <option value="LS">LS</option>
        <option value="white">White</option>
        <option value="WC">WC</option>
        <option value="WT">WT</option>
        <option value="futuro">Futuro</option>
        <option value="speciale">Speciale</option>
        `

        helmetDropdown.addEventListener('click', () => {
            helmetChoice("race", helmetDropdown.value)
        })
    })
   
}


// Choose the category if the selection is vest
const vestRoadBtn = document.querySelector('#vest-road-btn')
if (vestRoadBtn) {
    vestRoadBtn.addEventListener('click', () => {
        vestDropdown.innerHTML = `
        <option value="ix">IX</option>
        <option value="long">Long</option>
        `

        vestDropdown.addEventListener('click', () => {
            vestChoice("road",  "brand", vestDropdown.value)
        })
    })
}


// Build the avatar

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
