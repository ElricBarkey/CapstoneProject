<body> <!--STYLES AND SCRIPTS TO PULL-->
    <div id="nav">
        <?php
            if(isset($_GET['tab'])){
                $tab = $_GET['tab'];
            } elseif (isset($_GET['caseTab'])){
                $tab = "Case " . $_GET['caseTab'];
            } elseif (isset($_GET['ownerTab'])){
                $tab = $_GET['ownerTab'] . " DATA";
            } else {$tab = "HOME";}
            echo "
                <div class=\"container-fluid\" id=\"tableTest\">
                    <div id='myDIV'>
                        <a id='home' href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php'><button>Home</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=general'><button>ClientGeneral</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=phones'><button>phones</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=notes'><button>Notes</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=relatives'><button>Relatives</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=cases'><button>Cases</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=activities'><button>Activities List</button></a>|
                        <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/logout.php'><button>Logout</button></a>
                         <div class='dropdown'>
                            <button onclick='myFunction()' class='dropbtn'>Add Data</button>
                            <div id='myDropdown' class='dropdown-content'>
                                <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=action'>actions</a>
                                <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=attorneys'>attornies</a>
                                <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=category'>categories</a>
                                <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=subCategory'>subCategories</a>
                            </div>
                         </div> 
                        <br>
                        <hr>
                        <h1 style='text-transform: uppercase'><strong>". $tab ."</strong></h1>
                    </div>
                </div>
            ";

            function reload($page){
                $SESSION['page'] = $page;
                header("Refresh:0", "False", "https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/admin.php");
            }
        ?>
    </div>
</body>
<script>
    // Get the container element
    var btnContainer = document.getElementById("myDIV");

    // Get all buttons with class="btn" inside the container
    var btns = btnContainer.getElementsByClassName("btn");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
<style>
    button:active{
        background-color: darkgray;
    }

    #nav{
        text-align: center;
    }
    a{
        margin-left: 10px;
        margin-right: 10px;
    }


    /* Dropdown Button */
    .dropbtn {
        background-color: #1b1e21;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover, .dropbtn:focus {
        background-color: #2980B9;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #ddd}

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}
</style>
<script>
    /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>