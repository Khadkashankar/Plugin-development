<?php
include('connection.php');

if(isset($_POST['update'])){
    
   $task_id = $_POST['task_id'];
   $task_name = $_POST['task_name'];
   $sql="update task set task_name = '$task_name' where task_id ='$task_id'";
   $result=$conn->query($sql);
   if($result == TRUE){
  header('location: show.php');
  }
  else{
  echo "Error:" . $sql . "<br>" . $conn->error;
  }
}

if (isset($_GET['task_id'])) {
    
  $task_id = $_GET['task_id'];
    $sql = "select * from task where task_id='$task_id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $task_id = $row['task_id'];
    $task_name = $row['task_name'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
</head>

<h2>update your task</h2>
<form action="" method="POST">
    <label for="taskName">Add your task here</label><br>
    <input type="text" id="taskName" name="task_name" value="<?php echo $task_name; ?>" required>
    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
    <input type="submit" name="update" value="Update">
</form>
</body>

</html>

<?php }
else{
    header('location: show.php');

    
}
}

?>