<?php
session_start();
require('../check-login.php');
include('../adminHeader.php');
require('../../db.php');
include('../searchBar.php');
include('../adminBody.php');

include('caseHeader.php');
if($_GET['caseTab'] == 'general'){
    include('caseGeneralTab.php');
}
else if($_GET['caseTab'] == 'notes'){
    include('caseNotes.php');
}
else if($_GET['caseTab'] == 'slips'){
    include('caseSlips.php');
}
else if($_GET['caseTab'] == 'escrow'){
    include('caseEscrow.php');
}
else if($_GET['caseTab'] == 'keyDates'){
    include('caseKeyDates.php');
}
else if($_GET['caseTab'] == 'activities'){
    include('caseActivities.php');
}
else if($_GET['caseTab'] == 'contacts'){
    include('caseContacts.php');
}
else if($_GET['caseTab'] == 'winWord'){
    include('caseWinWord.php');
}