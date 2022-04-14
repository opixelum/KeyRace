const customizationMenu = document.querySelector('#customization-menu')
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
        customizationMenu.innerHTML = `
        <button id="helmet-btn" class="btn col-2">Helmet</button>
        <button id="visor-btn" class="btn col-2">Visor</button>
        <button id="vest-btn" class="btn col-2">Vest</button>
        <button id="background-btn" class="btn col-2">Background</button>
        `
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
