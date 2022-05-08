let username
let players = []
const usernameDivs = document.querySelectorAll(`#username`)
const chatBox = document.querySelector('#chat-box')

// Create a new WebSocket object
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

            // Reset username divs
            usernameDivs.forEach(div => {
                div.innerText = ``
            })

            // Diplay username on corresponding div
            usernameDivs.forEach(div => {
                const newUsername = usernames.pop()
                console.log(newUsername)
                if (div.innerText === ``) {
                    div.innerText = newUsername ? newUsername : ``
                }
            })
            break;

        // If a user has left the game
        case 'left':
            // Remove username from corresponding div
            for (let div of usernameDivs) {
                if (div.innerText === username) {
                    div.innerText = ``
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
document.querySelector('#send-message').addEventListener("click", () => sendChat())

// User hits enter key for sending a chat
document.querySelector("#message").addEventListener("keydown", event => {
    if (event.which == 13) sendChat()
})

// Tell websocket that user has left the game
onbeforeunload = () => { send("left") }

/**
 * Send chat
 */
const sendChat = () => {
    // Get chat 
    let chat_input = document.querySelector("#message")

    // Send it to server if it is not empty
    if (chat_input.value != "") send("chat", chat_input.value)

    // Reset chat input
    chat_input.value = ``
}

/**
 *  Send message to server 
 * 
 * @param {string} type Type of message
 * @param {string} extraData Either chat message or car position
 */
const send = (type, extraData = ``) => {
    // Convert and send data to server
    websocket.send(JSON.stringify({
        type: type,
        username: username,
        extraData: extraData 
    }))
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
