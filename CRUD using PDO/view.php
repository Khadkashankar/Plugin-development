<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">ADD TASK</a>
    <table>

        <tr>
            <td>S.N</td>
            <td>Task</td>
            <td>Action</td>
        </tr>
        <?php
    $sql = "select * from task";
    $statement = $conn->query($sql);
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if($result){
    foreach($result as $value){
   ?>

        <tr>
            <td><?php echo $value['task_id']; ?></td>
            <td><?php echo $value['task_name']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $value['task_id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $value['task_id']; ?>">Delete</a>
            </td>
        </tr>

        <?php 
    }
}
?>
    </table>
</body>

</html>