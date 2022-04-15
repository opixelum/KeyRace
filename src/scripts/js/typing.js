const quest = window.location.search.substring(1).split("=")[1]

// Used for excluding non-letter keys
const letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"

const typingDiv = document.querySelector("#typing-field")

// Text to type
const text = "curious_political_grain_grandmother_pot_nice_coordinated_rambunctious_nosy_stain_vanish_scatter_real_past_cave_teaching_island_writer_tempt_sleepy_woman_unarmed_warlike_correct_phobic"

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

// Stats elements
const timeSpan = document.querySelector("#time")
const wpmSpan = document.querySelector("#wpm")
const accuracySpan = document.querySelector("#accuracy")
const errorsSpan = document.querySelector("#errors")

let errors = 0
errorsSpan.innerText = `Errors: 0`

// Listen to player's keyboard
const keyListener = document.addEventListener("keydown", ({key}) => {
    // Start stopwatch
    if (!startTime) startTime = new Date()

    // Key check
    if (key === "Escape") {
        // If player presses escape, restart the game
        cursorCharacter.classList.remove("cursor")
        for (let character of characters) {
            character.classList.remove("correct")
            character.classList.remove("wrong")
        }
        cursorIndex = 0
        cursorCharacter = characters[cursorIndex]
        cursorCharacter.classList.add("cursor")
        startTime = new Date()
        errors = 0
        errorsSpan.innerText = `Errors: 0`

    } else if (key === cursorCharacter.innerText || key === ' ' && cursorCharacter.innerText === '_') {
        // If right key was typed
        cursorCharacter.classList.remove("cursor")
        cursorCharacter.classList.add("correct")
        cursorCharacter = characters[++cursorIndex]

    } else if (letters.includes(key) || key === ' ') {
        // If wrong key (excluding non-letter keys) was typed
        cursorCharacter.classList.add("wrong")
        errors++
        errorsSpan.innerText = `Errors: ${errors}`
    }

    // Compute all stats & check if objective is completed
    if (cursorIndex >= characters.length) {
        endTime = new Date()

        // Get elapsed time
        const delta = endTime - startTime

        // Convert time from miliseconds (default) to seconds
        const seconds = Math.round(delta / 1000 * 100) / 100

        // Get the number of word in the text
        const numberOfWords = text.split('_').length

        // Compute words per minute
        const wpm = numberOfWords / seconds * 100.0

        // Round wpm to 2 decimal places
        const roundedWpm = Math.round(wpm * 100) / 100

        // Compute accuracy
        const accuracy = 100 * text.length / (text.length + errors)

        // Round accuracy to 2 decimal places
        const roundedAccuracy = Math.round(accuracy * 100) / 100
        
        // Display stats
        const timeStat = document.querySelector("#time").innerText = `Time: ${seconds}s`
        const wpmStat = document.querySelector("#wpm").innerText = `WPM: ${roundedWpm}`
        const accuracyStat = document.querySelector("#accuracy").innerText = `Accuracy: ${roundedAccuracy}%`
        const errorsStat = document.querySelector("#errors").innerText = `Errors: ${errors}`

        // Prevent next lines to be executed when game is done
        document.removeEventListener("keydown", keyListener)

        // Check if objective is completed
        switch (quest) {
            case "1":
                // Type faster than 30 wpm
                if (wpm > 30) console.log("Objective 1 completed")
                break
            
            case "2":
                // Do less than 10 errors
                if (errors < 10) console.log("Objective 2 completed")
                break
            
            case "3":
                // Type faster than 50 wpm
                if (wpm > 50) console.log("Objective 3 completed")
                break

            case "4":
                // Be at least 80% accurate
                if (accuracy > 80) console.log("Objective 4 completed")
                break
            
            case "5":
                // Do less than 5 errors under 45 seconds
                if (errors < 5 && seconds < 45) console.log("Objective 5 completed")
                break

            case "6":
                // Type faster than 70 wpm
                if (wpm > 70) console.log("Objective 6 completed")
                break
            
            case "7":
                // Type faster than 80 wpm & be at least 95% accurate
                if (wpm > 80 && accuracy > 95) console.log("Objective 7 completed")
                break
            
            case "8":
                // Type faster than 100 wpm & be at least 95% accurate
                if (wpm > 100 && accuracy > 95) console.log("Objective 8 completed")
                break
        }

        return
    }

    // If right key was typed, move the cursor to the next character
    // Instruction outside "Key check" block in order to prevent errors when 
    // game is done.
    cursorCharacter.classList.add("cursor")
})

const backBtn = document.querySelector("#back-btn")
if (backBtn) {
    addEventListener("click", () => {
        window.location.href = "http://localhost/KeyRace/campaign.php"
    })
}