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
    <a href="index.php">ADD TASK</a>
    <table>
        <thead>
            <tr>
                <th>S.N</th>
                <th>taskname</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="select * from task";
            $result=$conn->query($sql);
            if($result->num_rows > 0){
                $serial=1;
                while($row = $result->fetch_assoc()){
                    ?>

            <tr>
                <td> <?php echo $serial++; ?> </td>
                <td> <?php echo $row['task_name']; ?> </td>
                <td><a href="edit.php?task_id=<?php echo $row['task_id']; ?>">Edit</a>
                    <a href="delete.php?task_id=<?php echo $row['task_id']; ?>">Delete</a>
                </td>
            </tr>
            <?php }
            }
            ?>
        </tbody>
    </table>

</body>

</html>