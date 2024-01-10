<?php

if(isset($_POST['submit'])){

    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $username = sanitize_text_field($_POST['username']);
    $displayname = sanitize_text_field($_POST['displayname']);
    $firstname = sanitize_text_field($_POST['firstname']);
    $lastname = sanitize_text_field($_POST['lastname']);
    $role = $_POST['role'];

    $user_data = array(
        'user_login' => $username,
        'user_pass' => $password,
        'user_nicename' => $firstname.' '.$lastname,
        'user_email' => $email,
        'display_name' => $displayname,
        'role' => $role
    );
    
    $user_id = wp_insert_user($user_data);

    if($user_id){
        // add_user_meta($user_id,'first_name',$firstname);
        echo $displayname." registered successfully";
    }

}

?>
<form action="" method="POST">
    <label for="">Email:</label>
    <input type="email" name="email" required><br><br>
    <label for="">Password:</label>
    <input type="password" name="password" required><br><br>
    <label for="">User Name:</label>
    <input type="text" name="username" required><br><br>
    <label for="">Display Name:</label>
    <input type="text" name="displayname" required><br><br>
    <label for="">First Name:</label>
    <input type="text" name="firstname" required><br><br>
    <label for="">Last Name:</label>
    <input type="text" name="lastname" required><br><br>
    <select name="role" id="">Select Role:
        <option value="editor">Editor</option>
        <option value="subscriber">Subscriber</option>
        <option value="administrator">Administrator</option>
    </select><br><br>
    <input type="submit" name="submit" value="Register">

</form>