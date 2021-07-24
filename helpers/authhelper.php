<?php
include '../config/config.php';
session_start();

$msg = "";
$msg_class = "";
//Register start
if (isset($_POST['register'])) {
    //    $cpwd = stripslashes($_POST['cpassword']);
    $username = filter_var(stripslashes($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(stripslashes($_POST['email']), FILTER_SANITIZE_STRING);
    $pwd=filter_var(stripslashes($_POST['pwd']),FILTER_SANITIZE_STRING);
    $cpwd = filter_var(stripslashes($_POST['cpwd']),FILTER_SANITIZE_STRING);







    if (empty($_POST['username']) || empty($_POST['email']|| empty($_POST['pwd']))) {
        $msg = "inputs can not be empty";
        $msg_class=" alert-danger";
    } else{
        if(!empty($_POST["email"])) {
            $email = $_POST["email"];
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

                $msg = 'invalid email';
                $msg_class = ' alert-danger';
            } else {
                if(strlen($username) <4)
                {
                    $msg = "username is too short";
                    $msg_class = " alert-danger";
                }else {
                    $sql_e = "SELECT * FROM admin_user WHERE email='$email'";

                    $res_e = mysqli_query($conn, $sql_e);

                    $sql_u = "SELECT * FROM admin_user WHERE username='$username'";

                    $res_u = mysqli_query($conn, $sql_u);
                    if (mysqli_num_rows($res_u)>0){
                        $msg = "Username is associated with an account";
                        $msg_class = " alert-danger";

                    } elseif (mysqli_num_rows($res_e)>0){
                        $msg = "Email is associated with an account";
                        $msg_class = " alert-danger";
                    }else{


                        if(strlen(trim($pwd)) <6)
                        {
                            $msg = "password too short";
                            $msg_class = " alert-danger";
                        }else{
                            // check if passwords match
                            if ($pwd !== $cpwd) {
                                $msg = "The passwords do not match";
                                $msg_class = " alert-danger";
                            } elseif ($pwd == $cpwd) {

                                    $hash = password_hash($pwd, PASSWORD_DEFAULT);

                                if(empty($error)) {

                                    $sql = "INSERT INTO admin_user SET username='$username',email='$email',password='$hash'";
                                    if (mysqli_query($conn, $sql)) {

                                        $msg="Registered successfully!!";
                                        $msg_class=" alert-success";


                                    }else{
                                        $msg = "There was an Error in the database";
                                        $msg_class=" alert-danger";
                                    }


                                }
                            }
                        }


                }

            }
        }}}}
//register end

///login start

if (isset($_POST['login'])) {
    if (empty($_POST['username']) || empty($_POST['pwd'])) {
        $msg = "complete fields!";
        $msg_class = " alert-danger";
    }
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    $query = "select * from admin_user where username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows < 1) {
        $msg = "Username account does not exist!!";
        $msg_class = " alert-danger";
    } else {
        if ($result->num_rows == 1) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if (!password_verify($_POST['pwd'], $row['password'])) {
            $msg = "Cross-check your password!!";
            $msg_class = "alert-danger";
        }else  if (password_verify($_POST['pwd'], $row['password'])) {


            $_SESSION['adm_id'] = $row['id'];// Password matches, so create the sessions
            $_SESSION['adm_email'] = $row['email'];// Password matches, so create the sessions
            $_SESSION['adm_username'] = $row['username'];// Password matches, so create the sessions

            header("Location:../dashboard/index.php", true, 303);



        }else{
            $msg = "An error occured.!!";
            $msg_class = "alert-danger";
        }}}}