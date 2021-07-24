<?php include '../sessions/session.php';
include '../helpers/managemarkets-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Markets</title>
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


                        <? if(mysqli_num_rows($markets)>0){ ?>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card  mt-4">
                                    <div class="card-header ">
                                        <i class="fad fa-bookmark mr-4"></i>
                                        Main Markets
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  >
                                                <thead>
                                                <tr>
                                                    <th class="text-nowrap">Market Category</th>
                                                    <th class="text-nowrap">Total Markets</th>

                                                    <th>Actions</th>
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
                                                    <td><a href="editmarketcategories.php?categ=<? echo $row_mrkt['mrkt_id']?>"><i class="text-success fal fa-edit"></i></a>| <a href="../helpers/deletemarketcategory.php?categid=<? echo $row_mrkt['mrkt_id']?>"><i class="text-danger fal fa-trash"></i></a></td>
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

                                                    <th>Actions</th>
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

                                                    <td><a href="edithtmarketcategories.php?categ=<? echo $row_htmrkt['mrkt_id']?>"><i class="text-success fal fa-edit"></i></a>| <a href="../helpers/deletehtmarketcategory.php?categid=<? echo $row_htmrkt['mrkt_id']?>"><i class="text-danger fal fa-trash"></i></a></td>
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

                                                    <th>Actions</th>
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

                                                    <td><a href="editftmarketcategories.php?categ=<? echo $row_ftmrkt['mrkt_id']?>"><i class="text-success fal fa-edit"></i></a>| <a href="../helpers/deleteftmarketcategory.php?categid=<? echo $row_ftmrkt['mrkt_id']?>"><i class="text-danger fal fa-trash"></i></a></td>
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
