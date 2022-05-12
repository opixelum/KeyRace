/**
 * Get all the radio buttons in the customization menu.
 * Then add an event listener to each radio button.
 *
 * @param {string} asset The type of asset that the user is selecting
 */
const getAllRadioInputs = (asset) => {
  // Get all the radio buttons
  const allRadioInputs = document.querySelectorAll('input[type="radio"]')

  // If radio buttons are found
  if (allRadioInputs) {
    // For each radio button, add an event listener
    for (const radioInput of allRadioInputs)
      switch (asset) {
        case "helmet":
          radioInput.addEventListener("click", () => setHelmet())
          break

        case "visor":
          radioInput.addEventListener("click", () => setVisor())
          break

        case "vest":
          radioInput.addEventListener("click", () => setVest())
          break

        case "background":
          radioInput.addEventListener("click", () => setBackground())
          break
    }
  }
}

function displayAvatarMaker() {
  const container = document.querySelector("main .container")
  container.innerHTML = `
    <div class="row align-items-center h-100">
      <div class="col-6 d-flex flex-wrap align-items-start h-100 ps-5">
        <button id="helmet-btn" class="btn col-3">Helmet</button>
        <button id="visor-btn" class="btn col-3">Visor</button>
        <button id="vest-btn" class="btn col-3">Vest</button>
        <button id="background-btn" class="btn col-3">Background</button>
        <div id="assets-selection" class="d-flex flex-wrap border rounded-3 align-items-start h-75"></div>
      </div>
      <div class="col-6 d-flex flex-wrap justify-content-center align-items-center h-100">
        <canvas 
          class="rounded-circle"
          id="avatar-canvas"
          width="500"
          height="500">
        </canvas>
        <button class="btn w-25 bg-danger mx-2" id="cancel-btn">Cancel</button>
        <button class="btn w-25 bg-success mx-2" id="save-btn">Save</button>
      </div>
    </div>
  `

  const assetsSelection = document.querySelector("#assets-selection")

  const helmetBtn = document.querySelector("#helmet-btn")
  if (helmetBtn) {
    helmetBtn.addEventListener("click", () => {
      assetsSelection.innerHTML = `
        <div id="default-helmet" class="row">
          <p class="w-100 m-0 bg-dark">Default</p>
          <label class="w-25">
            <input type="radio" name="helmet" value="default/black">
            <img src="src/images/avatar/helmet/default/black.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="default/white">
            <img src="src/images/avatar/helmet/default/white.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="default/special">
            <img src="src/images/avatar/helmet/default/special.png" class="w-100">
          </label>
        </div>
        <hr>
        <div id="duck-helmet" class="row">
          <p class="w-100 m-0 bg-dark">Duck</p>
          <label class="w-25">
            <input type="radio" name="helmet" value="duck/black">
            <img src="src/images/avatar/helmet/duck/black.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="duck/white">
            <img src="src/images/avatar/helmet/duck/white.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="duck/red">
            <img src="src/images/avatar/helmet/duck/red.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="duck/yellow">
            <img src="src/images/avatar/helmet/duck/yellow.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="duck/special">
            <img src="src/images/avatar/helmet/duck/special.png" class="w-100">
          </label>
        </div>
        <hr>
        <div id="cross-helmet" class="row">
          <p class="w-100 m-0 bg-dark">Cross</p>
          <label class="w-25">
            <input type="radio" name="helmet" value="cross/black">
            <img src="src/images/avatar/helmet/cross/black.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="cross/blue">
            <img src="src/images/avatar/helmet/cross/blue.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="cross/white">
            <img src="src/images/avatar/helmet/cross/white.png" class="w-100">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="cross/orange">
            <img src="src/images/avatar/helmet/cross/orange.png" class="w-100">
          </label>
        </div>
        <hr>
        <div id="sport-helmet" class="row">
          <p class="w-100 m-0 bg-dark">Sport</p>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/black">
            <img class="w-100" src="src/images/avatar/helmet/sport/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/blue">
            <img class="w-100" src="src/images/avatar/helmet/sport/blue.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/white">
            <img class="w-100" src="src/images/avatar/helmet/sport/white.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/pink">
            <img class="w-100" src="src/images/avatar/helmet/sport/pink.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/red">
            <img class="w-100" src="src/images/avatar/helmet/sport/red.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/dreamtime">
            <img class="w-100" src="src/images/avatar/helmet/sport/dreamtime.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/mugello">
            <img class="w-100" src="src/images/avatar/helmet/sport/mugello.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/soleluna">
            <img class="w-100" src="src/images/avatar/helmet/sport/soleluna.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="sport/test">
            <img class="w-100" src="src/images/avatar/helmet/sport/test.png">
          </label>
        </div>
        <hr>
        <div id="race-helmet" class="row">
          <p class="w-100 m-0 bg-dark">Race</p>
          <label class="w-25">
            <input type="radio" name="helmet" value="race/black">
            <img class="w-100" src="src/images/avatar/helmet/race/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="race/futuro">
            <img class="w-100" src="src/images/avatar/helmet/race/futuro.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="race/LS">
            <img class="w-100" src="src/images/avatar/helmet/race/LS.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="race/speciale">
            <img class="w-100" src="src/images/avatar/helmet/race/speciale.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="race/WC">
            <img class="w-100" src="src/images/avatar/helmet/race/WC.png">
          </label>
          <label class="w-25">
            <input type="radio" name="helmet" value="race/WT">
            <img class="w-100" src="src/images/avatar/helmet/race/WT.png">
          </label>
        </div>
    `
      getAllRadioInputs("helmet")
    })
  }

  const visorBtn = document.querySelector("#visor-btn")
  if (visorBtn) {
    visorBtn.addEventListener("click", () => {
      assetsSelection.innerHTML = `
        <div id="default-visor" class="row">
          <p class="w-100 m-0 bg-dark">Default</p>
          <label class="w-25">
            <input type="radio" name="visor" value="default/black">
            <img class="w-100" src="src/images/avatar/visor/default/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/blue">
            <img class="w-100" src="src/images/avatar/visor/default/blue.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/cyan">
            <img class="w-100" src="src/images/avatar/visor/default/cyan.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor value="default/green">
            <img class="w-100" src="src/images/avatar/visor/default/green.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/orange">
            <img class="w-100" src="src/images/avatar/visor/default/orange.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/pink">
            <img class="w-100" src="src/images/avatar/visor/default/pink.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/purple">
            <img class="w-100" src="src/images/avatar/visor/default/purple.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/red">
            <img class="w-100" src="src/images/avatar/visor/default/red.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/white">
            <img class="w-100" src="src/images/avatar/visor/default/white.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="default/yellow">
            <img class="w-100" src="src/images/avatar/visor/default/yellow.png">
          </label>
        </div>
        <hr>
        <div id="cross-visor" class="row">
          <p class="w-100 m-0 bg-dark">Cross</p>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/black">
            <img class="w-100" src="src/images/avatar/visor/cross/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/blue">
            <img class="w-100" src="src/images/avatar/visor/cross/blue.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/cyan">
            <img class="w-100" src="src/images/avatar/visor/cross/cyan.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/green">
            <img class="w-100" src="src/images/avatar/visor/cross/green.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/orange">
            <img class="w-100" src="src/images/avatar/visor/cross/orange.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/pink">
            <img class="w-100" src="src/images/avatar/visor/cross/pink.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/purple">
            <img class="w-100" src="src/images/avatar/visor/cross/purple.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/red">
            <img class="w-100" src="src/images/avatar/visor/cross/red.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/white">
            <img class="w-100" src="src/images/avatar/visor/cross/white.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="cross/yellow">
            <img class="w-100" src="src/images/avatar/visor/cross/yellow.png">
          </label>
        </div>
        <hr>
        <div id="sport-visor" class="row">
          <p class="w-100 m-0 bg-dark">Sport</p>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/black">
            <img class="w-100" src="src/images/avatar/visor/sport/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/blue">
            <img class="w-100" src="src/images/avatar/visor/sport/blue.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/cyan">
            <img class="w-100" src="src/images/avatar/visor/sport/cyan.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/green">
            <img class="w-100" src="src/images/avatar/visor/sport/green.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/orange">
            <img class="w-100" src="src/images/avatar/visor/sport/orange.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/pink">
            <img class="w-100" src="src/images/avatar/visor/sport/pink.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/purple">
            <img class="w-100" src="src/images/avatar/visor/sport/purple.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/red">
            <img class="w-100" src="src/images/avatar/visor/sport/red.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/white">
            <img class="w-100" src="src/images/avatar/visor/sport/white.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="sport/yellow">
            <img class="w-100" src="src/images/avatar/visor/sport/yellow.png">
          </label>
        </div>
        <hr>
        <div id="race-visor" class="row">
          <p class="w-100 m-0 bg-dark">Race</p>
          <label class="w-25">
            <input type="radio" name="visor" value="race/black">
            <img class="w-100" src="src/images/avatar/visor/race/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/blue">
            <img class="w-100" src="src/images/avatar/visor/race/blue.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/cyan">
            <img class="w-100" src="src/images/avatar/visor/race/cyan.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/green">
            <img class="w-100" src="src/images/avatar/visor/race/green.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/orange">
            <img class="w-100" src="src/images/avatar/visor/race/orange.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/pink">
            <img class="w-100" src="src/images/avatar/visor/race/pink.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/purple">
            <img class="w-100" src="src/images/avatar/visor/race/purple.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/red">
            <img class="w-100" src="src/images/avatar/visor/race/red.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/white">
            <img class="w-100" src="src/images/avatar/visor/race/white.png">
          </label>
          <label class="w-25">
            <input type="radio" name="visor" value="race/yellow">
            <img class="w-100" src="src/images/avatar/visor/race/yellow.png">
          </label>
        </div>
      `
      getAllRadioInputs("visor")
    })
  }

  const vestBtn = document.querySelector("#vest-btn")
  if (vestBtn) {
    vestBtn.addEventListener("click", () => {
      assetsSelection.innerHTML = `
        <div id="vintage-vest" class="row">
          <p class="w-100 m-0 bg-dark">Vintage</p>
          <label class="w-25">
            <input type="radio" name="vest" value="vintage/alp/black">
            <img class="w-100" src="src/images/avatar/vest/vintage/alp/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="vest" value="vintage/har/grey">
            <img class="w-100" src="src/images/avatar/vest/vintage/har/grey.png">
          </label>
          <label class="w-25">
            <input type="radio" name="vest" value="vintage/ix/brown">
            <img class="w-100" src="src/images/avatar/vest/vintage/ix/brown.png">
          </label>
        </div>
        <hr>
        <div id="cross-vest" class="row">
          <p class="w-100 m-0 bg-dark">Cross</p>
          <label class="w-25">
            <input type="radio" name="vest" value="cross/alp/black">
            <img class="w-100" src="src/images/avatar/vest/cross/alp/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="vest" value="cross/fox/black">
            <img class="w-100" src="src/images/avatar/vest/cross/fox/black.png">
          </label>
        </div>
        <hr>
        <div id="road-vest" class="row">
          <p class="w-100 m-0 bg-dark">Road</p>
          <label class="w-25">
            <input type="radio" name="vest" value="road/ix/black">
            <img class="w-100" src="src/images/avatar/vest/road/ix/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="vest" value="road/long/black">
            <img class="w-100" src="src/images/avatar/vest/road/long/black.png">
          </label>
        </div>
        <hr>
        <div id="race-vest" class="row">
          <p class="w-100 m-0 bg-dark">Race</p>
          <label class="w-25">
            <input type="radio" name="vest" value="race/dns/black">
            <img class="w-100" src="src/images/avatar/vest/race/dns/black.png">
          </label>
          <label class="w-25">
            <input type="radio" name="vest" value="race/fur/black">
            <img class="w-100" src="src/images/avatar/vest/race/fur/black.png">
          </label>
        </div>
      `
      getAllRadioInputs("vest")
    })
  }

  const backgroundBtn = document.querySelector("#background-btn")
  if (backgroundBtn) {
    backgroundBtn.addEventListener("click", () => {
      assetsSelection.innerHTML = `
        <label class="w-25">
          <input type="radio" name="background" value="black">
          <div id="black-div"></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="white">
          <div id="white-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#c00">
          <div id="red-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#0c0">
          <div id="green-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#00c">
          <div id="blue-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#0cc">
          <div id="cyan-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#ff6400">
          <div id="orange-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#ff00ff">
          <div id="pink-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="#6400ff">
          <div id="purple-div"><p></p></div>
        </label>
        <label class="w-25">
          <input type="radio" name="background" value="yellow">
          <div id="yellow-div"><p></p></div>                 
        </label>
      `
      getAllRadioInputs("background")
    })
  }

  const saveBtn = document.querySelector("#save-btn")
  if (saveBtn) saveBtn.addEventListener("click", () => saveAvatar())

  buildAvatar()
}
