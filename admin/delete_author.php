<?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");
        $query = "delete from authors where author_id = $_GET[aid]";
        $query_run = mysqli_query($connection, $query);
?>
<script>
    alert("Author is deleted!!");
    window.location.href = 'manage_author.php';
</script>