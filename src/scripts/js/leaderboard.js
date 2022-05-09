const recordBtn = document.querySelector('#record-btn')
if (recordBtn) {
    recordBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=1'
    })
}

const racesWonBtn = document.querySelector('#races-won-btn')
if (racesWonBtn) {
    racesWonBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=2'
    })
}

const racesRanBtn = document.querySelector('#races-ran-btn')
if (racesRanBtn) {
    racesRanBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=3'
    })
}

const timeBtn = document.querySelector('#time-btn')
if (timeBtn) {
    timeBtn.addEventListener('click', () => {
        window.location.href = 'leaderboard.php?orderedBy=4'
    })
}
