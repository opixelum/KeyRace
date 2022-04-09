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



// Helmet choice
function helmetChoice(type, color) {
    const helmetDropdown = document.querySelector(`#helmet-dropdown-${type}`)
    helmetDropdown.addEventListener("change", function() {
        const helmetName = `helmet_${type}_helmet_${color}` + ".png"
        helmet.src = `images/avatar/helmet/${type}/` + helmetName
    })

    const helmet = new Image()
    const helmetName = `helmet_${type}_helmet_${color}` + ".png"
    helmet.src = `images/avatar/helmet/${type}/` + helmetName

    helmet.onload = function() {
        buildAvatar()
    }
}


// Vest choice
function vestChoice(type, brand, color) {
    const vestDropdown = document.querySelector(`#vest-dropdown-${type}`)
    vestDropdown.addEventListener("change", function() {
        const vestName = `body_${type}_${brand}_${color}` + ".png"
        vest.src = `images/avatar/vest/${type}/${brand}/` + vestName
    })

    const vest = new Image()
    const vestName = `body_${type}_${brand}_${color}` + ".png"
    vest.src = `images/avatar/vest/${type}/${brand}/` + vestName

    vest.onload = function() {
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

        context.drawImage(vest, 0, 0)
        context.drawImage(helmet, 0, 0)
    }

