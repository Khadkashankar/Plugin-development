<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
</head>

<body>

    <form action="" method="POST">
        <label for="">Task Name</label><br>
        <input type="text" name="name">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>
<?php


if(isset($_REQUEST['submit'])){
    $name = $_REQUEST['name'];

    $sql = "insert into task ('task_name') values('$name')";
    
    $conn->exec($sql);

    echo "data inserted";
}
?>