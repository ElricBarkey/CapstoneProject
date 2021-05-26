<?php // WINWORD
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../Includes/check-login.php');
include('../Includes/adminHeader.php');
require('../db.php');
include('../Includes/adminBody.php');

include('../Includes/caseHeader.php');

if(isset($_GET['caseID'])){
    $_SESSION['caseID'] = $_GET['caseID'];
}
if($_GET['caseTab'] == 'general'){
    include('../Includes/caseGeneralTab.php');
}
else if($_GET['caseTab'] == 'notes'){
    include('../Notes/Case/caseNotes.php');
}
else if($_GET['caseTab'] == 'slips'){
    include('../Slips/caseSlips.php');
}
else if($_GET['caseTab'] == 'escrow'){
    include('../Escrow/Case_Escrow/caseEscrow.php');
}
else if($_GET['caseTab'] == 'keyDates'){
    include('../Key_Date/caseKeyDates.php');
}
else if($_GET['caseTab'] == 'activities'){
    include('../Activities/Case_Activities/caseActivities.php');
}
else if($_GET['caseTab'] == 'contacts'){
    include('../Contacts/Case_Contacts/caseContacts.php');
}
else if($_GET['caseTab'] == 'winWord'){
    //include('caseWinWord.php');
}

include('../Includes/adminFooter.php');
?>
<style>
    .container-fluid{
    }
</style>
