<?php
session_start();
$users = array(
    "drukarka" => "rutra",
    "KK" => "password1",
    "KS" => "password2",
    "Hohenzollern" => "ZweitesDeutschesReich",
    "MZ" => "password4",
    "TM" => "password5",
);
$username = $_POST["username"];
$password = $_POST["password"];

if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION["username"] = $username;
    $file = fopen("messages.txt", "a");
    $message = "\n" . $username . " joined the chat" . "\n";
    fwrite($file, $message . "\n");
    fclose($file);
    echo "success";
} else {
    echo "Invalid username or password.";
}
?>