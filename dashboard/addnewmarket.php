<?php include '../sessions/session.php';
include '../helpers/addnewmarket-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Markets</title>
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
                                    Add Market Category
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
                                            <label class="small mb-1" for="mrkt">Market Name</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['mrkt']) ? $_POST['mrkt'] : ''; ?>" id="mrkt" name="mrkt" type="text" placeholder="1X2,OVER1.5, GG/NG" />
                                        </div>



                                        <div class="form-group">
                                            <label class="small mb-1" for="amrkt">About Market</label>
                                            <textarea class="form-control py-2"  id="amrkt" name="mrktdesc" type="text" placeholder="About Market"><?= isset($_POST['mrktdesc']) ? $_POST['mrktdesc'] : ''; ?></textarea>
                                        </div>

                                        <div class="form-group mt-4 mb-0"><button id="btnadd" type="submit" name="addmrkt"  class="btn btn-primary btn-block">Add Market</button></div>


                                    </form>
                                </div>

                            </div>
                        </div>
                        <? if(mysqli_num_rows($markets)>0){ ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fad fa-bookmark mr-4"></i>
                                        Markets Categories
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr>
                                                    <th class="text-nowrap">Market Category</th>
                                                    <th class="text-nowrap">Total Markets</th>


                                                </tr>
                                                </thead>

                                                <tbody class="text-nowrap">
                                                <? while ($row_mrkt=$markets->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?
                                                        echo $row_mrkt['mrkt_name']?></td>
                                                    <td><?
                                                        echo $row_mrkt['mrkt_count']
                                                        ?></td>

                                                </tr>

                                                </tbody>
                                                <? }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? }?>
                        <? if(mysqli_num_rows($htmarkets)>0){ ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fad fa-clock mr-4"></i>
                                        HT Markets
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr>
                                                    <th class="text-nowrap">Market Category</th>
                                                    <th class="text-nowrap">Market Name</th>


                                                </tr>
                                                </thead>

                                                <tbody class="text-nowrap">
                                                <? while ($row_htmrkt=$htmarkets->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?
                                                        echo getmarketcategById($row_htmrkt['mrktcateg_id'])
                                                        ?></td>
                                                    <td><?
                                                        echo $row_htmrkt['mrkt_name']?></td>

                                                </tr>

                                                </tbody>
                                                <? }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? }?>

                        <? if(mysqli_num_rows($ftmarkets)>0){ ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fad fa-stopwatch mr-4"></i>
                                        FT Markets
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr>
                                                    <th class="text-nowrap">Market Category</th>
                                                    <th class="text-nowrap">Market Name</th>


                                                </tr>
                                                </thead>

                                                <tbody class="text-nowrap">
                                                <? while ($row_ftmrkt=$ftmarkets->fetch_assoc()){
                                                ?>
                                                <tr>
                                                    <td><?
                                                        echo getmarketcategById($row_ftmrkt['mrktcateg_id'])
                                                        ?></td>
                                                    <td><?
                                                        echo $row_ftmrkt['mrkt_name']?></td>


                                                </tr>

                                                </tbody>
                                                <? }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? }?>

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
