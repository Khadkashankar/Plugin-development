<?php
include('connection.php');

$task_id = $_POST['id'];
// echo $task_id;
$sql="delete from task where task_id = '$task_id'";
$result = $conn->query($sql);
if($result == TRUE){
    // echo "data deleted";
}

?>