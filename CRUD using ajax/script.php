<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</script>
<script text="text/javascript">
function submitData(action) {
    $(document).ready(function() {
        var data = {
            action: action,
            id: $("#id").val(),
            name: $("#name").val(),
        };
        $.ajax({
            url: 'function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                alert(response);
            }
        });
    });
}
</script>