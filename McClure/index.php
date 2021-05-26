<?php //STYLE TO PULL
session_start();

//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require('Includes/check-login.php');
include('Includes/adminHeader.php');
require('db.php');
include('Includes/adminBody.php');
include('Controllers/ownerController.php');
if(isset($_GET['ClientID'])){
    $_SESSION['ClientID'] = $_GET['ClientID'];
}
if(isset($_GET['tab']) && !isset($_GET['ownerTab'])){
    if($_GET['tab'] == 'general'){
        include('Contacts/Client_Contacts/contactTab.php');
    }
    else if($_GET['tab'] == 'phones'){
        include('Contacts/Client_Contacts/phonesTab.php');
    }
    else if($_GET['tab'] == 'notes'){
        include('Notes/Client/notesTab.php');
    }
    else if($_GET['tab'] == 'relatives'){
        include('Relatives/relativesTab.php');
    }
    else if($_GET['tab'] == 'cases'){
        include('Cases/casesTab.php');
    }
    else if($_GET['tab'] == 'activities'){
        include('Activities/Client_Activities/clientActivitiesTab.php');
    }
    else if($_GET['ownerTab'] == 'clientActivity'){
        include('Activities/Client_Activities/add-Activity.php');
    }
    else if($_GET['tab'] == 'case_General_Tab'){
        include('Controllers/caseController.php');
    }
}
else if (!isset($_GET['ownerTab'])) {
        include("Includes/home_02.php");
}

include('Includes/adminFooter.php');
?>
<style>
    html, body{
        height: 100%;
    }
    body{
        display: flex;
        flex-direction: column;
    }
     .container-fluid{
         padding-left: 30px;
         padding-right: 30px;
     }
</style>
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

