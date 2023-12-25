<?php
$comments = [];
$lines = file("aboba.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
file_put_contents("aboba.txt", $_POST["name"] . ": " . $_POST["comment"] . "\n", FILE_APPEND);
header("Location: /webusers/01-23-258/lab6/");
exit;
