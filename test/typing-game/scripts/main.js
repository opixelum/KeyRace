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

// Listen to player's keyboard
document.addEventListener("keydown", ({key}) => {
    if (key === cursorCharacter.innerText) {
        // If right key was typed
        cursorCharacter.classList.remove("cursor")
        cursorCharacter.classList.add("done")
        cursorCharacter = characters[++cursorIndex]
        cursorCharacter.classList.add("cursor")
    } else {
        // If wrong key was typed
        cursorCharacter.classList.add("wrong")
    }
})