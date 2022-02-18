const typingDiv = document.querySelector("#typing")

// Text to type
const text = "This is a test. Try to type as fast as possible."

// Split the whole text by each character
// Then creat a span for each of those
const characters = text.split('').map((char) => {
    const span = document.createElement("span")
    span.innerText = char
    typingDiv.appendChild(span)
    return span;
})

// Keep track of character to type
let cursorIndex = 0

// Highlight first characters
let cursorCharacter = characters[cursorIndex]
cursorCharacter.classList.add("cursor")

// Stopwatch
let startTime = null
let endTime = null

// Listen to player's keyboard
const keyListener = document.addEventListener("keydown", ({key}) => {
    if (!startTime) {
        startTime = new Date()
    }
    
    if (key === cursorCharacter.innerText) {
        // If right key was typed
        cursorCharacter.classList.remove("cursor")
        cursorCharacter.classList.add("done")
        cursorCharacter = characters[++cursorIndex]
    } else {
        // If wrong key was typed
        cursorCharacter.classList.add("wrong")
    }

    if (cursorIndex >= characters.length) {
        endTime = new Date()

        // Get elapsed time
        const delta = endTime - startTime

        // Convert time from miliseconds (default) to seconds
        const seconds = delta / 1000

        // Get the number of word in the text
        const numberOfWords = text.split(' ').length

        // Compute words Per Seconds
        const wps = numberOfWords / seconds

        // Compute Words Per Minute
        const wpm = wps * 60.0

        // Display stats
        document.querySelector("#stats").innerText = `WPM: ${wpm}`

        // Prevent next lines to be executed after game done
        document.removeEventListener("keydown", keyListener)
        return
    }

    cursorCharacter.classList.add("cursor")
})