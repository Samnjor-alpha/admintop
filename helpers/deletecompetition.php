<?php
include '../config/config.php';
$id=$_GET['compid'];

    $sql = "DELETE FROM competitions WHERE comp_id='$id'";
    if (mysqli_query($conn, $sql)) {
        $logout= BASE_URL. '/dashboard/managecompetitions.php';
        header( "refresh:0;url=$logout" );
        echo "<script>
alert('Deleted successfully');
</script>";

    }else{
        echo "<script>
alert('Something wrong happened');
</script>";
    }

