<?php
session_start();
ini_set('display_errors', 1);
//check first and last name of spouse
$fName = $result[''];
$lName = $result[''];
$sFName = $result[''];
$sLName = $result[''];
//include('../../db.php');

$_SESSION['pClientID'] = $_GET['clientID'];

$sql = "SELECT `fName`, `lName`, `sFName`, `sLName` FROM purgatory WHERE clientID = '".$_SESSION['pClientID']."';";

$result = mysqli_query($cnxn, $sql);
$row = mysqli_fetch_array($result);
$fName = $row['fName'];
$lName = $row['lName'];
$sFName = $row['sFName'];
$sLName = $row['sLName'];

clientCheck($fName, $lName, $cnxn);
clientCheck($sFName, $sLName, $cnxn);

spouseCheck($fName, $lName, $cnxn);
spouseCheck($sFName, $sLName, $cnxn);

relativeCheck($fName, $lName, $cnxn);
relativeCheck($sFName, $sLName, $cnxn);

//*
//check if person exists within Clients
//if so, alert that client exists
function clientCheck($fName, $lName, $cnxn){
    $sql = "SELECT DISTINCT `fName`, `lName` FROM clients WHERE fName = '".$fName."' AND lName = '".$lName."';";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['fName']){
        echo "<script>alert('Client ".$fName.", ".$lName." already exists')</script>";
    }
}

function clientAlert($fName, $lName, $cnxn){
    $sql = "SELECT DISTINCT `fName`, `lName` FROM clients WHERE fName = '".$fName."' AND lName = '".$lName."';";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['fName']){
        return $fName . " " . $lName . " Exists as a Client";
    }
}

//check if client exists as a spouse
function spouseCheck($fName, $lName, $cnxn){
    $sql = "SELECT DISTINCT `fName`, `lName`, `sFName`, `sLName` FROM clients WHERE sFName = '".$fName."' AND sLName = '".$lName."';";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['sFName']){
        echo "<script>alert('Person ".$fName.", ".$lName." exists as a spouse of ".$row['fName'].", ".$row['lName']."')</script>";
    }
}

function spouseAlert($fName, $lName, $cnxn){
    $sql = "SELECT DISTINCT `fName`, `lName`, `sFName`, `sLName` FROM clients WHERE sFName = '".$fName."' AND sLName = '".$lName."';";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['sFName']){
        return "Exists as spouse of " . $row['fName'] . " " .  $row['lName'];
    }
}

//*
//check if person exists in relatives
//if so, take clientID and run query for name of client that the relative is tied to
function relativeCheck($fName, $lName, $cnxn){
    $sql = "SELECT DISTINCT `clientID`, `fName`, `lName` FROM relatives WHERE fName = '".$fName."' AND lName = '".$lName."';";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);

    if($row['fName']){
        $tempID = $row['clientID'];
        //relative exists, get client
        $sql = "SELECT `fName`, `lName` FROM clients WHERE clientID='".$tempID."';";
        $result = mysqli_query($cnxn, $sql);
        $row = mysqli_fetch_array($result);
        echo "<script>alert('Person ".$fName.", ".$lName." exists as relative of client ".$row['fName'].", ".$row['lName']."')</script>";
    }
}

function relativeAlert($fName, $lName, $cnxn){
    $sql = "SELECT DISTINCT `clientID`, `fName`, `lName` FROM relatives WHERE fName = '".$fName."' AND lName = '".$lName."';";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);

    if($row['fName']){
        $tempID = $row['clientID'];
        //relative exists, get client
        $sql = "SELECT `fName`, `lName` FROM clients WHERE clientID='".$tempID."';";
        $result = mysqli_query($cnxn, $sql);
        $row = mysqli_fetch_array($result);
        echo "Exists as relative of " . $row['fName']. " " . $row['lName'];
    }
}
