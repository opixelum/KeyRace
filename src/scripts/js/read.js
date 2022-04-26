const backBtn = document.querySelector(`#back-btn`)
if (backBtn) {
    backBtn.addEventListener('click', () => {
        window.location.href = `settings.php`
    })
}

const saveBtn = document.querySelector(`#save-btn`)
if (saveBtn) {
    saveBtn.addEventListener('click', () => {
        window.location.href = `src/scripts/php/update.php`
    })
}
