<?php include '../sessions/session.php';
include '../helpers/addcompetition-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Competition</title>
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

                <ol class="breadcrumb mt-4 mb-4">
                    <li class="breadcrumb-item active">Add Competition</li>
                </ol>
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-4">
                            <div  id="s" class="card rounded-top mt-4">
                                <div class="card-header">
                                    <i class="fas fa-plus-circle mr-1"></i>
                                   Add New Competititon
                                </div>
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
                                            <label class="small mb-1" for="country">Country/Region</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['region']) ? $_POST['region'] : ''; ?>" id="country" name="region" type="text" placeholder="Country/Region" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="competition">Competition Name</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['compname']) ? $_POST['compname'] : ''; ?>" id="competition" name="compname" type="text" placeholder="Competition Name" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="logo">Url logo</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['logo']) ? $_POST['logo'] : ''; ?>" id="logo" name="logo" type="url" placeholder="Logo Url" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="acompetition">About Competition</label>
                                            <textarea class="form-control py-2"  id="acompetition" name="compdesc" type="text" placeholder="About competition"><?= isset($_POST['compdesc']) ? $_POST['compdesc'] : ''; ?></textarea>
                                        </div>

                                        <div class="form-group mt-4 mb-0"><button id="btnadd" type="submit" name="addcomp"  class="btn btn-primary btn-block">Add Competition</button></div>


                                    </form>
                                </div>

                            </div>
                        </div>

                        <? if(mysqli_num_rows($competitions)>0){ ?>
                        <div class="col-lg-8">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <i class="fal fa-trophy-alt mr-4"></i>
                                   Competitions
                                </div>
                                <div class="card-body">
                                    <form class="form-inline form-group" method="post" action="">
                                        <div class="frm-group">
                                            <label for="comp"></label><select name="region" class="form-control" id="comp">
                                                <option disabled selected>Filter by country</option>
                                                <? while ($rowcountry=$countries->fetch_assoc()){ ?>
                                                    <option value="<? echo $rowcountry['team_region'] ?>"><? echo $rowcountry['team_region'] ?></option>
                                                <? } ?>
                                            </select>
                                        </div>

                                        <div class="frm-group ml-2 mr-2">
                                            <button type="submit" name="filter" class="btn btn-info btn-block">Filter</button>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered"  >
                                            <thead>
                                            <tr>
                                                <th>Icon</th>
                                                <th>Region</th>
                                                <th>Competition</th>
                                                <th>Fixtures</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <? while ($rowcomp=$competitions->fetch_assoc()){?>
                                            <tr>
                                                <td><img src="<? echo $rowcomp['comp_logo']?>" style="border-radius:50%;height: 40px"  alt="logo"></td>
                                            <td><? echo $rowcomp['comp_region']?></td>
                                                <td><? echo $rowcomp['comp_name']?></td>
                                                <td><? echo $rowcomp['comp_fixtures_no'] ?></td>
                                            </tr>

                                            </tbody>
                                            <? }?>
                                        </table>
                                    </div>
                                    <?php if ($total_no_of_pages>0){ ?>
                                        <div class="">

                                            <div class="justify-content-center" style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                                                <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <? include 'pagination.php'?>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                        </div>
                                    <?}?>
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
                '<i class="fal fa-trophy-alt"></i> Adding Tournament....'
            );
        });
    });
</script>
</body>
</html>
