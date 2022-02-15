window.onload = function() {
    // Helmet
    const helmetDropdown = document.querySelector("#helmet-dropdown")
    helmetDropdown.addEventListener("change", function() {
        const helmetNum = helmetDropdown.value
        const helmetName = "helmet" + helmetNum + ".png"
        helmet.src = "assets/helmets/" + helmetName
    })

    const helmet = new Image();
    const helmetNum = helmetDropdown.value
    const helmetName = "helmet" + helmetNum + ".png"
    helmet.src = "assets/helmets/" + helmetName

    helmet.onload = function() {
        buildAvatar()
    }


    // Vest
    const vestDropdown = document.querySelector("#vest-dropdown")
    vestDropdown.addEventListener("change", function() {
        const vestNum = vestDropdown.value
        const vestName = "vest" + vestNum + ".png"
        vest.src = "assets/vests/" + vestName 
    })

    const vest = new Image();
    const vestNum = vestDropdown.value
    const vestName = "vest" + vestNum + ".png"
    vest.src = "assets/vests/" + vestName 

    vest.onload = function() {
        buildAvatar()
    }


    // Add all assets to the avatar
    function buildAvatar() {
        const avatar = document.querySelector("#avatar")
        const context = avatar.getContext("2d")
        avatar.width = 300
        avatar.height = 300

        context.drawImage(vest, 0, 0)
        context.drawImage(helmet, 0, 0)
    }
}