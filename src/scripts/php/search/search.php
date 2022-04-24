<?php
// Load XML file containing all the players
$players = simplexml_load_file("players.xml")
or die("Error: Cannot create object");

// Get the query parameter from URL
$query = $_GET["q"];

// Once user enters at least one character, search for the player
if (strlen($query) > 0)
{
  $results = "";

  // Loop through all the players in the XML file
  for ($i = 0; $i < sizeof($players->player); $i++)
  {
    // Get the user's id and username
    $id = $players->player[$i]["id"];
    $username = $players->player[$i]["username"];

    // Display the 5 first players that match the search
    if (str_starts_with($id, $query) || str_starts_with($username, $query))
    {
      // Add the first or only player to the results
      if ($results == "")
        $results = "<a class='text-white' href='profile.php?id=$id'>$username</a>";

      // If there are 5 results, stop concatenation
      // We use `<br>` as a separator
      else if (substr_count($results, "<br>") == 4) break;

      // Add the other players
      else $results .= "<br><a class='text-white' href='profile.php?id=$id'>$username</a>";
    }
  }
}

// If no results, set response to "No results"
if ($results == "") $response = "No results";
// If yes, add results to response
else $response = $results;

// Send response to the AJAX request
echo $response;
