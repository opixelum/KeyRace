let helmet = new Image()
let vest = new Image()
let visor = new Image()

// TO DO: Get current user's assets from database 
helmet.src = './src/images/avatar/helmet/sport/helmet_sport_helmet_black.png'
vest.src = './src/images/avatar/vest/race/fur/body_race_fur_black.png'
visor.src = `./src/images/avatar/visor/race/helmet_race_visor_white.png`

function buildAvatar() {
    const avatar = document.querySelector("#avatarCanvas")
    const context = avatar.getContext("2d")

    // Set image size
    avatar.width = 500
    avatar.height = 500

    // Draw rectangle as background
    context.beginPath()
    context.rect(0, 0, 500, 500)
    context.fillStyle = 'blue'
    context.fill()

    // Place images on canvas
    context.drawImage(vest, 0, 0)
    context.drawImage(helmet, 0, 0)
    context.drawImage(visor, 0, 0)
}
