<?php include '../sessions/session.php';
include '../helpers/bloghelper.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog</title>
    <? include'../public/dashboardstyles.php' ?>
</head>
<body class="sb-nav-fixed">
<? include '../navs/blogtopbar.php' ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <? include '../navs/sidebar.php' ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">


                <div class="container">
                    <div class="row justify-content-center">



                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fad fa-bookmark mr-4"></i>
                                        Add new article
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div>
                                                <?php if (!empty($msg)): ?>
                                                    <div class="small alert <? echo $msg_class?> alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <strong><? echo $msg ?></strong>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="title">Article Title</label>
                                                <input class="form-control py-2" value="<?= isset($_POST['title']) ? $_POST['title'] : ''; ?>" id="title" name="title" type="text" placeholder="Article Title" />
                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="urlimg">Article img</label>
                                                <input  class="form-control py-2" value="<?= isset($_POST['urlimg']) ? $_POST['urlimg'] : ''; ?>" id="urlimg" name="urlimg" type="url" placeholder="img url" />
                                            </div>


                                            <div class="form-group">
                                                <label class="small mb-1" for="excerpt">Excerpt</label>
                                                <textarea class="form-control py-2"  id="excerpt" name="excerpt" type="text" maxlength="263" placeholder="excerpt"><?= isset($_POST['excerpt']) ? $_POST['excerpt'] : ''; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="article">Article</label>
                                                <textarea class="form-control py-2"  id="article" name="article" type="text" maxlength="263" placeholder="article"><?= isset($_POST['article']) ? $_POST['article'] : ''; ?></textarea>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button id="btnadd" type="submit" name="addarticle"  class="btn btn-primary btn-block">Add Article</button></div>


                                        </form>
                                    </div>
                                </div>
                            </div>




                    </div>
                </div>
            </div>
        </main>
        <?php require_once '../navs/footer.php' ?>
    </div>
</div>
<? include '../public/dashboardscripts.php' ?>
</body>
</html>
