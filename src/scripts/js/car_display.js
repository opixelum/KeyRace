/**
 * Get all the radio buttons in the customization menu.
 * Then add an event listener to each radio button.
 *
 * @param {string} asset The type of asset that the user is selecting
 */
const getAllRadioInputslkjsdf = asset => {
  // Get all the radio buttons

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

const displayCarSelection = () => {
  const container = document.querySelector("main .container")
  if (container) {
    container.innerHTML = `
      <div class="row align-items-center h-100">
        <div class="col-6 d-flex flex-wrap align-items-start h-100 ps-5">
          <div id="car-selection" class="d-flex flex-wrap border rounded-3 align-items-start h-75"></div>
        </div>
        <div class="col-6 d-flex flex-wrap justify-content-center align-items-center h-100">
          <img id="selected-car" alt="Selected car">
          <button class="btn w-25 bg-danger mx-2" id="cancel-btn">Cancel</button>
          <button class="btn w-25 bg-success mx-2" id="save-btn">Save</button>
        </div>
      </div>
    `
  }

  const carSelection = document.querySelector("#car-selection")
  if (carSelection) {
    carSelection.innerHTML = `
      <label class="w-25 p-2">
        <input type="radio" name="car" value="benz">
        <img src="src/images/cars/benz.png" class="w-100">
      </label>
      <label class="w-25 p-2">
        <input type="radio" name="car" value="f1">
        <img src="src/images/cars/f1.png" class="w-100">
      </label>
      <label class="w-25 p-2">
        <input type="radio" name="car" value="lambo">
        <img src="src/images/cars/lambo.png" class="w-100">
      </label>
      <label class="w-25 p-2">
        <input type="radio" name="car" value="monospace">
        <img src="src/images/cars/monospace.png" class="w-100">
      </label>
      <label class="w-25 p-2">
        <input type="radio" name="car" value="tank">
        <img src="src/images/cars/tank.png" class="w-100">
      </label>
    `
  }

  const allRadioInputs = document.querySelectorAll('input[type="radio"]')
  if (allRadioInputs) {
    for (const radioInput of allRadioInputs)
      radioInput.addEventListener("click", () => showCar())
  }

  const cancelBtn = document.querySelector("#cancel-btn")
  if (cancelBtn) cancelBtn.addEventListener("click", () => {
    cancelCarSelection()
  })

  const saveBtn = document.querySelector("#save-btn")
  if (saveBtn) saveBtn.addEventListener("click", () => saveCar())

  loadCar()
}
