<?php
require('connection.php');

if(isset($_POST['action'])){
    if($_POST['action'] == 'insert'){
        insert();
    }
    else if($_POST['action'] == 'edit'){
        edit();
    }
    else{
        delete();
    }
}

function insert(){
    global $conn;
    
    $name = $_POST['name'];
    $sql = "insert into task values('','$name')";
    
   mysqli_query($conn, $sql);
   
   echo "task inserted";
    
    
}

function edit(){
    global $conn;
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $sql = "update task set task_name = '$name' where task_id='$id'";
    
   mysqli_query($conn, $sql);
   
   echo "task updated";
    
    
}
function delete(){
    global $conn;
    
    $id = $_POST['action'];
    $sql = "delete from task where task_id='$id'";
    
   mysqli_query($conn, $sql);
   
   echo "task deleted";
}
 ?>