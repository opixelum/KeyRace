const recordBtn = document.querySelector('#record-btn')
if (recordBtn) {
    recordBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=1'
    })
}

const averageBtn = document.querySelector('#average-btn')
if (averageBtn) {
    averageBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=2'
    })
}

const wonBtn = document.querySelector('#won-btn')
if (wonBtn) {
    wonBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=3'
    })
}

const gameBtn = document.querySelector('#game-btn')
if (gameBtn) {
    gameBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=4'
    })
}

const timeBtn = document.querySelector('#time-btn')
if (timeBtn) {
    timeBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=5'
    })
}
