<?php
include 'guestbook.php';

$guestbook = new Guestbook("localhost", "root", "", "eks");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $guestbook->addEntry($name, $email, $message);
}


?>
