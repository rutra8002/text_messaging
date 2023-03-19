<?php
session_start();
if (isset($_SESSION["username"]) && $_POST["message"]) {
    $username = $_SESSION["username"];
    $message = $_POST["message"];
    $time = date("h:i:s A"); // add the current time to the message
    $file = fopen("messages.txt", "a");
    fwrite($file, $username . ": " . $message . " (" . $time . ")" . "\n");
    fclose($file);
    echo "Message saved.";
} else {
    echo "Please enter your message.";
}

?>
