<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>

</head>

<body>
    <form method="POST" action="">
        <?php  
        
        include('connection.php');
        
        $id = $_GET['task_id'];
        $sql="select * from task where task_id ='$id'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        
        ?>

        <label for="">Task</label>
        <input type="text" id="name" value="<?php echo $row['task_name'];  ?>">
        <input type="hidden" id="id" value="<?php echo $row['task_id'];  ?>">

        <button type="button" onclick="submitData('edit');">UPDATE</button>
    </form>

    <?php include('script.php'); ?>
</body>

</html>