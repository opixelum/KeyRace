for (let i = 1; i <= 8; i++) {
    // Get each quest button
    const questBtn = document.querySelector(`#quest${i}-btn`)

    // Add event listener to button & redirect to corresponding quest page
    if (questBtn) {
        questBtn.addEventListener('click', () => {
            window.location.href = `http://localhost/KeyRace/campaign/${i}.php`
        })
    }
}
