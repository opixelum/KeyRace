// Text to type
const text =
  "curious_political_grain_grandmother_pot_nice_coordinated_rambunctious_nosy_stain_vanish_scatter_real_past_cave_teaching_island_writer_tempt_sleepy_woman_unarmed_warlike_correct_phobic"

// Cars
const userCar = document.querySelector("#user-car")
let userCarDistance = 0
let moving

// Used for excluding non-letter keys
const letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"

const typingDiv = document.querySelector("#typing-field")

// Split the whole text by each character
// Then create a span for each of those
const characters = text.split("").map((char) => {
  const span = document.createElement("span")
  span.innerText = char
  typingDiv.appendChild(span)
  return span
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
const keyListener = document.addEventListener("keydown", ({ key }) => {
  // Key check
  if (
    document.activeElement.tagName !== "INPUT" &&
    (key === cursorCharacter.innerText ||
    (key === " " && cursorCharacter.innerText === "_"))
  ) {
    // If right key was typed
    cursorCharacter.classList.remove("cursor")
    cursorCharacter.classList.add("correct")
    cursorCharacter = characters[++cursorIndex]

    // Start stopwatch
    if (!startTime) {
      startTime = new Date()
    }

    // Send new car position to server
    send("car", `${(userCarDistance += 100 / text.length)}%`)

  } else if (
    document.activeElement.tagName !== "INPUT" &&
    (letters.includes(key) || key === " ")
  ) {
    // If wrong key (excluding non-letter keys) was typed
    cursorCharacter.classList.add("wrong")
    errors++
    errorsSpan.innerText = `Errors: ${errors}`

    // Start stopwatch
    if (!startTime) {
      startTime = new Date()
    }
  }

  // Compute all stats & check if objective is completed
  if (cursorIndex >= characters.length) {
    send("car", `${(userCarDistance += 100 / text.length)}%`)

    endTime = new Date()

    // Stop car
    clearInterval(moving)

    // Get elapsed time
    const delta = endTime - startTime

    // Convert time from miliseconds (default) to seconds
    const seconds = Math.round((delta / 1000) * 100) / 100

    // Get the number of word in the text
    const numberOfWords = text.split("_").length

    // Compute words per minute
    const wpm = (numberOfWords / seconds) * 100.0

    // Round wpm to 2 decimal places
    const roundedWpm = Math.round(wpm * 100) / 100

    // Compute accuracy
    const accuracy = (100 * text.length) / (text.length + errors)

    // Round accuracy to 2 decimal places
    const roundedAccuracy = Math.round(accuracy * 100) / 100

    // Display stats
    const timeStat = (document.querySelector(
      "#time"
    ).innerText = `Time: ${seconds}s`)
    const wpmStat = (document.querySelector(
      "#wpm"
    ).innerText = `WPM: ${roundedWpm}`)
    const accuracyStat = (document.querySelector(
      "#accuracy"
    ).innerText = `Accuracy: ${roundedAccuracy}%`)
    const errorsStat = (document.querySelector(
      "#errors"
    ).innerText = `Errors: ${errors}`)

    // Restart game
    for (let character of characters) {
      character.classList.remove("correct")
      character.classList.remove("wrong")
    }

    cursorIndex = 0
    cursorCharacter = characters[cursorIndex]
    cursorCharacter.classList.add("cursor")

    startTime = null

    errors = 0
    errorsSpan.innerText = `Errors: 0`

    userCarDistance = 0
    userCar.style.marginLeft = userCarDistance

    clearInterval(moving)

    // Prevent next lines to be executed when game is done
    document.removeEventListener("keydown", keyListener)

    // Save stats to database
    function saveStats() {
      const statRequest = new XMLHttpRequest()
      statRequest.open("POST", "src/scripts/php/save_stats.php")
      statRequest.onreadystatechange = () => {
        if (statRequest.readyState === 4 && statRequest.status === 200) {
          const response = statRequest.responseText
          if (response != 1) alert("error")
        }
      }
      statRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
      statRequest.send(`wpm=${roundedWpm}&accuracy=${accuracy}&time=${seconds}`)
    }

    saveStats()
  }

  // If right key was typed, move the cursor to the next character
  // Instruction outside "Key check" block in order to prevent errors when
  // game is done.
  cursorCharacter.classList.add("cursor")
})
