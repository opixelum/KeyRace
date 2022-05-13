function backBtn() {
    window.location.href = "settings.php";
}

// Get id from url
let editId = window.location.search.split('=')[1]
const saveBtn = document.querySelector(`#save-btn`)
if (saveBtn) {
    saveBtn.addEventListener('click', () => {
        window.location.href = `src/scripts/php/update.php?id=${editId}`
    })
}

// If user clicked
const userClicked = document.querySelector(`#user-edit`)
if (userClicked) {
    userClicked.addEventListener('click', () => {
        // Ajax
        const request = new XMLHttpRequest()
        request.open('GET', `src/includes/edit/edit_user.php?id=${editId}`)
        const editMenu = document.querySelector(`#edit-menu`)
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                editMenu.innerHTML = request.responseText
            }
        }
        request.send()
    })
}

// If stats clicked
const statsClicked = document.querySelector(`#stats-edit`)
if (statsClicked) {
    statsClicked.addEventListener('click', () => {
        // Ajax
        const request = new XMLHttpRequest()
        request.open('GET', `src/includes/edit/edit_stats.php?id=${editId}`)
        const editMenu = document.querySelector(`#edit-menu`)
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                editMenu.innerHTML = request.responseText
            }
        }
        request.send()
    })
}

// If assets clicked
const assetsClicked = document.querySelector(`#assets-edit`)
if (assetsClicked) {
    assetsClicked.addEventListener('click', () => {
        // Ajax
        const request = new XMLHttpRequest()
        request.open('GET', `src/includes/edit/edit_assets.php?id=${editId}`)
        const editMenu = document.querySelector(`#edit-menu`)
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                editMenu.innerHTML = request.responseText
            }
        }
        request.send()
    })
}
