<?php
session_start();
require 'Organizer.php';

if (!isset($_SESSION['organizer'])) {
    $_SESSION['organizer'] = new Organizer();
}

$organizer = $_SESSION['organizer'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $index = $_POST['index'];
    $organizer->removeTask($date, $index);
}

$tasks = $organizer->getTasks('day'); // Получение задач на день
foreach ($tasks as $date => $taskList) {
    echo "<h3>$date</h3><ul>";
    foreach ($taskList as $index => $task) {
        echo "<li>$task <button onclick='removeTask(\"$date\", $index)'>Удалить</button></li>";
    }
    echo "</ul>";
}