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

const interfaceBtn = document.querySelector('#interface-btn')
if (interfaceBtn) {
    interfaceBtn.addEventListener('click', () => {
        customizationMenu.innerHTML = `
        <h1>Interface</h1>
        `
    })
}

const shopBtn = document.querySelector('#shop-btn')
if (shopBtn) {
    shopBtn.addEventListener('click', () => {
        customizationMenu.innerHTML = `
        <h1>Shop</h1>
        `
    })
}
