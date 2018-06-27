<?php

//include_once 'connect.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dudb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}

$personSel = "SELECT all * FROM person";
$persons = $conn->query($personSel);

if ($personSel->num_rows > 0) {
  foreach($persons as $person) {
    $person = array (
      "name" => $person->name
    );
  }
}


$players = array (
  array(
    "playerName" => "Alexandra",
    "god" => "Lolth",
    "EP" => 6
  ),
  array(
    "playerName" => "Diona",
    "god" => "Mortias",
    "EP" => 12
  ),
  array(
    "playerName" => "Raymon",
    "god" => "Akaill",
    "EP" => 3
  )
);

// @todo skill condition werkend maken
  $skillNames = array (
   array (
    "name" => "Speak Truth",
    "EP" => 3,
    "condition" => NULL
   ),
   array (
     "name" => "Shadow blast",
     "EP" => 6,
     "condition" => NULL
   ),
   array (
     "name" => "Web of the Spiderqueen",
     "EP" => 12,
     "condition" => "Shadow blast"
   )
 );

  foreach ($players as $player) {
    echo "<br>This is player: ". $player["playerName"] . "<br>";

    if($player["god"] === "Lolth" || $player["god"] === "Akaill") {

        foreach ($skillNames as $skillName) {
          if($player["EP"] < $skillName["EP"]) {
            echo $skillName["name"] . ": deze skill kan je niet kopen<br>";
          } else {
            echo $skillName["name"] .", EP-cost: ". $skillName["EP"] . "<br>";
          }
        }

    } else {
        echo "je mag geen spreuken van deze god kiezen<br>";
    }
  }

?>
