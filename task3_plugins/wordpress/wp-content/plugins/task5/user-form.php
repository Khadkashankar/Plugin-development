<?php

if(isset($_POST['submit'])){
   global $wpdb;
    
    $email = $wpdb->escape($_POST['email']);
    $password = $wpdb->escape($_POST['password']);
    $user_name = $wpdb->escape($_POST['user_name']);
    $display_name = $wpdb->escape($_POST['display_name']);
    $first_name = $wpdb->escape($_POST['first_name']);
    $last_name = $wpdb->escape($_POST['last_name']);
    $role = $wpdb->escape($_POST['role']);



    $user_data = array(
        'user_login'=>$user_name,
        'user_pass'=>$password,
        'user_nicename'=>$first_name.' '.$last_name,
        'user_email'=>$email,
        'display_name'=>$display_name,
        'role' => $role
        
    );
     $user_id = wp_insert_user($user_data);
    // print_r($res);
    // if($res){
    //     echo "user registered successfully";
    // }
    if(!is_wp_error($user_id)){
        add_user_meta($user_id,'role',$role);
       echo $user_id." user registered successfully";
 }
 else{
    echo "error while registering user";
 }
}
?>

<form action="<?php echo get_the_permalink(); ?>" method="POST">
    <br><br>
    <label for="">Email:</label>
    <input type="email" name="email" required> <br><br>
    <label for="">Password:</label>
    <input type="password" name="password" required> <br><br>
    <label for="">UserName:</label>
    <input type="text" name="user_name" required> <br><br>
    <label for="">DisplayName:</label>
    <input type="text" name="display_name" required> <br><br>
    <label for="">FirstName:</label>
    <input type="text" name="first_name" required> <br><br>
    <label for="">LastName:</label>
    <input type="text" name="last_name" required> <br><br>
    <label for="">select role</label>
    <select name="role" id="">
        <option value="subscriber">Subscriber</option>
        <option value="editor">Editor</option>
        <option value="administrator">Administrator</option>
    </select><br><br>
    <input type="submit" name="submit" value="Send">
</form>