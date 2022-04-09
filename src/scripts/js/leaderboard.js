const recordBtn = document.querySelector('#record-btn')
if (recordBtn) {
    recordBtn.addEventListener('click', () => {
        const request = new XMLHttpRequest()
        request.open("POST", "leaderboard.php")
        request.onreadystatechange = function() {
        if(request.readyState === XMLHttpRequest.DONE) {
            const res = request.responseText
            const div = document.getElementById("content")
            div.innerHTML += '<h1>' + res + '</h1>'
        }
    }
    request.send()
    })
}

const averageBtn = document.querySelector('#average-btn')
if (averageBtn) {
    averageBtn.addEventListener('click', () => {
        const request = new XMLHttpRequest()
        request.open("POST", "leaderboard.php")
        request.onreadystatechange = function() {
        if(request.readyState === XMLHttpRequest.DONE) {
            const res = request.responseText
            const div = document.getElementById("content")
            div.innerHTML += '<h1>' + res + '</h1>'
        }
    }
    request.send()
    })
}

const wonBtn = document.querySelector('#won-btn')
if (wonBtn) {
    wonBtn.addEventListener('click', () => {
        const request = new XMLHttpRequest()
        request.open("POST", "leaderboard.php")
        request.onreadystatechange = function() {
        if(request.readyState === XMLHttpRequest.DONE) {
            const res = request.responseText
            const div = document.getElementById("content")
            div.innerHTML += '<h1>' + res + '</h1>'
        }
    }
    request.send()
    })
}

const gameBtn = document.querySelector('#game-btn')
if (gameBtn) {
    gameBtn.addEventListener('click', () => {
        const request = new XMLHttpRequest()
        request.open("POST", "leaderboard.php")
        request.onreadystatechange = function() {
        if(request.readyState === XMLHttpRequest.DONE) {
            const res = request.responseText
            const div = document.getElementById("content")
            div.innerHTML += '<h1>' + res + '</h1>'
        }
    }
    request.send()
    })
}

const timeBtn = document.querySelector('#time-btn')
if (timeBtn) {
    timeBtn.addEventListener('click', () => {
        const request = new XMLHttpRequest()
        request.open("POST", "leaderboard.php")
        request.onreadystatechange = function() {
        if(request.readyState === XMLHttpRequest.DONE) {
            const res = request.responseText
            const div = document.getElementById("content")
            div.innerHTML += '<h1>' + res + '</h1>'
        }
    }
    request.send()
    })
}
