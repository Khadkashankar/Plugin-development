<?php
include('connection.php');

$name=$_POST['name'];

$sql="insert into task(task_name) values ('$name')";
$result=$conn->query($sql);
   if($result == TRUE){
    echo "data inserted";
   }

?>