<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "mydb";
try{
$conn = new PDO("mysql:host=$server_name;dbname=$db_name",$user_name,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>