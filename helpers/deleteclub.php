<?php
include '../config/config.php';
$id=$_GET['clubid'];

$sql = "DELETE FROM teams WHERE team_id='$id'";
if (mysqli_query($conn, $sql)) {
    $logout= BASE_URL. '/dashboard/manageclub.php';
    header( "location:$logout" );
    echo "<script>
alert('Deleted successfully');
</script>";

}else{
    echo "<script>
alert('Something wrong happened');
</script>";
}
