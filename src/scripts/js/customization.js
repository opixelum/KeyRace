const avatarBtn = document.querySelector('#avatar-btn')
if (avatarBtn) {
    avatarBtn.addEventListener('click', () => {
        const avatarMenu = document.querySelector('#avatar-menu')
        avatarMenu.innerHTML = `
        <button id="car-btn" class="btn col-2">Helmet</button>
        <button id="avatar-btn" class="btn col-2">Visor</button>
        <button id="interface-btn" class="btn col-2">Vest</button>
        <button id="shop-btn" class="btn col-2">Background</button>
        `
        
    })
}
