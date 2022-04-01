const backBtn = document.querySelector(`#back-btn`)
if (backBtn) {
    backBtn.addEventListener('click', () => {
        window.location.href = `http://localhost/KeyRace/settings.php`
    })
}

const saveBtn = document.querySelector(`#save-btn`)
if (saveBtn) {
    saveBtn.addEventListener('click', () => {
        window.location.href = `http://localhost/KeyRace/src/scripts/php/update.php`
    })
}
