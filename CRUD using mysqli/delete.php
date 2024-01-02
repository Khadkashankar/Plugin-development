​<?php
include('connection.php') ;
if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $sql = "delete from task where task_id ='$task_id'";
     $result = $conn->query($sql);
     if ($result == TRUE) {
        header('Location: show.php');
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
?>