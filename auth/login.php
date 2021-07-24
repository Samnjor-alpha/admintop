<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>login</title>

    <? include '../public/authstyles.php';

    ?>


</head>

<? include '../helpers/authhelper.php' ?>
<body class="loginbg">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row float-lg-right">
                    <div class="col-12">
                        <div  id="s" class="card text-white opacity-4 bg-dark rounded-top mt-4">
                            <div class="card-header"><h5 class="text-center  font-weight-light my-4">Login </h5></div>
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
                                        <label class="small mb-1" for="pwd">Password</label>
                                        <input  type="password" class="form-control py-4" id="pwd" name="pwd"
                                               placeholder="Enter password"
                                               value="<?= isset($_POST['pwd']) ? $_POST['pwd'] : ''; ?>"/>
                                    </div>
                                    <div class="form-group mt-4 mb-0"><button id="btnFetch" type="submit" name="login"  class="btn btn-primary btn-block">Sign in</button></div>


                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnFetch").click(function() {
// disable button
            $(this).prop("", true);
// add spinner to button
            $(this).html(
                '<i class="fas fa-lock"></i> Logging in...'
            );
        });
    });
</script>

</body>
</html>
