<?php
include 'guestbook.php';

$guestbook = new Guestbook("localhost", "root", "", "eks");

$sortOrder = isset($_GET['sortOrder']) ? $_GET['sortOrder'] : 'DESC';
$sortColumn = isset($_GET['sortColumn']) ? $_GET['sortColumn'] : 'Timestamp';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$entries = $guestbook->getEntries($sortColumn, $sortOrder, $searchTerm);

foreach ($entries as $row) {
    echo "<strong>{$row['Name']}</strong> ({$row['Email']})<br>";
    echo "{$row['Message']}<br>";
    echo "{$row['Timestamp']}<hr>";
}

$guestbook->closeConnection();
?>
