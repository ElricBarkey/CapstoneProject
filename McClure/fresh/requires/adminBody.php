<body>


    <!-- Sidebar -->
    <!--
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Add/Edit Contact/Case</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Review/Edit Case</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Add New Slip for Case</a>
        </div>
    </div>
    -->
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!--
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
        -->
        <?php
            echo "
                <div class=\"container-fluid\" id=\"tableTest\">
                    <div>
                        <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=general'>ClientGeneral</a>|
                        <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=phones'>phones</a>|
                        <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=notes'>Notes</a>|
                        <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=relatives'>Relatives</a>|
                        <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=cases'>Cases</a>|
                        <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=activities'>Activities List</a>|
        
                        <br>
                        <hr>
                        <h1 style='text-transform: uppercase'><strong>". $_GET['tab'] ."</strong></h1>
                    </div>
                </div>
            ";


            function reload($page){
                $SESSION['page'] = $page;
                //echo "test";
                header("Refresh:0", "False", "http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/admin.php");
            }
        ?>
        <?php include("clientSearchBar.php") ?>
    </div>
</body>