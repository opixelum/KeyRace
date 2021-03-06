// Text to type
const text =
  "curious_political_grain_grandmother_pot_nice_coordinated_rambunctious_nosy_stain_vanish_scatter_real_past_cave_teaching_island_writer_tempt_sleepy_woman_unarmed_warlike_correct_phobic"

// Get quest number from url
const quest = window.location.search.substring(1).split("=")[1]

// Set bot speed depending on quest number
let botInterval
switch (quest) {
  case "1":
    // 30 wpm or 80 seconds
    botInterval = 80 / text.length * 1000
    break

  case "2":
    // 40 wpm or 60 seconds
    botInterval = 60 / text.length * 1000
    break

  case "3":
    // 50 wpm or 50 seconds
    botInterval = 50 / text.length * 1000
    break

  case "4":
    // 55 wpm or 45 seconds
    botInterval = 45 / text.length * 1000
    break

  case "5":
    // 60 wpm or 40 seconds
    botInterval = 40 / text.length * 1000
    break

  case "6":
    // 70 wpm or 35 seconds
    botInterval = 35 / text.length * 1000
    break

  case "7":
    // 80 wpm or 30 seconds
    botInterval = 30 / text.length * 1000
    break

  case "8":
    // 100 wpm or 25 seconds
    botInterval = 25 / text.length * 1000
    break
}

// Cars
const userCar = document.querySelector("#user-car")
let userCarDistance = 0

const botCar = document.querySelector("#bot-car")
let botCarDistance = 0

// Footer buttons
const questFooterButtons = document.querySelector("#quest-footer-btns")
const nextBtn = document.querySelector("#next-btn")

const displayRestartBtn = () => {
  const restartBtn = document.createElement("button")
  restartBtn.classList.add("btn")
  restartBtn.addEventListener("click", () => {
    window.location.href = `./campaign.php?quest=${quest}`
  })
  const restartBtnText = document.createTextNode("Restart")
  restartBtn.appendChild(restartBtnText)
  questFooterButtons.insertBefore(restartBtn, nextBtn)
}

const setQuestStatus = (status) => {
  const questStatus = document.querySelector("#quest-status")
  questStatus.innerText = status
  questStatus.classList.remove("opacity-0")
  displayRestartBtn()
}

const questSuccess = () => {
  // Edit quest value in database
  const xhr = new XMLHttpRequest()
  xhr.open("POST", "src/scripts/php/update_quest.php", true)

  // Call on request state change
  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = xhr.responseText
      if (response != 1) alert("Error")
    }
  }
  // Content type
  xhr.setRequestHeader("Content-type", "application/json")

  // Send request
  xhr.send(JSON.stringify({ quest: quest }))

  // Display message
  setQuestStatus("???? Quest completed! ????")

  nextBtn.classList.remove("disabled")
}

const questFailed = () => setQuestStatus("??? Quest failed... ???")

let moving // Interval for bot car
const moveBotCar = () => {
  // Make bot car move
  moving = setInterval(() => {
    if (botCarDistance < 100)
      botCar.style.marginLeft = `${(botCarDistance += 100 / text.length)}%`
    else clearInterval(moving)
  }, botInterval) // 0.245 seconds per character, or 45 seconds for the whole text
}

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

    startTime = null

    errors = 0
    errorsSpan.innerText = `Errors: 0`

    userCarDistance = 0
    userCar.style.marginLeft = userCarDistance

    botCarDistance = 0
    botCar.style.marginLeft = botCarDistance
    clearInterval(moving)
  } else if (
    key === cursorCharacter.innerText ||
    (key === " " && cursorCharacter.innerText === "_")
  ) {
    // If right key was typed
    cursorCharacter.classList.remove("cursor")
    cursorCharacter.classList.add("correct")
    cursorCharacter = characters[++cursorIndex]

    // Make the car moving
    userCar.style.marginLeft = `${(userCarDistance += 100 / text.length)}%`

    // Start stopwatch
    if (!startTime) {
      startTime = new Date()
      moveBotCar()
    }
  } else if (letters.includes(key) || key === " ") {
    // If wrong key (excluding non-letter keys) was typed
    cursorCharacter.classList.add("wrong")
    errors++
    errorsSpan.innerText = `Errors: ${errors}`

    // Start stopwatch
    if (!startTime) {
      startTime = new Date()
      moveBotCar()
    }
  }

  // Compute all stats & check if objective is completed
  if (cursorIndex >= characters.length) {
    endTime = new Date()

    // Stop bot car
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

    // Prevent next lines to be executed when game is done
    document.removeEventListener("keydown", keyListener)

    // Save stats to database
    function saveStats() {
      const statRequest = new XMLHttpRequest()
      statRequest.open("POST", "src/scripts/php/save_stats.php")
      statRequest.onreadystatechange = () => {
        if (statRequest.readyState === 4 && statRequest.status === 200) {
          const response = statRequest.responseText
          if (response != 1) alert("Unfortunately, an error occured when saving stats.")
        }
      }
      statRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
      statRequest.send(`wpm=${roundedWpm}&accuracy=${accuracy}&time=${seconds}`)
    }

    // Check if objective is completed
    switch (quest) {
      case "1":
        // 30 wpm or 80 seconds
        saveStats()
        if (seconds < 80) questSuccess()
        else questFailed()
        break

      case "2":
        // 40 wpm or 60 seconds
        saveStats()
        if (wpm > 40) questSuccess()
        else questFailed()
        break

      case "3":
        // 50 wpm or 50 seconds
        saveStats()
        if (seconds < 50) questSuccess()
        else questFailed()
        break

      case "4":
        // 55 wpm or 45 seconds
        saveStats()
        if (wpm > 55) questSuccess()
        else questFailed()
        break

      case "5":
        // 60 wpm or 40 seconds
        saveStats()
        if (seconds < 40) questSuccess()
        else questFailed()
        break

      case "6":
        // 70 wpm or 35 seconds
        saveStats()
        if (wpm > 70) questSuccess()
        else questFailed()
        break

      case "7":
        // 80 wpm or 30 seconds
        saveStats()
        if (seconds < 30) questSuccess()
        else questFailed()
        break

      case "8":
        // 100 wpm or 25 seconds
        saveStats()
        if (wpm > 100) questSuccess()
        else questFailed()
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
  backBtn.addEventListener("click", () => {
    window.location.href = "campaign.php"
  })
}

if (quest !== "8") {
  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      window.location.href = `campaign.php?quest=${
        parseInt(quest) + 1
      }`
    })
  }
}
else if (quest === 8) {
  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      window.location.href = "campaign.php"
    })
  }
}
