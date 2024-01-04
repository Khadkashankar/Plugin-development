<?php
include ('connection.php');
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql = "delete from task where task_id = '$id'";
    $result = $conn->query($sql);
    if($result){
    header('location:view.php');
    }
    
}

?>