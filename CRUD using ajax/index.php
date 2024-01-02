<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
</head>

<body>
    <form id="userForm">
        <label>ADD TASK</label>
        <input type="text" id="name" required>

        <button type="submit" id="button">SAVE</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#userForm").submit(function(e) {
            e.preventDefault();
            var name = $("#name").val();
            $.ajax({
                url: 'insert.php',
                method: 'POST',
                data: {
                    name: name,

                },
                success: function(data) {

                    alert(data);
                }
            });
        });

    });
    </script>
</body>

</html>