<?php
include 'database.php';

$database = new Database();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $database->deleteData($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
</head>

<body>
    <table>
        <tr>
            <th>S.N</th>
            <th>task</th>
            <th>Action</th>
        </tr>
        <tr>
            <?php
    $data = $database->displayData();
    $i=1;
    foreach($data as $value){
        ?>
            <td><?php echo $i++; ?></td>
            <td><?php echo $value['task_name']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $value['task_id']; ?>">Edit</a>
                <a href="view.php?id=<?php echo $value['task_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>