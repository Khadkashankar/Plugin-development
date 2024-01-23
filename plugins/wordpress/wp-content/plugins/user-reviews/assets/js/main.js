jQuery(document).ready(function ($) {

    $("#user-form").on('submit', function (e) {
        e.preventDefault();


        $(".error-message").text('');

        var email = $("#email").val();
        var pass = $("#pass").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var review = $("#review").val();
        var rating = $("#rating").val();
        var nonce = urwr_obj.nonce;

        if (email === '') {
            showError('#invalid-email', 'Email cannot be empty');
        } else if (pass === '' || pass.length < 8) {
            showError('#invalid-pass', 'Password must be at least 8 characters');
        } else if (firstname === '') {
            showError('#invalid-firstname', 'Firstname cannot be empty');
        } else if (lastname === '') {
            showError('#invalid-lastname', 'Lastname cannot be empty');
        } else if (review === '') {
            showError('#invalid-review', 'Review cannot be empty');
        }

        $.ajax({
            type: 'POST',
            url: urwr_obj.ajaxurl,
            data: {
                action: 'urwr_reviews_register',
                email: email,
                pass: pass,
                firstname: firstname,
                lastname: lastname,
                review: review,
                rating: rating,
                nonce: nonce,
            },
            success: function (response) {
                if (response.success) {
                    alert('Success: ' + response.data);
                } else {
                    alert('Error: ' + response.data);
                }
            },
        });
    });

    // Function to show error messages
    function showError(elementId, message) {
        $(elementId).text(message);
        $(elementId).css('color', 'red');
    }

    // all reviews with page reload
    function loadAllUserReviews() {
        $.ajax({
            type: 'POST',
            url: urwr_obj.ajaxurl,
            data: {
                action: 'urwr_render_user_reviews',
                rating: '',
                order_by: '',
                page: 1,
            },
            success: function (response) {
                $('#reviews-container').html(response);
                console.log(response);
            },
        });
    }

    //go to first page when filter change
    $("#rating_num, #registered_date").on('change', function () {
        var rating = $("#rating_num").val();
        var order_by = $("#registered_date").val();

        $.ajax({
            type: 'POST',
            url: urwr_obj.ajaxurl,
            data: {
                action: 'urwr_render_user_reviews',
                rating: rating,
                order_by: order_by,
                page: 1,
            },
            success: function (response) {
                $('#reviews-container').html(response);
                console.log(response);
            },
        });
    });

    // when user click on page number
    $(document).on('click', '.pagination-container .pagination a', function (e) {
        e.preventDefault();

        var page = $(this).data('page');
        var rating = $("#rating_num").val();
        var order_by = $("#registered_date").val();

        $.ajax({
            type: 'POST',
            url: urwr_obj.ajaxurl,
            data: {
                action: 'urwr_render_user_reviews',
                rating: rating,
                order_by: order_by,
                page: page,
            },
            success: function (response) {
                $('#reviews-container').html(response);
                console.log(response);
            },
        });
    });

    // Initial load all user reviews on page load
    $(document).ready(function () {
        loadAllUserReviews();
    });
});
