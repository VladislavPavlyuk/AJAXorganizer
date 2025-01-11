$(document).ready(function() {
    $('#taskForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'add_task.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#taskList').html(response);
            }
        });
    });
});

function removeTask(date, index) {
    $.ajax({
        url: 'remove_task.php',
        method: 'POST',
        data: { date: date, index: index },
        success: function(response) {
            $('#tasks').html(response);
        }
    });
}