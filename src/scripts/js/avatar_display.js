const customizationMenu = document.querySelector("#customization-menu")

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
        <canvas id="avatarCanvas"></canvas>
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
                <input type="radio" name="helmet" value="src/images/avatar/helmet/default/black.png">
                <img src="src/images/avatar/helmet/default/black.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/default/white.png">
                <img src="src/images/avatar/helmet/default/white.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/default/special.png">
                <img src="src/images/avatar/helmet/default/special.png" class="w-100">
            </label>
        </div>
        <hr>
        <div id="duck-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Duck</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/black.png">
                <img src="src/images/avatar/helmet/duck/black.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/white.png">
                <img src="src/images/avatar/helmet/duck/white.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/red.png">
                <img src="src/images/avatar/helmet/duck/red.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/yellow.png">
                <img src="src/images/avatar/helmet/duck/yellow.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/special.png">
                <img src="src/images/avatar/helmet/duck/special.png" class="w-100">
            </label>
        </div>
        <hr>
        <div id="cross-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Cross</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/black.png">
                <img src="src/images/avatar/helmet/cross/black.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/blue.png">
                <img src="src/images/avatar/helmet/cross/blue.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/white.png">
                <img src="src/images/avatar/helmet/cross/white.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/orange.png">
                <img src="src/images/avatar/helmet/cross/orange.png" class="w-100">
            </label>
        </div>
        <hr>
        <div id="sport-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Sport</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/black.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/black.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/blue.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/blue.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/white.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/white.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/pink.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/pink.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/red.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/red.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/dreamtime.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/dreamtime.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/mugello.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/mugello.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/soleluna.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/soleluna.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/test.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/test.png">
            </label>
        </div>
        <hr>
        <div id="race-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Race</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/black.png">
                <img class="w-100" src="src/images/avatar/helmet/race/black.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/futuro.png">
                <img class="w-100" src="src/images/avatar/helmet/race/futuro.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/LS.png">
                <img class="w-100" src="src/images/avatar/helmet/race/LS.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/speciale.png">
                <img class="w-100" src="src/images/avatar/helmet/race/speciale.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/WC.png">
                <img class="w-100" src="src/images/avatar/helmet/race/WC.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/WT.png">
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
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/black.png">
                      <img class="w-100" src="src/images/avatar/visor/default/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/blue.png">
                      <img class="w-100" src="src/images/avatar/visor/default/blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/default/cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor value="src/images/avatar/visor/default/green.png">
                      <img class="w-100" src="src/images/avatar/visor/default/green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/orange.png">
                      <img class="w-100" src="src/images/avatar/visor/default/orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/pink.png">
                      <img class="w-100" src="src/images/avatar/visor/default/pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/purple.png">
                      <img class="w-100" src="src/images/avatar/visor/default/purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/red.png">
                      <img class="w-100" src="src/images/avatar/visor/default/red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/white.png">
                      <img class="w-100" src="src/images/avatar/visor/default/white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/default/yellow.png">
                    </label>
                </div>
                <hr>
                <div id="cross-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/black.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/blue.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/green.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/orange.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/pink.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/purple.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/red.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/white.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/yellow.png">
                    </label>
                </div>
                <hr>
                <div id="sport-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Sport</p>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/black.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/blue.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/green.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/orange.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/pink.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/purple.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/red.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/white.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/yellow.png">
                    </label>
                </div>
                <hr>
                <div id="race-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/black.png">
                      <img class="w-100" src="src/images/avatar/visor/race/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/blue.png">
                      <img class="w-100" src="src/images/avatar/visor/race/blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/race/cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/green.png">
                      <img class="w-100" src="src/images/avatar/visor/race/green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/orange.png">
                      <img class="w-100" src="src/images/avatar/visor/race/orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/pink.png">
                      <img class="w-100" src="src/images/avatar/visor/race/pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/purple.png">
                      <img class="w-100" src="src/images/avatar/visor/race/purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/red.png">
                      <img class="w-100" src="src/images/avatar/visor/race/red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/white.png">
                      <img class="w-100" src="src/images/avatar/visor/race/white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/yellow.png">
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
                      <input type="radio" name="vest" value="src/images/avatar/vest/vintage/alp/black.png">
                      <img class="w-100" src="src/images/avatar/vest/vintage/alp/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/vintage/har/grey.png">
                      <img class="w-100" src="src/images/avatar/vest/vintage/har/grey.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/vintage/ix/marron.png">
                      <img class="w-100" src="src/images/avatar/vest/vintage/ix/marron.png">
                    </label>
                </div>
                <hr>
                <div id="cross-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/cross/alp/black.png">
                      <img class="w-100" src="src/images/avatar/vest/cross/alp/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/cross/fox/black.png">
                      <img class="w-100" src="src/images/avatar/vest/cross/fox/black.png">
                    </label>
                </div>
                <hr>
                <div id="road-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Road</p>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/road/ix/black.png">
                      <img class="w-100" src="src/images/avatar/vest/road/ix/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/road/long/black.png">
                      <img class="w-100" src="src/images/avatar/vest/road/long/black.png">
                    </label>
                </div>
                <hr>
                <div id="race-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/race/dns/black.png">
                      <img class="w-100" src="src/images/avatar/vest/race/dns/black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/race/fur/black.png">
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
  buildAvatar()
}
