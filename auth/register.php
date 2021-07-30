<? include '../helpers/authhelper.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>

<? include '../public/authstyles.php';

?>


</head>

<body class="registerbg">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card card-header-tabs  rounded-md mt-2">
                            <div class="card-header"><h5 class="text-center font-weight-light my-4">Create Account</h5></div>
                            <div class="card-body">
                                <form method="post" action="">
                                    <div>
                                        <?php if (!empty($msg)): ?>
                                            <div class="alert <? echo $msg_class?> alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong><? echo $msg ?></strong>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputuserName">Username</label>
                                                <input class="form-control py-4" value="<?= isset($_POST['username']) ? $_POST['username'] : ''; ?>" id="inputuserName" name="username" type="text" placeholder="Enter username" />
                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>





                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword"  name="pwd" value="<?= isset($_POST['pwd']) ? $_POST['pwd'] : ''; ?>" type="password" placeholder="Enter password" />
                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                <input class="form-control py-4" id="inputConfirmPassword" name="cpwd" type="password" placeholder="Confirm password" />
                                            </div>


                                    <div class="form-group mt-4 mb-0"><button type="submit" name="register"  class="btn btn-primary btn-block">Create Account</button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>
<script src="../dist/js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="../dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../dist/js/scripts.js"></script>


</body>
</html>
