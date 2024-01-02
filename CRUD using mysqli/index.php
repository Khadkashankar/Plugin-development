<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="task_name" required>
        <input type="submit" name="submit" value="ADD TASK">
    </form>

</body>

</html>
<?php
if(isset($_POST['submit'])){
    $task_name = $_POST['task_name'];
    include('connection.php');
    $sql="insert into task(task_name) values ('$task_name')";
    $result = $conn->query($sql);
    header("location: show.php");
// $conn->close();
}

?>