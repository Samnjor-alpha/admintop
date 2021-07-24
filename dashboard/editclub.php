<?php include '../sessions/session.php';
include '../helpers/editclub-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Club</title>
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
                    <li class="breadcrumb-item active">Manage Club</li>
                </ol>
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-4">
                            <div  id="s" class="card rounded-top mt-4">
                                <div class="card-header">
                                    <i class="fas fa-plus-circle mr-1"></i>
                                    Edit Club
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
                                            <label class="small mb-1" for="country">Country</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['region']) ? $_POST['region'] : $row_clubs['team_region']; ?>" id="country" name="region" type="text" placeholder="Country" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="Club">Club Name</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['clubname']) ? $_POST['clubname'] : $row_clubs['team_name']; ?>" id="Club" name="clubname" type="text" placeholder="Club Name" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="logo">Url logo</label>
                                            <input class="form-control py-2" value="<?= isset($_POST['logo']) ? $_POST['logo'] : $row_clubs['team_logo']; ?>" id="logo" name="logo" type="url" placeholder="Logo Url" />
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="aclub">About Club</label>
                                            <textarea class="form-control py-2"  id="aclub" name="clubdesc" type="text" placeholder="About Club"><?= isset($_POST['clubdesc']) ? $_POST['clubdesc'] : $row_clubs['abt_team']; ?></textarea>
                                        </div>

                                        <div class="form-group mt-4 mb-0"><button id="btnadd" type="submit" name="upd_club"  class="btn btn-primary btn-block">Update Club</button></div>


                                    </form>
                                </div>

                            </div>
                        </div>

                        <? if(mysqli_num_rows($teams)>0){ ?>
                            <div class="col-lg-8">
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <i class="fal fa-trophy-alt mr-4"></i>
                                        Clubs
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Icon</th>
                                                    <th>Region</th>
                                                    <th>Club</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>

                                                <tbody>
                                                <? while ($rowteam=$teams->fetch_assoc()){?>
                                                <tr>
                                                    <td class="text-center"><img src="<? echo $rowteam['team_logo']?>" style="border-radius:50%;height: 50px; width:50px;" class="img-thumbnail" alt="logo"></td>
                                                    <td><? echo $rowteam['team_region']?></td>
                                                    <td><? echo $rowteam['team_name']?></td>
                                                    <td><a href="editclub.php?clubid=<? echo $rowteam['team_id']?>"><i class="text-success fal fa-edit"></i></a>| <a href="../helpers/deleteclub.php?clubid=<? echo $rowteam['team_id']?>"><i class="text-danger fal fa-trash"></i></a></td>
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
                '<i class="fal fa-project-diagram"></i> Adding Club....'
            );
        });
    });
</script>
</body>
</html>
