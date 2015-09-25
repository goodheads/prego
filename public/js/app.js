$(document).ready(function() {
    $("button.delete").on('click', function(e){
        e.preventDefault();
        if ( ! confirm('Are you sure?')) {
            return false;
        }
        var action = $(this).data("action");
        var parent = $(this).parent();
        var token  = $(this).data("token");
        $.ajax({
            type: 'POST',
            url: action,
            data: { _token: token, _method: 'delete' },
            error: function(msg) {
               alert(msg.responseJSON[0]);
            },
            success: function() {
                window.location.href = '/projects'
            }
        });
    });
});