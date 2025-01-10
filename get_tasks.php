<?php

session_start();

require 'Organizer.php';

if (!isset($_SESSION['organizer'])) {
    $_SESSION['organizer'] = new Organizer();
}

$period = $_GET['period'];
$tasks = $_SESSION['organizer']->getTasks($period);

echo json_encode($tasks);

