let helmet = new Image()
let vest = new Image()
let visor = new Image()

// TO DO: Get current user's assets from database 
// Set default values
const assetsRoot = "src/images/avatar/"

let choosenHelmet = `default/white`
let choosenVisor = `default/white`
let choosenVest = `vintage/ix/brown`
let background = "white"

helmet.src = assetsRoot + `helmet/` + choosenHelmet + `.png`
visor.src = assetsRoot + `visor/` + choosenVisor + `.png`
vest.src = assetsRoot + `vest/` + choosenVest + `.png`

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
    background = document.querySelector("input[name='background']:checked").value
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

    console.log("Avatar built!")
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