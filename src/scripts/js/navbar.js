const searchField = document.querySelector("#search-field")

// On each keystrok, search for the value of the search field
searchField.addEventListener("keydown", () => {
  // User's input
  const query = searchField.value

  // Reset results field if user clears the input
  if (query.length == 0) {
    document.querySelector("#results").innerHTML = ""
    document.querySelector("#results").style.border = "0px"
    return
  }

  // AJAX request
  const xhr = new XMLHttpRequest()
  xhr.open("GET", "src/scripts/php/search/search.php?q=" + query, true)
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      document.querySelector("#results").innerHTML = xhr.responseText
      document.querySelector("#results").style.border = "1px solid white"
    }
  }
  xhr.send()
})
