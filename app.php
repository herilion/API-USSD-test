<?php
// Reads the variables sent via POST
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$text = $_POST["text"];

// Initialize the response
$response = "";

// Handle the different USSD menu options
if ($text == "") {
    // First menu screen
    $response  = "CON Hi welcome, I can help you with Event Reservation \n";
    $response .= "1. Enter 1 to continue";
} else if ($text == "1") {
    // Second menu screen
    $response  = "CON Pick a table for reservation below \n";
    $response .= "1. Table for 2 \n";
    $response .= "2. Table for 4 \n";
    $response .= "3. Table for 6 \n";
    $response .= "4. Table for 8 \n";
} else if (strpos($text, "1*") === 0) {
    // Process reservations based on the selected table
    $selectedTable = explode('*', $text)[1];
    
    if (strpos($text, "1*{$selectedTable}*1") === 0) {
        // Third menu screen
        $response = "CON You are about to book a table for {$selectedTable} \n";
        $response .= "Please Enter 1 to confirm \n";
    } else if (strpos($text, "1*{$selectedTable}*1*") === 0) {
        // Fourth menu screen
        $confirmation = explode('*', $text)[3];

        if ($confirmation == "1") {
            $response = "END Your Table reservation for {$selectedTable} has been booked";
        } else if ($confirmation == "0") {
            $response = "END Your Table reservation for {$selectedTable} has been canceled";
        }
    }
}

// Echo the response
header('Content-type: text/plain');
echo $response;
?>