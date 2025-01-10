$(document).ready(function() {
    $('#taskForm').on('submit', function(e) {
        e.preventDefault();
        const date = $('#date').val();
        const task = $('#task').val();

        $.ajax({
            url: 'add_task.php',
            type: 'POST',
            data: { date: date, task: task },
            success: function(response) {
                $('#taskList').html(response);
                $('#taskForm')[0].reset();
            }
        });
    });

    function loadTasks(period) {
        $.ajax({
            url: 'get_tasks.php',
            type: 'GET',
            data: { period: period },
            success: function(response) {
                $('#taskList').html(response);
            }
        });
    }

    // Example of loading tasks for the day
    loadTasks('day');
});