<?php

$conn = new mysqli("localhost","root","","mydb");

if($conn->connect_error){
    die("connection failed".$conn->mysqli_error);
}



?>