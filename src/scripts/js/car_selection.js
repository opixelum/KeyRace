const carRoot = "src/images/cars/"

// Used when user cancel car selection
let savedCar

// Used when user chooses a car
let newCar

const selectedCar = document.querySelector("#selected-car")

// Get car from database with AJAX
const loadCar = () => {
    const carResponse = new Promise(resolve => {
        const xhr = new XMLHttpRequest()
        xhr.open("GET", "src/scripts/php/get_car.php")
        xhr.send()
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200)
                resolve(xhr.responseText)
        }
    }).then(car => {
        const selectedCar = document.querySelector("#selected-car")
        if (selectedCar)
            selectedCar.src = carRoot + car + `.png`
    })
}

const showCar = () => {
    newCar = document.querySelector("input[name='car']:checked").value
    const selectedCar = document.querySelector("#selected-car")
    if (selectedCar)
        selectedCar.src = carRoot + newCar + `.png`
}

/**
 * Cancel car selection. Reset to saved car 
 */
const cancelCarSelection = () => {
    const selectedCar = document.querySelector("#selected-car")
    if (selectedCar)
        selectedCar.src = carRoot + savedCar + `.png`
}

/**
 * Save car in database with AJAX
 */
const saveCar = () => {
    const saveCar = new XMLHttpRequest()
    saveCar.open("POST", "src/scripts/php/save_car.php")
    saveCar.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    saveCar.send(`car=${newCar}`)
    saveCar.onreadystatechange = () => {
        if (saveCar.readyState === 4 && saveCar.status === 200) {
            const response = saveCar.responseText
            if (response != 1) alert("An error occured while saving your avatar. Please try again later.")
            else window.location.href = `profile.php?id=${id}`
        }
    }
}