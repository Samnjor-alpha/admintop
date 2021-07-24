<?php
define('BASE_URL', 'https://localhost/admintop/');
session_start();

    session_unset();
    session_destroy();
$logout= BASE_URL. 'auth/login.php';
header( "refresh:0;url=$logout" );
echo "<script>
alert('Logged out successfully');
</script>";

?>