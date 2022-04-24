let helmet = new Image()
let vest = new Image()
let visor = new Image()

// TO DO: Get current user's assets from database 
// Set default values
helmet.src = "src/images/avatar/helmet/default/helmet_default_helmet_white.png"
vest.src = "src/images/avatar/vest/vintage/ix/body_vintage_ix_marron.png"
visor.src = "src/images/avatar/visor/default/helmet_default_visor_white.png"
let background = "white"

const setHelmet = () => {
    helmet.src = document.querySelector("input[name='helmet']:checked").value
    buildAvatar()
}

const setVisor = () => {
    visor.src = document.querySelector("input[name='visor']:checked").value
    buildAvatar()
}

const setVest = () => {
    vest.src = document.querySelector("input[name='vest']:checked").value
    buildAvatar()
}

const setBackground = () => {
    background = document.querySelector("input[name='background']:checked").value
    buildAvatar()
}

function buildAvatar() {
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
