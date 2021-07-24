<?php include '../sessions/session.php';
include '../helpers/addhtmarket-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add HT Markets</title>
    <? include'../public/dashboardstyles.php' ?>
</head>
<body class="sb-nav-fixed">
<? include '../navs/topbar.php' ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <? include '../navs/sidebar.php' ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">


                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-3">
                            <? include '../navs/marketsmenu.php'?>
                        </div>
                        <div class="col-lg-3">
                            <div  id="s" class="card rounded-top mt-4">
                                <div class="card-header">
                                    <i class="fas fa-plus-circle mr-1"></i>
                                    Add HT Market
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
                                            <label class="small mb-1" for="country">Market category</label>
                                            <select id="country" name="mrkt_categ" class="form-control" required>
                                                <option value="" disabled selected>Choose Market category</option>
                                                <?php while ($mrkt_row = $mrkts_categs->fetch_assoc()) {?>
                                                    <option value="<?php echo $mrkt_row['mrkt_id'] ?>" ><?php  echo $mrkt_row['mrkt_name']?></option>
                                                <? }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="mrkt">Market Name</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['mrkt']) ? $_POST['mrkt'] : ''; ?>" id="mrkt" name="mrkt" type="text" placeholder="Draw,Over 1.5, Home team win" />
                                        </div>
 


                                        <div class="form-group">
                                            <label class="small mb-1" for="amrkt">About Market</label>
                                            <textarea class="form-control py-2"  id="amrkt" name="mrktdesc" type="text" placeholder="About Market"><?= isset($_POST['mrktdesc']) ? $_POST['mrktdesc'] : ''; ?></textarea>
                                        </div>

                                        <div class="form-group mt-4 mb-0"><button id="btnadd" type="submit" name="addhtmrkt"  class="btn btn-primary btn-block">Add Market</button></div>


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
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnadd").click(function() {
// disable button
            $(this).prop("", true);
// add spinner to button
            $(this).html(
                '<i class="fad fa-bookmark"></i> Adding Market....'
            );
        });
    });
</script>
</body>
</html>
