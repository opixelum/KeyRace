// Create a new WebSocket object
const msgBox = document.querySelector('#message-box')
const wsUri = "ws://localhost:3307/src/script/php/websocket.php"
websocket = new WebSocket(wsUri)

// Connection is open
websocket.onopen = () => {
    // Notify user
    msgBox.innerHTML += `<div class="system_msg" style="color:#bbbbbb">Welcome to my "Demo WebSocket Chat box"!</div>`
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
    // Color
    const user_color = response.color

    switch (res_type) {
        case 'usermsg':
            msgBox.innerHTML += `<div><span class="user_name" style="color:${user_color}">${user_name}</span> : <span class="user_message">${user_message}</span></div>`
            break;

        case 'system':
            msgBox.innerHTML += `<div style="color:#bbbbbb">${user_message}</div>`
            break;
    }
    // Scroll message
    msgBox[0].scrollTop = msgBox[0].scrollHeight
}

websocket.onerror = ev => { msgBox.innerHTML += `<div class="system_error">Error Occurred - ${ev.data}</div>` }
websocket.onclose = () => { msgBox.innerHTML += `<div class="system_msg">Connection Closed</div>` }

// Message send button
document.querySelector('#send-message').click(() => {
    send_message()
})

// User hits enter key 
document.querySelector("#message").addEventListener("keydown", event => {
    if (event.which == 13) send_message()
})

// Send message
const send_message = () => {
    // User message text
    const message_input = document.querySelector(`#message`)
    // User name
    const name_input = document.querySelector(`#name`)
    
    // If no name provided, alert
    if(message_input.value == '') {
        alert(`Enter your Name please!`)
        return
    }
    // If no message provided, alert
    if(message_input.value == "") {
        alert(`Enter Some message Please!`)
        return
    }

    // Prepare JSON data
    const msg = {
        message: message_input.value,
        name: name_input.value,
        color : `<?php echo $colors[$color_pick]; ?>`
    }
    // Convert and send data to server
    websocket.send(JSON.stringify(msg))
    message_input.value = '' // Reset message input
}
