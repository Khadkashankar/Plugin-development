jQuery(document).ready(function($) {
    $('#form_id').on('submit', function(e) {
        e.preventDefault();

        var name = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'custom_register_user',
                username: name,
                email: email,
                password:password
            },
            success: function(response) {
                alert(response);
            },
        });
    });
});