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
    // Username
    const username = response.username
    // All cars
    const cars = document.querySelectorAll(`#user-car`)

    switch (type) {
        // When someone sends a message in the chat
        case 'chat':
            const chat = response.extraData
            chatBox.innerHTML += `<div><ins>${username}:</ins> <span class="message text-break">${chat}</span></div>`
            break

        // If a user has joined the game
        case 'joined':
            // Get all usernames
            players = response.players

            // Reset username divs
            usernameDivs.forEach(div => {
                div.innerText = ``
            })

            // Diplay username on corresponding div
            usernameDivs.forEach(div => {
                const newUsername = players.pop()
                if (div.innerText === ``)
                    div.innerText = newUsername ? newUsername : ``

                // Set used car opacity to 100% 
                cars[players.length].classList.replace(`opacity-50`, `opacity-100`)
            })

            break

        // If a user has left the game
        case 'left':
            // Remove username from corresponding div
            usernameDivs.forEach(div => {
                if (div.innerText === username) {
                    div.innerText = ``

                // Set used car opacity to 50%
                const index = Array.prototype.indexOf.call(usernameDivs, div)
                cars[index].classList.replace(`opacity-100`, `opacity-50`) 
                }
            })
            break

        case `car`:
            const carPosition = response.extraData

            // Update car position on corresponding div
            usernameDivs.forEach(div => {
                if (div.innerText === username) {
                    const car = div.parentElement.querySelector(`img`)
                    car.style.marginLeft = carPosition
                }
            })

            break

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
 * Send chat message to server.
 * It calls send() function with type="chat" & extraData=chat message.
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
    const username = new Promise(resolve => {
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
