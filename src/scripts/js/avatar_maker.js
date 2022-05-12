const assetsRoot = "src/images/avatar/"

// Savec assets
let savedVestName, savedHelmetName, savedVisorName, savedBackground

// Assets used for the building process
let vestName, helmetName, visorName, background

// Images elements
let vestImage, helmetImage, visorImage

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
    savedVestName = assets.vest
    savedHelmetName = assets.helmet
    savedVisorName = assets.visor

    background = assets.background
    vestName = assets.vest
    helmetName = assets.helmet
    visorName = assets.visor

    // Load images
    loadImage(assetsRoot + "vest/" + vestName + `.png`)
    .then(img => vestImage = img)

    .then(() => loadImage(assetsRoot + "helmet/" + helmetName + `.png`)
    .then(img => helmetImage = img))

    .then(() => loadImage(assetsRoot + "visor/" + visorName + `.png`)
    .then(img => visorImage = img))

    .then(() => {
        buildAvatar()
    })
})

const setVest = () => {
    vestName = document.querySelector("input[name='vest']:checked").value
    vestImage.src = assetsRoot + "vest/" + vestName + `.png`
    buildAvatar()
}

const setHelmet = () => {
    helmetName = document.querySelector("input[name='helmet']:checked").value
    helmetImage.src = assetsRoot + "helmet/" + helmetName + `.png`
    buildAvatar()
}

const setVisor = () => {
    visorName = document.querySelector("input[name='visor']:checked").value
    visorImage.src = assetsRoot + "visor/" + visorName + `.png`
    buildAvatar()
}

const setBackground = () => {
    background = document.querySelector("input[name='background']:checked").value
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
        context.drawImage(vestImage, 0, 0, width, height)
        context.drawImage(helmetImage, 0, 0, width, height)
        context.drawImage(visorImage, 0, 0, width, height)
    }
}

/**
 * Cancel avatar editing. Reset to saved assets
 */
const cancelAvatarEdit = () => {
    vestName = savedVestName
    vestImage.src = assetsRoot + "vest/" + vestName + `.png`

    helmetName = savedHelmetName
    helmetImage.src = assetsRoot + "helmet/" + helmetName + `.png`

    visorName = savedVisorName
    visorImage.src = assetsRoot + "visor/" + visorName + `.png`

    background = savedBackground

    buildAvatar()
}

/**
 * Save avatar in database with AJAX
 */
const saveAvatar = () => {
    // Save avatar to database with AJAX
    const saveAvatar = new XMLHttpRequest()
    saveAvatar.open("POST", "src/scripts/php/save_avatar.php")
    saveAvatar.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    saveAvatar.send(`\
        vest=${vestName}&\
        helmet=${helmetName}&\
        visor=${visorName}&\
        background=${background}\
    `)
    saveAvatar.onreadystatechange = () => {
        if (saveAvatar.readyState === 4 && saveAvatar.status === 200) {
            const response = saveAvatar.responseText
            if (response != 1) alert("An error occured while saving your avatar. Please try again later.")
            else window.location.href = `profile.php`
        }
    }
}
