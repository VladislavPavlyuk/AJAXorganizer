<?php
class Organizer {
    private $tasks = [];

    // Метод для добавления задачи
    public function addTask($date, $task) {
        $this->tasks[$date][] = $task;
    }

    // Метод для получения задач на определенный период
    public function getTasks($period) {
        $result = [];
        $currentDate = new DateTime();

        foreach ($this->tasks as $date => $tasks) {
            $taskDate = new DateTime($date);
            $interval = $currentDate->diff($taskDate)->days;

            if (($period == 'day' && $interval == 0) ||
                ($period == 'week' && $interval <= 7) ||
                ($period == 'month' && $interval <= 30)) {
                $result[$date] = $tasks;
            }
        }
        return $result;
    }

    // Метод для отмены задачи
    public function removeTask($date, $taskIndex) {
        if (isset($this->tasks[$date][$taskIndex])) {
            unset($this->tasks[$date][$taskIndex]);
            $this->tasks[$date] = array_values($this->tasks[$date]); // Пересортировка массива
        }
    }
}
