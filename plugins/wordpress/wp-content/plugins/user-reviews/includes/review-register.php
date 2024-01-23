<?php
//check the nonce
if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'urwr_user_review_nonce')) {
    wp_send_json_error('Nonce verification failed');
}

if (
    isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['review']) && isset($_POST['rating'])
) {
    $email = sanitize_email($_POST['email']);
    $pass = sanitize_text_field($_POST['pass']);
    $firstname = sanitize_text_field($_POST['firstname']);
    $lastname = sanitize_text_field($_POST['lastname']);
    $review = sanitize_textarea_field($_POST['review']);
    $rating = $_POST['rating'];

    if (empty($email) || empty($pass) || empty($firstname) || empty($lastname) || empty($review)) {
        wp_send_json_error('plz valid input data');
    }

    //filter to extract username from email
    $username = apply_filters('urwr_extract_username_email', $email);


    //check email existance
    $user_exists = email_exists($email);
    if ($user_exists) {
        wp_send_json_error('Email already exists');
    }

    $user_data = array(
        'user_login' => $username,
        'user_pass' => $pass,
        'user_nicename' => $firstname . ' ' . $lastname,
        'user_email' => $email,
    );

    //insert to wp_users table
    $user_id = wp_insert_user($user_data);

    //hook to send email to registerd users
    do_action('urwr_send_mail', $email);

    //insert data to wp_usersmeta table
    if ($user_id) {
        $data = array(
            'review' => $review,
            'rating' => $rating
        );
        foreach ($data as $key => $value) {
            update_user_meta($user_id, $key, $value);
        }
        wp_send_json_success('User registered successfully');
    } else {
        wp_send_json_error('User registration failed');
    }
} else {
    wp_send_json_error('Incomplete data');
}
