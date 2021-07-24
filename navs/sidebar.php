<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<? echo BASE_URL?>/dashboard/">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard</a>
            <div class="sb-sidenav-menu-heading">Competitions</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
            ><div class="sb-nav-link-icon"><i class="fal fa-trophy-alt"></i></div>Add Competitions
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/addcompetition.php">Add New Competition</a>
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/managecompetitions.php">Manage Competitions</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutss"
               aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fal fa-analytics"></i></div>Competition stats
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="collapseLayoutss" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">View stats</a>

                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Football clubs</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#clubs" aria-expanded="false" aria-controls="collapseLayouts"
            ><div class="sb-nav-link-icon"><i class="fal fa-project-diagram"></i></div>Add Clubs
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="clubs" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/addclub.php">Add New Club</a>
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/manageclub.php">View Clubs</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageclubs"
               aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fal fa-cogs"></i></div>Manage Clubs
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="manageclubs" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">View stats</a>

                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Matches to be tipped</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsm" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-futbol"></i></div>
 Games
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
            <div class="collapse" id="collapseLayoutsm" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/addfixture.php">Add Fixture</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link"  href="<? echo BASE_URL?>/dashboard/viewfixtures.php">View fixtures</a></nav>

            </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutssm"
               aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fal fa-cogs"></i></div>
                Manage Fixtures
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutssm" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/updatescores.php">Update Scores</a>
                </nav>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/previousfixtures.php">Settled Fixtures</a>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Popular Markets </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsmarket" aria-expanded="false" aria-controls="collapseLayouts"
            ><div class="sb-nav-link-icon"><i class="fad fa-bookmark"></i></div>Add Betting Markets
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="collapseLayoutsmarket" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/addnewmarket.php">Add New Market</a>
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/managemarket.php">Manage Markets</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutpmrkts"
               aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fal fa-analytics"></i></div>Popular Market stats
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="collapseLayoutpmrkts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="<? echo BASE_URL?>/dashboard/marketstats.php">View stats</a>

                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Users & Tipstars</div>
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsuser" aria-expanded="false" aria-controls="collapseLayoutsuser">
                <div class="sb-nav-link-icon"><i class="fal fa-users-crown"></i></div>Users

                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
            <div class="collapse" id="collapseLayoutsuser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="">View Users</a>
                    <a class="nav-link" href="">View Tipsters</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="text-left">Logged in as:</div>
        <?php echo $_SESSION['adm_username']; ?>
        <div class="text-left ml-sm-auto   d-sm-inline-block d-md-none d-lg-none d-xl-none ml-sm-0 ml-lg-0 ml-xl-0 ml-md-0"><a class="btn btn-block btn-outline-danger" href="<? echo BASE_URL?>/sessions/logout.php">Logout</a> </div>
    </div>
</nav>