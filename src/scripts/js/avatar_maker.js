let helmet = new Image()
let vest = new Image()
let visor = new Image()
let background

const assetsRoot = "src/images/avatar/"

// Assets saved in the database
let savedHelmet
let savedVisor
let savedVest
let savedBackground

// Get assets from database with AJAX
const xhr = new XMLHttpRequest()
xhr.open("GET", "src/scripts/php/get_assets.php")
xhr.send()
xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
        const assets = JSON.parse(xhr.responseText)
        savedHelmet = assets.helmet
        savedVisor = assets.visor
        savedVest = assets.vest
        savedBackground = assets.background

        helmet.src = assetsRoot + `helmet/` + savedHelmet + `.png`
        visor.src = assetsRoot + `visor/` + savedVisor + `.png`
        vest.src = assetsRoot + `vest/` + savedVest + `.png`
        background = savedBackground
    }
}

// Assets choosen in the avatar maker
let choosenHelmet
let choosenVisor 
let choosenVest
let choosenBackground

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

const buildAvatar = () => {
    const avatar = document.querySelector("#avatarCanvas")
    const context = avatar.getContext("2d")

    // Set image size
    avatar.width = 500
    avatar.height = 500

    // Draw rectangle as background
    context.beginPath()
    context.rect(0, 0, 500, 500)
    context.fillStyle = background
    context.fill()

    // Place images on canvas
    context.drawImage(vest, 0, 0)
    context.drawImage(helmet, 0, 0)
    context.drawImage(visor, 0, 0)
}

const saveAvatar = () => {
    // Save avatar to database with AJAX
    const saveAvatar = new XMLHttpRequest()
    saveAvatar.open("POST", "src/scripts/php/save_avatar.php")
    saveAvatar.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    saveAvatar.send(`\
        helmet=${choosenHelmet}&\
        visor=${choosenVisor}&\
        vest=${choosenVest}&\
        background=${background}\
    `)
    saveAvatar.onreadystatechange = () => {
        if (saveAvatar.readyState === 4 && saveAvatar.status === 200) {
            const response = saveAvatar.responseText
            if (response != 1) alert("An error occured while saving your avatar. Please try again later.")
            else alert("Your avatar has been saved!")
        }
    }
}
