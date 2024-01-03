<?php
include 'database.php';

$database = new Database();

if(isset($_POST['submit'])){
   $database->addData($_POST); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        TO DO <input type="text" name="taskName" value="">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>