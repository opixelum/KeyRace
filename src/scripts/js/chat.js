let username // Current user's name
let track    // Current user's car track
let players = [] // Array of players

// Get all div for username display
const usernameDivs = document.querySelectorAll(`#username`)

// Create a new WebSocket object
const chatBox = document.querySelector('#chat-box')
const wsUri = "ws://localhost:3307/src/script/php/websocket.php"
websocket = new WebSocket(wsUri)

// Connection is open
websocket.onopen = () => {
    // Notify user
    chatBox.innerHTML += `<div class="system_msg text-white-50">Chat open</div>`

    // Await getUsername() promise to get username
    getUsername().then(res => {
        username = res
        send("joined")
    })
}

// Message received from server
websocket.onmessage = ev => {
    // PHP sends Json data
    const response = JSON.parse(ev.data)
    // Message type
    const type = response.type
    // Message text
    const message = response.message
    // Username
    const username = response.username

    switch (type) {
        // When someone sends a message in the chat
        case 'chat':
            chatBox.innerHTML += `<div><ins>${username}:</ins> <span class="message text-break">${message}</span></div>`
            break;

        // If a user has joined the game
        case 'joined':
            // Get all usernames
            const usernames = response.usernames
            // Add each username to players array if not already in it
            usernames.forEach(username => {
                if (!players.includes(username))
                    players.push(username)
            })


            // Diplay username on corresponding track
            for (let div of usernameDivs) {
                if (div.innerText === "No player") {
                    const newUsername = usernames.pop()
                    div.innerText = newUsername ? newUsername : "No player"
                }
            }
            break;

        // If a user has left the game
        case 'left':
            // Remove username from corresponding track
            for (let div of usernameDivs) {
                if (div.innerText === username) {
                    div.innerText = "No player"
                    return
                }
            }
            break;
    }
    // Scroll message
    if (chatBox[0]) chatBox[0].scrollTop = chatBox[0].scrollHeight
}

websocket.onerror = ev => { chatBox.innerHTML += `<div class="system_error text-white-50">Error Occurred - ${ev.data}</div>` }
websocket.onclose = () => { chatBox.innerHTML += `<div class="system_msg text-white-50">Connection Closed</div>` }

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
