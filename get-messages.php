<?php
session_start();
if (isset($_SESSION["username"])) {
    $file = fopen("messages.txt", "r");
    if ($file) {
        while (($line = fgets($file)) !== false) {
            echo "<div class='message'>" . htmlspecialchars($line) . "</div>";
        }
        fclose($file);
    } else {
        echo "No messages found.";
    }
} else {
    echo "You are not logged in.";
}

?>