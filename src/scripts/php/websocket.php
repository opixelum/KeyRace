<?php
$host = 'localhost';
$port = '3307';
$null = NULL;

// Create TCP/IP stream socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// Reuseable port
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);

// Bind socket to specified host
socket_bind($socket, 0, $port);

// Listen to port
socket_listen($socket);

// Create & add listening socket to the list
$clients = array($socket);

// Start endless loop, so that our script doesn't stop
while (true)
{
	// Manage multipal connections
	$changed = $clients;
	// Returns the socket resources in $changed array
	socket_select($changed, $null, $null, 0, 10);

	// Check for new socket, block if there's already 6 sockets connected
	if (in_array($socket, $changed) && count($clients) < 6)
	{
		// Accept new socket
		$socket_new = socket_accept($socket);
		// Add socket to client array
		$clients[] = $socket_new;

		// Read data sent by the socket
		$header = socket_read($socket_new, 1024);
		// Perform websocket handshake
		perform_handshaking($header, $socket_new, $host, $port);

		// Make room for new socket
		$found_socket = array_search($socket, $changed);
		unset($changed[$found_socket]);
	}

	// Loop through all connected sockets
	foreach ($changed as $changed_socket)
	{
		// Check for any incomming data
		while (socket_recv($changed_socket, $buf, 1024, 0) >= 1)
		{
			// Unmask data
			$received_text = unmask($buf);
			// JSON decode
			$tst_msg = json_decode($received_text, true);
			// Sender name
			$user_name = $tst_msg['name'];
			// Message text
			$user_message = $tst_msg['message'];
			// Color
			$user_color = $tst_msg['color'];

			// Prepare data to be sent to client
			$response_text = mask(json_encode(array('type' => 'usermsg', 'name' => $user_name, 'message' => $user_message, 'color' => $user_color)));
			// Send data
			send_message($response_text);

			// Exit this loop
			break 2; 
		}

		$buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);
		// Check disconnected client
		if ($buf === false)
		{ 
			// Remove client for $clients array
			$found_socket = array_search($changed_socket, $clients);
			socket_getpeername($changed_socket, $ip);
			unset($clients[$found_socket]);

			// Notify all users about disconnected connection
			$response = mask(json_encode(array('type' => 'system', 'message' => $ip . ' disconnected')));
			send_message($response);
		}
	}
}
// Close the listening socket
socket_close($socket);

function send_message($msg)
{
	global $clients;
	foreach ($clients as $changed_socket)
		@socket_write($changed_socket, $msg, strlen($msg));

	return true;
}


// Unmask incoming framed message
function unmask($text)
{
	$length = ord($text[1]) & 127;
	if ($length == 126)
	{
		$masks = substr($text, 4, 4);
		$data = substr($text, 8);
	}
	elseif ($length == 127)
	{
		$masks = substr($text, 10, 4);
		$data = substr($text, 14);
	}
	else
	{
		$masks = substr($text, 2, 4);
		$data = substr($text, 6);
	}

	$text = "";
	for ($i = 0; $i < strlen($data); ++$i)
		$text .= $data[$i] ^ $masks[$i % 4];

	return $text;
}

// Encode message for transfer to client.
function mask($text)
{
	$b1 = 0x80 | (0x1 & 0x0f);
	$length = strlen($text);

	if ($length <= 125)
		$header = pack('CC', $b1, $length);

	elseif ($length > 125 && $length < 65536)
		$header = pack('CCn', $b1, 126, $length);

	elseif ($length >= 65536)
		$header = pack('CCNN', $b1, 127, $length);

	return $header . $text;
}

// Handshake new client.
function perform_handshaking($receved_header, $client_conn, $host, $port)
{
	$headers = array();
	$lines = preg_split("/\r\n/", $receved_header);
	foreach ($lines as $line)
	{
		$line = chop($line);
		if (preg_match('/\A(\S+): (.*)\z/', $line, $matches))
			$headers[$matches[1]] = $matches[2];
	}

	$secKey = $headers['Sec-WebSocket-Key'];
	$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
	// Hand shaking header
	$upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
		"Upgrade: websocket\r\n" .
		"Connection: Upgrade\r\n" .
		"WebSocket-Origin: $host\r\n" .
		"WebSocket-Location: ws://$host:$port/demo/shout.php\r\n" .
		"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
	socket_write($client_conn, $upgrade, strlen($upgrade));
}
