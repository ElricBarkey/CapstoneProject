<?php
session_start();
require('requires/check-login.php');
include('requires/adminHeader.php');
require('db.php');
//include('requires/searchBar.php');
include('requires/adminBody.php');
//include('requires/OwnerTabs/ownerController.php');
echo "<br><br><br><br><br><br>";

if($_GET['tab'] == 'general'){
    //echo ('test');
    include('requires/contactTab.php');
}
else if($_GET['tab'] == 'phones'){
    include('requires/phonesTab.php');
}
else if($_GET['tab'] == 'notes'){
    include('requires/notesTab.php');
}
else if($_GET['tab'] == 'relatives'){
    include('requires/relativesTab.php');
}
else if($_GET['tab'] == 'cases'){
    include('requires/casesTab.php');
}
else if($_GET['tab'] == 'activities'){
    include('requires/activitiesTab.php');
}
else if($_GET['ownerTab'] == 'clientActivity'){
    include('requires/add-Activity.php');
}
else if($_GET['tab'] == 'caseGeneralTab'){
    include('requires/caseTabs/caseController.php');
}
else {
    include("requires/home_02.php");
}
include('requires/adminFooter.php');

?>

