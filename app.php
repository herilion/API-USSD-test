<?php// Reads the variables sent via POST
$sessionId = $_POST["sessionId"];  
$serviceCode = $_POST["serviceCode"];  
$text = $_POST["text"];
//This is the first menu screen
if ( $text == "" ) {
    $response  = "CON Hi welcome, I can help you with Event Reservation \n";
    $response .= "1. Enter 1 to continue";
}
// Menu for a user who selects '1' from the first menu
// Will be brought to this second menu screen

else if ($text == "1") {
    $response  = "CON  Pick a table for reservation below \n";
    $response .= "1. Table for 2 \n";
    $response .= "2. Table for 4 \n";
    $response .= "3. Table for 6 \n";
    $response .= "4. Table for 8 \n";
}
//Menu for a user who selects '1' from the second menu above
// Will be brought to this third menu screen

else if ($text == "1*1") {
    $response = "CON You are about to book a table for 2 \n";
    $response .= "Please Enter 1 to confirm \n";
}