<?php
session_start();
define('BASE_URL', 'https://localhost/admintop/');


    session_unset();
    session_destroy();
$logout= BASE_URL. 'auth/login.php';
header( "location:$logout" );
echo "<script>
alert('Logged out successfully');
</script>";

?>