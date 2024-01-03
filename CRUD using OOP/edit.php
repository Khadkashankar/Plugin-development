<?php
include 'database.php';

$database = new Database();

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $record = $database->displayDataById($id);
  
}

if(isset($_POST['update'])){
    
    $name = $_POST['task'];
    $id = $_POST['id'];
   $database->updateData($name,$id); 
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
        TO DO <input type="text" name="task" value="<?php echo $record['task_name']; ?>">
        <input type="hidden" name="id" value="<?php echo $record['task_id']; ?>">
        <input type="submit" name="update" value="Update">
    </form>
</body>

</html>