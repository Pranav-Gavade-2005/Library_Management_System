<?php
        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, "lms");
        $query = "delete from books where book_no = $_GET[bn]";
        $query_run = mysqli_query($connection, $query);
?>
<script>
    alert("Book is deleted!!");
    window.location.href = 'manage_book.php';
</script>