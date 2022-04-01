// Used for excluding non-letter keys
const letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"

const typingDiv = document.querySelector("#typing-field")

// Text to type
const text = "curious political grain grandmother pot nice coordinated rambunctious nosy stain vanish scatter real past cave teaching island writer tempt sleepy woman unarmed warlike correct phobic crib fact grumpy rare snobbish"

// Split the whole text by each character
// Then create a span for each of those
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
    // Start stopwatch
    if (!startTime) {
        startTime = new Date()
    }
    
    // Key check
    if (key === cursorCharacter.innerText) {
        // If right key was typed
        cursorCharacter.classList.remove("cursor")
        cursorCharacter.classList.add("done")
        cursorCharacter = characters[++cursorIndex]
    } else if (letters.includes(key)) {
        // If wrong key (excluding non-letter keys) was typed
        cursorCharacter.classList.add("wrong")
    }

    // Compute all stats
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

        // Prevent next lines to be executed when game is done
        document.removeEventListener("keydown", keyListener)
        return
    }

    // If right key was typed, move the cursor to the next character
    // Instruction outside "Key check" block in order to prevent errors when 
    // game is done.
    cursorCharacter.classList.add("cursor")
})