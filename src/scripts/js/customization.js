const carBtn = document.querySelector('#car-btn')
if (carBtn) {
    carBtn.addEventListener('click', () => {
        customizationMenu.innerHTML = `
        <h1>Customize your car</h1>
        `
    })
}

const avatarBtn = document.querySelector('#avatar-btn')
if (avatarBtn) {
    avatarBtn.addEventListener('click', () => {
        displayAvatarMaker()
    })
}
