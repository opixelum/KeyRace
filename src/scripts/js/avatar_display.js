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
                <input type="radio" name="helmet" value="src/images/avatar/helmet/default/helmet_default_helmet_black.png">
                <img src="src/images/avatar/helmet/default/helmet_default_helmet_black.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/default/helmet_default_helmet_white.png">
                <img src="src/images/avatar/helmet/default/helmet_default_helmet_white.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/default/helmet_default_helmet_special.png">
                <img src="src/images/avatar/helmet/default/helmet_default_helmet_special.png" class="w-100">
            </label>
        </div>
        <hr>
        <div id="duck-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Duck</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/helmet_duck_helmet_black.png">
                <img src="src/images/avatar/helmet/duck/helmet_duck_helmet_black.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/helmet_duck_helmet_white.png">
                <img src="src/images/avatar/helmet/duck/helmet_duck_helmet_white.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/helmet_duck_helmet_red.png">
                <img src="src/images/avatar/helmet/duck/helmet_duck_helmet_red.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/helmet_duck_helmet_yellow.png">
                <img src="src/images/avatar/helmet/duck/helmet_duck_helmet_yellow.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/duck/helmet_duck_helmet_special.png">
                <img src="src/images/avatar/helmet/duck/helmet_duck_helmet_special.png" class="w-100">
            </label>
        </div>
        <hr>
        <div id="cross-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Cross</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/helmet_cross_helmet_black.png">
                <img src="src/images/avatar/helmet/cross/helmet_cross_helmet_black.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/helmet_cross_helmet_blue.png">
                <img src="src/images/avatar/helmet/cross/helmet_cross_helmet_blue.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/helmet_cross_helmet_white.png">
                <img src="src/images/avatar/helmet/cross/helmet_cross_helmet_white.png" class="w-100">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/cross/helmet_cross_helmet_orange.png">
                <img src="src/images/avatar/helmet/cross/helmet_cross_helmet_orange.png" class="w-100">
            </label>
        </div>
        <hr>
        <div id="sport-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Sport</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_black.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_black.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_blue.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_blue.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_white.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_white.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_pink.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_pink.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_red.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_red.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_dreamtime.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_dreamtime.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_mugello.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_mugello.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_soleluna.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_soleluna.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/sport/helmet_sport_helmet_test.png">
                <img class="w-100" src="src/images/avatar/helmet/sport/helmet_sport_helmet_test.png">
            </label>
        </div>
        <hr>
        <div id="race-helmet" class="row">
            <p class="w-100 m-0 bg-dark">Race</p>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/helmet_race_helmet_black.png">
                <img class="w-100" src="src/images/avatar/helmet/race/helmet_race_helmet_black.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/helmet_race_helmet_futuro.png">
                <img class="w-100" src="src/images/avatar/helmet/race/helmet_race_helmet_futuro.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/helmet_race_helmet_LS.png">
                <img class="w-100" src="src/images/avatar/helmet/race/helmet_race_helmet_LS.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/helmet_race_helmet_speciale.png">
                <img class="w-100" src="src/images/avatar/helmet/race/helmet_race_helmet_speciale.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/helmet_race_helmet_WC.png">
                <img class="w-100" src="src/images/avatar/helmet/race/helmet_race_helmet_WC.png">
            </label>
            <label class="w-25">
                <input type="radio" name="helmet" value="src/images/avatar/helmet/race/helmet_race_helmet_WT.png">
                <img class="w-100" src="src/images/avatar/helmet/race/helmet_race_helmet_WT.png">
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
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_black.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_blue.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor value="src/images/avatar/visor/default/helmet_default_visor_green.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_orange.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_pink.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_purple.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_red.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_white.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/default/helmet_default_visor_yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/default/helmet_default_visor_yellow.png">
                    </label>
                </div>
                <hr>
                <div id="cross-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_black.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_blue.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_green.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_orange.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_pink.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_purple.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_red.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_white.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/cross/helmet_cross_visor_yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/cross/helmet_cross_visor_yellow.png">
                    </label>
                </div>
                <hr>
                <div id="sport-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Sport</p>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_black.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_blue.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_green.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_orange.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_pink.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_purple.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_red.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_white.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/sport/helmet_sport_visor_yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/sport/helmet_sport_visor_yellow.png">
                    </label>
                </div>
                <hr>
                <div id="race-visor" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_black.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_blue.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_blue.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_cyan.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_cyan.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_green.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_green.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_orange.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_orange.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_pink.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_pink.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_purple.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_purple.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_red.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_red.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_white.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_white.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="visor" value="src/images/avatar/visor/race/helmet_race_visor_yellow.png">
                      <img class="w-100" src="src/images/avatar/visor/race/helmet_race_visor_yellow.png">
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
                      <input type="radio" name="vest" value="src/images/avatar/vest/vintage/alp/body_vintage_alp_black.png">
                      <img class="w-100" src="src/images/avatar/vest/vintage/alp/body_vintage_alp_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/vintage/har/body_vintage_har_grey.png">
                      <img class="w-100" src="src/images/avatar/vest/vintage/har/body_vintage_har_grey.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/vintage/ix/body_vintage_ix_marron.png">
                      <img class="w-100" src="src/images/avatar/vest/vintage/ix/body_vintage_ix_marron.png">
                    </label>
                </div>
                <hr>
                <div id="cross-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Cross</p>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/cross/alp/body_cross_alp_black.png">
                      <img class="w-100" src="src/images/avatar/vest/cross/alp/body_cross_alp_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/cross/fox/body_cross_fox_black.png">
                      <img class="w-100" src="src/images/avatar/vest/cross/fox/body_cross_fox_black.png">
                    </label>
                </div>
                <hr>
                <div id="road-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Road</p>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/road/ix/body_road_ix_black.png">
                      <img class="w-100" src="src/images/avatar/vest/road/ix/body_road_ix_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/road/long/body_road_long_black.png">
                      <img class="w-100" src="src/images/avatar/vest/road/long/body_road_long_black.png">
                    </label>
                </div>
                <hr>
                <div id="race-vest" class="row">
                    <p class="w-100 m-0 bg-dark">Race</p>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/race/dns/body_race_dns_black.png">
                      <img class="w-100" src="src/images/avatar/vest/race/dns/body_race_dns_black.png">
                    </label>
                    <label class="w-25">
                      <input type="radio" name="vest" value="src/images/avatar/vest/race/fur/body_race_fur_black.png">
                      <img class="w-100" src="src/images/avatar/vest/race/fur/body_race_fur_black.png">
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
