<?php include '../sessions/session.php';
include '../helpers/addfixture-helper.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Fixture</title>
    <? include'../public/dashboardstyles.php' ?>

    <link href="../dist/css/select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
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
                    <li class="breadcrumb-item active">Add Fixture</li>
                </ol>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div  id="s" class="card rounded-top mt-4">
                                <div class="card-header">
                                    <i class="fas fa-plus-circle mr-1"></i>
                                    Add New Fixture
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
                                                <label class="small mb-1" for="country">Competition</label>
                                                <select id="country" name="compname" class="form-control selectpicker" data-live-search="true">
                                                    <option value="" disabled selected>Choose Competition</option>
                                                    <?php while ($comp_row = $competitions->fetch_assoc()) {?>
                                                    <option value="<?php echo $comp_row['comp_id'] ?>"><?php  echo $comp_row['comp_name']?></option>
                                                    <? }?>
                                                </select>
                                            </div>
                                        <div class="row">
                                        <div class="col-md-6 col-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="country">Home Team</label>
                                                <select id="country" name="hteam" class="form-control selectpicker" data-live-search="true">
                                                    <option value="" disabled selected>Choose Home Team</option>
                                                    <?php while ($team_row = $teams->fetch_assoc()) {?>
                                                        <option value="<?php echo $team_row['team_id'] ?>" ><?php  echo $team_row['team_name']?></option>
                                                    <? }?>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="country">Away Team</label>
                                                    <select id="country" name="ateam" class="form-control selectpicker" data-live-search="true">
                                                        <option value="" disabled selected>Choose Away Team</option>
                                                        <?php while ($team_row = $teamsa->fetch_assoc()) {?>
                                                            <option value="<?php echo $team_row['team_id'] ?>" ><?php  echo $team_row['team_name']?></option>
                                                        <? }?>
                                                    </select>
                                                </div>

                                        </div>
                                        </div>
                                        <div class="row">
<div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="kickoff">Kick off</label>
                                            <input type='text' class="form-control" name="kickoff" id='kickoff'>
                                        </div>
</div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="venue">Venue</label>
                                                        <input type="text" name="venue" class="form-control" id="venue">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="article">About the Fixture</label>
                                            <textarea class="form-control py-2"  id="article" name="fixdesc" type="text" placeholder="About fixture"><?= isset($_POST['fixdesc']) ? $_POST['fixdesc'] : ''; ?></textarea>
                                        </div>

                                        <div class="form-group mt-4 mb-0"><button id="btnadd" type="submit" name="addfix"  class="btn btn-primary btn-block">Add Fixture</button></div>


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
<script src="../dist/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="../dist/js/bootstrap-datetimepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#btnadd").click(function() {
// disable button
            $(this).prop("", true);
// add spinner to button
            $(this).html(
                '<i class="fas fa-futbol"></i> Adding Fixture....'
            );
        });
    });

</script>



</body>
</html>
