window.onload = function() {
    let helmet = new Image()
    let vest = new Image()
    let visor = new Image()

    helmet.src = './src/images/avatar/helmet/sport/helmet_sport_helmet_black.png'
    helmet.onload = function() {
        buildAvatar()
    }

    function buildAvatar() {
        const avatar = document.querySelector("#avatarCanvas")
        const context = avatar.getContext("2d")
        avatar.width = 300
        avatar.height = 300
    
        // Draw rectangle as background
        context.beginPath()
        context.rect(0, 0, 300, 300)
        context.fillStyle = 'blue'
        context.fill()
    
        context.drawImage(vest, 0, 0)
        context.drawImage(helmet, 0, 0)
        context.drawImage(visor, 0, 0)
    }   
}
