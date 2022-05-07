let username // Current user's name
let track // Current user's car track

// Get all div for username display
const usernameDivs = document.querySelectorAll(`#username`)

// Create a new WebSocket object
const msgBox = document.querySelector('#message-box')
const wsUri = "ws://localhost:3307/src/script/php/websocket.php"
websocket = new WebSocket(wsUri)

// Connection is open
websocket.onopen = () => {
    // Notify user
    msgBox.innerHTML += `<div class="system_msg text-white-50">Chat open</div>`

    // Await getUsername() promise to get username
    getUsername().then(res => {
        username = res

        // Diplay username on corresponding track
        for (let div of usernameDivs) {
            if (div.innerText === "No player") {
                div.innerText = username

                // Track is the index of the current div in the usernameDivs node list
                track = Array.prototype.indexOf.call(usernameDivs, div)

                // Send current user's name & track number
                // to all players through websocket
                send("joined")
                return
            }
        }
    })
}

// Message received from server
websocket.onmessage = ev => {
    // PHP sends Json data
    const response = JSON.parse(ev.data)
    // Message type
    const type = response.type
    // Message text
    const chatMessage = response.message
    // User name
    const chatUsername = response.username

    switch (type) {
        // When someone sends a message in the chat
        case 'chat':
            msgBox.innerHTML += `<div><ins>${chatUsername}:</ins> <span class="chatMessage text-break">${chatMessage}</span></div>`
            break;

        // If a user has joined the game
        case 'joined':
            msgBox.innerHTML += `<div class="text-white-50">${chatMessage}</div>`
            break;

        // If a user has left the game
        case 'left':
            msgBox.innerHTML += `<div class="text-white-50">${chatMessage}</div>`
            break;
    }
    // Scroll message
    if (msgBox[0]) msgBox[0].scrollTop = msgBox[0].scrollHeight
}

websocket.onerror = ev => { msgBox.innerHTML += `<div class="system_error text-white-50">Error Occurred - ${ev.data}</div>` }
websocket.onclose = () => { msgBox.innerHTML += `<div class="system_msg text-white-50">Connection Closed</div>` }

// Message send button
document.querySelector('#send-message').addEventListener("click", () => send("chat"))

// User hits enter key 
document.querySelector("#message").addEventListener("keydown", event => {
    if (event.which == 13) send("chat")
})

/**
 *  Send message to server 
 * 
 * @param {string} type Type of message
 */
const send = type => {
    let data // Data to send

    switch (type) {
        // Send current user's name & track number
        // to all players through websocket
        case "joined":
            data = {
                type: "joined",
                username: username,
                track: track
            }
            break

        // When current user send a message in the chat
        case "chat":
            // User message text        
            const message_input = document.querySelector(`#message`)
            
            // If no message provided, send nothing
            if (message_input.value == "") return

            // Prepare JSON data
            data = {
                type: "chat",
                username: username,
                message: message_input.value
            }

            // Reset message input
            message_input.value = ""

            break
    }

    // Convert and send data to server
    websocket.send(JSON.stringify(data))
}

/**
 * Get username with AJAX
 * @returns {Promise<string>} Promise with username
 */
const getUsername = () => {
    const username = new Promise((resolve) => {
        const xhr = new XMLHttpRequest()
        xhr.open("GET", "src/scripts/php/get_username.php", true)
        xhr.send()
        xhr.onreadystatechange = () => {
            // If request is successful, resolve promise with username
            if (xhr.readyState === 4 && xhr.status === 200)
                resolve(xhr.responseText)
        }
    })
    return username
}
