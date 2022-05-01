// Create a new WebSocket object
const msgBox = document.querySelector('#message-box')
const wsUri = "ws://localhost:3307/src/script/php/websocket.php"
websocket = new WebSocket(wsUri)

// Connection is open
websocket.onopen = () => {
    // Notify user
    msgBox.innerHTML += `<div class="system_msg text-white-50">Chat open</div>`
}
// Message received from server
websocket.onmessage = ev => {
    // PHP sends Json data
    const response = JSON.parse(ev.data)
    // Message type
    const res_type = response.type
    // Message text
    const user_message = response.message
    // User name
    const user_name = response.name

    switch (res_type) {
        case 'usermsg':
            msgBox.innerHTML += `<div><ins>${user_name}:</ins> <span class="user_message">${user_message}</span></div>`
            break;

        case 'system':
            msgBox.innerHTML += `<div class="text-white-50">${user_message}</div>`
            break;
    }
    // Scroll message
    if (msgBox[0]) msgBox[0].scrollTop = msgBox[0].scrollHeight
}

websocket.onerror = ev => { msgBox.innerHTML += `<div class="system_error text-white-50">Error Occurred - ${ev.data}</div>` }
websocket.onclose = () => { msgBox.innerHTML += `<div class="system_msg text-white-50">Connection Closed</div>` }

// Message send button
document.querySelector('#send-message').addEventListener("click", () => send_message())

// User hits enter key 
document.querySelector("#message").addEventListener("keydown", event => {
    if (event.which == 13) send_message()
})

// Send message
const send_message = () => {
    // User message text
    const message_input = document.querySelector(`#message`)
    
    // If no message provided, send nothing
    if(message_input.value == "") return

    // Prepare JSON data
    const msg = {
        message: message_input.value,
        name: "Username"
    }
    // Convert and send data to server
    websocket.send(JSON.stringify(msg))
    message_input.value = '' // Reset message input
}
