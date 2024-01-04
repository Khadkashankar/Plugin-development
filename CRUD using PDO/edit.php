<?php 
include 'connection.php';

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $id = $_POST['id'];
    $sql = "update task set task_name = '$name' where task_id='$id'";
    $result = $conn->query($sql);
    if($result){
        header('location:view.php');
    }

}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "select * from task where task_id='$id'";
    $statement=$conn->query($sql);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row)
   $id = $row['task_id'];
   $name = $row['task_name'];
}

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
        <input type="text" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="update" value="UPDATE">
    </form>
</body>

</html>