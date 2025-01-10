<?php

class Organizer
{
    private $tasks = [];

    public function addTask($date, $task) {
        $this->tasks[$date][] = $task;
    }

    public function getTasks($period) {
        $filteredTasks = [];
        $currentDate = new DateTime();

        foreach ($this->tasks as $date => $tasks) {
            $taskDate = new DateTime($date);
            $interval = $currentDate->diff($taskDate)->days;

            if (($period === 'day' && $interval === 0) ||
                ($period === 'week' && $interval <= 7) ||
                ($period === 'month' && $interval <= 30)) {
                $filteredTasks[$date] = $tasks;
            }
        }

        return $filteredTasks;
    }

    /*public function removeTask($date, $taskIndex) {
        if (isset($this->tasks[$date][$taskIndex])) {
            unset($this->tasks[$date][$taskIndex]);
            $this->tasks[$date] = array_values($this->tasks[$date]); // Reindex array
        }
    }*/

}