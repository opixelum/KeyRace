const assetsRoot = "src/images/avatar/"

// Assets used for the building process
let background
let vest
let helmet
let visor

// Assets saved in the database
let savedBackground
let savedVest
let savedHelmet
let savedVisor

// Assets choosen in the avatar maker
let choosenBackground
let choosenVest
let choosenHelmet
let choosenVisor 

// Get assets from database with AJAX
const response = new Promise(resolve => {
    const xhr = new XMLHttpRequest()
    xhr.open("GET", "src/scripts/php/get_assets.php")
    xhr.send()
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            resolve(JSON.parse(xhr.responseText))
        }
    }
}).then(assets => {
    savedBackground = assets.background
    savedVest = assets.vest
    savedHelmet = assets.helmet
    savedVisor = assets.visor

    background = savedBackground

    // Load images
    loadImage(assetsRoot + "vest/" + savedVest + `.png`)
    .then(img => vest = img)

    .then(() => loadImage(assetsRoot + "helmet/" + savedHelmet + `.png`)
    .then(img => helmet = img))

    .then(() => loadImage(assetsRoot + "visor/" + savedVisor + `.png`)
    .then(img => visor = img))

    .then(() => buildAvatar())
})

const setHelmet = () => {
    choosenHelmet = document.querySelector("input[name='helmet']:checked").value
    helmet.src = assetsRoot + "helmet/" + choosenHelmet + `.png`
    buildAvatar()
}

const setVisor = () => {
    choosenVisor = document.querySelector("input[name='visor']:checked").value
    visor.src = assetsRoot + "visor/" + choosenVisor + `.png`
    buildAvatar()
}

const setVest = () => {
    choosenVest = document.querySelector("input[name='vest']:checked").value
    vest.src = assetsRoot + "vest/" + choosenVest + `.png`
    buildAvatar()
}

const setBackground = () => {
    choosenBackground = document.querySelector("input[name='background']:checked").value
    background = choosenBackground
    buildAvatar()
}

/**
 * Await for image to load before building avatar
 * @param {string} imageUrl URL of image to load 
 * @returns {HTMLImageElement} Image element
 */
const loadImage = async imageUrl => {
    let img
    const imageLoadPromise = new Promise(resolve => {
        img = new Image()
        img.onload = resolve
        img.src = imageUrl
    })
    await imageLoadPromise
    return img
}

/**
 * Build avatar from assets on the canvas
 */
const buildAvatar = () => {
    const avatar = document.querySelector("#avatar-canvas")
    if (avatar) {
        const context = avatar.getContext("2d")

        const width = avatar.width
        const height = avatar.height

        // Draw rectangle as background
        context.beginPath()
        context.rect(0, 0, width, height)
        context.fillStyle = background
        context.fill()

        // Place images on canvas
        context.drawImage(vest, 0, 0, width, height)
        context.drawImage(helmet, 0, 0, width, height)
        context.drawImage(visor, 0, 0, width, height)
    }
}

/**
 * Save avatar in database with AJAX
 */
const saveAvatar = () => {
    const saveAvatar = new XMLHttpRequest()
    saveAvatar.open("POST", "src/scripts/php/save_avatar.php")
    saveAvatar.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    saveAvatar.send(`\
        vest=${choosenVest}&\
        helmet=${choosenHelmet}&\
        visor=${choosenVisor}&\
        background=${background}\
    `)
    saveAvatar.onreadystatechange = () => {
        if (saveAvatar.readyState === 4 && saveAvatar.status === 200) {
            const response = saveAvatar.responseText
            if (response != 1) alert("An error occured while saving your avatar. Please try again later.")
            else if (response == 1) window.location.href = "profile.php"
        }
    }
}
