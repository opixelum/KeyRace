const avatarBtn = document.querySelector('#avatar-btn')
if (avatarBtn) {
    avatarBtn.addEventListener('click', () => {
        const avatarMenu = document.querySelector('#customization-menu')
        avatarMenu.innerHTML = `
        <button id="helmet-btn" class="btn col-2">Helmet</button>
        <button id="visor-btn" class="btn col-2">Visor</button>
        <button id="vest-btn" class="btn col-2">Vest</button>
        <button id="background-btn" class="btn col-2">Background</button>
        `
        
    })
}
