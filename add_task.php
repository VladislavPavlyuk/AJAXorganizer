<?php

session_start();

if (isset($_SESSION['organizer'])) {
    // Unserialize the object
    $organizer = unserialize($_SESSION['organizer']);
    if ($organizer === false) {
        echo "Failed to serialize the object.";
    } else {
        echo "Object serialized successfully.";
    }
} else {
    echo "Session variable 'organizer' does not exist.";
}
require 'Organizer.php';

if (!isset($_SESSION['organizer'])) {
    $_SESSION['organizer'] = new Organizer();
}

$date = $_POST['date'];
$task = $_POST['task'];

$_SESSION['organizer']->addTask($date, $task);

echo json_encode($_SESSION['organizer']->getTasks('day'));


