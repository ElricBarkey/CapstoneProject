<?php
require('check-login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <link rel="stylesheet" href="bootstrap/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/vendor/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/vendor/bootstrap/css/bootstrap-reboot.css">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body onload="hide()">

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Start Bootstrap </div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Add/Edit Contact/Case</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Review/Edit Case</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Add New Slip for Case</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid" id="tableTest">
            <div>
                <button onclick="hideTables('#g')">General</button>|
                <button onclick="hideTables('#p')">phones</button>|
                <button onclick="hideTables('#n')">Notes</button>|
                <button onclick="hideTables('#r')">Relatives</button>|
                <button onclick="hideTables('#c')">Cases</button>|
                <button onclick="hideTables('#a')">Activities List</button>|
            </div>
            <table onclick="hideTables()">
                <?php
                    include('requires/contactTab.php');
                ?>
            </table>
            <table onclick="hideTables()">
                <?php
                    include('requires/phonesTab.php');
                ?>
            </table>
            <table onclick="hideTables()">
                <?php
                    include('requires/notesTab.php');
                ?>
            </table>
            <table onclick="hideTables()">
                <?php
                    include('requires/relativesTab.php');
                ?>
            </table>
            <table onclick="hideTables()">
                <?php
                    include('requires/next sprint/caseGeneralTab.php');
                ?>
            </table>
            <table onclick="hideTables()">
                <?php
                    include('requires/activitiesTab.php');
                ?>
            </table>


    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="bootstrap/vendor/jquery/jquery.js"></script>
<script src="bootstrap/vendor/jquery/jquery.slim.js"></script>
<script src="bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="requires/script.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>