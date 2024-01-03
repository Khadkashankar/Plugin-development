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
    <table>
        <thead>
            <tr>
                <th>S.N</th>
                <th>Task Name </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id=" table">
            <?php
    $sql = "select * from task";
    $result = $conn->query($sql);
   if($result->num_rows > 0){
    $serial=1;
    while($row = $result->fetch_assoc()){
        
        ?>
            <tr id="<?php echo $row['task_id']; ?>">
                <td>
                    <?php echo $serial++;?>
                </td>
                <td>
                    <?php echo $row['task_name'];?>
                </td>
                <td>
                    <a href="editUser.php?task_id=<?php echo $row['task_id']; ?>">Edit</a>
                    <button type="button" onclick="submitData(<?php echo $row['task_id']; ?>);">Delete</button>
                </td>
            </tr>
            <?php
            include('script.php');
        }

        }

        ?>


        </tbody>
    </table>
</body>

</html>