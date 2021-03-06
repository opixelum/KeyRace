const searchField = document.querySelector("#search-field")

// On each keystrok, search for the value of the search field
searchField.addEventListener("keyup", () => {
  // User's input
  const query = searchField.value

  // Reset results field if user clears the input
  if (query.length == 0) {
    document.querySelector("#results").innerHTML = ""
    document.querySelector("#results").classList.remove("border")
    return
  }

  const xhr = new XMLHttpRequest()
  xhr.open("GET", "src/scripts/php/search.php?q=" + query, true)
  xhr.send()
  xhr.onreadystatechange = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Display results
      if (xhr.responseText.length > 0) {
        document.querySelector("#results").innerHTML = xhr.responseText
        document.querySelector("#results").classList.add("border")
      } else
        document.querySelector("#results").innerHTML = "No results found"
    }
  }
})
