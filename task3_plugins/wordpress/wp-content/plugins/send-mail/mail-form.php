<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
</head>

<body>

    <form action="" method="POST">
        <br><br>
        <label for="">Subject:</label>
        <input type="text" name="subject_name" required> <br><br>
        <label for="">Content:</label>

        <textarea name="content" id="" cols="30" rows="10"></textarea><br><br>
        <label for="">Send To:</label>
        <input type="email" name="send_to" required><br><br>

        <input type="submit" name="submit" value="Send">
    </form>
</body>

</html>
<?php

function sm_content_change($content){
    $content = "add this ";
    return $content;
}

function sm_mail_send($send_to,$subject_name,$content){
    $res = wp_mail($send_to,$subject_name,$content);

    if($res){
    echo "<h1> email sent </h1>";
    }

}

if(isset($_POST['submit'])){
    
    $subject_name = $_POST['subject_name'];
    $content = $_POST['content'];
    $send_to = $_POST['send_to'];

    $content = apply_filters('sm_content_message',$content);


    $args = array(
        'post_title'=> $subject_name,
        'post_content' => $content,
        );

    wp_insert_post($args);


// add_filter('sm_content_message','sm_content_change');
add_action('sm_after_post_insert','sm_mail_send',10,3);

do_action('sm_after_post_insert', $send_to,$content,$subject_name); 

}
?>