<?php

require('db.php');

//Turn on error reporting
ini_set('display_errors', 1);
//error_reporting(E_ALL);
/*
//check if information was edited
if($_POST['confirmBox'] == 'on'){
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    var_dump($_POST);

    $sql = "UPDATE `clients` SET `clientID`=[value-1],`clientNumber`=[value-2],`cLName`=[value-3],`cFName`=[value-4],
        `MI`=[value-5],`Preferred`=[value-6],`Salutation`=[value-7],`address1`=[value-8],`city`=[value-9],`cState`=[value-10],
        `zip`=[value-11],`DOB`=[value-12],`SSN`=[value-13],`DOD`=[value-14],`phoneNum`=[value-15],`contact`=[value-16],
        `contactTitle`=[value-17],`Referral`=[value-18],`married`=[value-19],`cCurrent`=[value-20],`cSLName`=[value-21],
        `cSFName`=[value-22],`cSMI`=[value-23],`address2`=[value-24],`sCity`=[value-25],`cSState`=[value-26],`sZip`=[value-27],
        `DOB2`=[value-28],`SSN2`=[value-29],`DOD2`=[value-30],`sPhoneNum`=[value-31],`message`=[value-32],
        `legalService`=[value-33],`comments`=[value-34] WHERE 1"

}
*/
//var_dump($_POST);
//Define a query
$sql = "SELECT * FROM clients";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

foreach ($result as $row) {
    $fName = $row['cFName'];
    $mName = $row['MI'];
    $lName = $row['cLName'];
    $street = $row['address1'];
    $city = $row['city'];
    $zip = $row['zip'];
    $state = $row['cState'];
    $ssn = $row['SSN'];
    $dob = $row['DOB'];
    $dod = $row['DOD'];
    $referred = $row['Referral'];
    $contactName = $row['cSFName']." ".$row['cSLName'];
    $contactTitle = $row['contactTitle'];
    $contactNumber = $row['phoneNum'];
}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
        <!-- Contact Information -->
        <fieldset id="#g" class="form-group"><!-- gets first name, last name, and email -->
            <legend>General Information</legend>
            <?php
                echo "<div style='' class='row'>
                         <div class='col-sm-4'>
                            <label for='firstName'>First Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"$fName\" name=\"$fName\" value=\"$fName\">
                         </div>
                         <div class='col-sm-4'>
                            <label for='middleName'>Middle Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"$mName\" name=\"$mName\" value=\"$mName\">
                         </div>
                         <div class='col-sm-4'>
                            <label for='lastName'>Last Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"$lName\" name=\"$lName\" value=\"$lName\">
                         </div>
                      </div>
                      
                      <div style='' class='row'>
                         <div class='col-sm-3'>
                            <label for='street'>Street</label>
                            <input type=\"text\" class=\"form-control\" id=\"$street\" name=\"$street\" value=\"$street\">
                         </div>
                         <div class='col-sm-3'>
                            <label for='city'>City</label>
                            <input type=\"text\" class=\"form-control\" id=\"$city\" name=\"$city\" value=\"$city\">
                         </div>
                         <div class='col-sm-3'>
                            <label for='zip'>Zip</label>
                            <input type=\"text\" class=\"form-control\" id=\"$zip\" name=\"$zip\" value=\"$zip\">
                         </div>
                         <div class='col-sm-3'>
                            <label for='state'>State</label>
                            <input type=\"text\" class=\"form-control\" id=\"$state\" name=\"$state\" value=\"$state\">
                         </div>
                      </div>
                      
                      <div style='' class='row'>
                         <div class='col-sm-4'>
                            <label for='ssn'>SSN</label>
                            <input type=\"text\" class=\"form-control\" id=\"$ssn\" name=\"$ssn\" value=\"$ssn\">
                         </div>
                         <div class='col-sm-4'>
                            <label for='dob'>Date of Birth</label>
                            <input type=\"text\" class=\"form-control\" id=\"$dob\" name=\"$dob\" value=\"$dob\">
                         </div>
                         <div class='col-sm-4'>
                            <label for='dod'>Date of Death</label>
                            <input type=\"text\" class=\"form-control\" id=\"$dod\" name=\"$dod\" value=\"$dod\">
                         </div>
                      </div>
                      
                      <div style='' class='row'>
                         <div class='col-sm-6'>
                            <label for='referred'>Referred</label>
                            <input type=\"text\" class=\"form-control\" id=\"$referred\" name=\"$referred\" value=\"$referred\">
                         </div>
                         <div class='col-sm-6'>
                            <label for='conctactName'>Contact Name</label>
                            <input type=\"text\" class=\"form-control\" id=\"$contactName\" name=\"$contactName\" value=\"$contactName\">
                         </div>
                      </div>
                      
                      <div style='' class='row'>
                         <div class='col-sm-6'>
                            <label for='firstName'>Contact Title</label>
                            <input type=\"text\" class=\"form-control\" id=\"$contactTitle\" name=\"$contactTitle\" value=\"$contactTitle\">
                         </div>
                         <div class='col-sm-6'>
                            <label for='firstName'>Contact Number</label>
                            <input type=\"text\" class=\"form-control\" id=\"$contactNumber\" name=\"$contactNumber\" value=\"$contactNumber\">
                         </div>
                      </div>
                      
                      <div style='' class='row'>
                         <div class='col-sm-4'>
                            <label for='firstName'>set appointement</label>
                            <input type=\"text\" class=\"form-control\" id=\"aptStart\" name=\"aptStart\">
                         </div>
                         <div class='col-sm-4'>
                            <label for='firstName'>End Appointment</label>
                            <input type=\"text\" class=\"form-control\" id=\"aptEnd\" name=\"aptEnd\">
                         </div>
                         <div class='col-sm-4'>
                            <label for='firstName'>Subject</label>
                            <input type=\"text\" class=\"form-control\" id=\"subject\" name=\"subject\">
                         </div>
                      </div>";
            ?>
            <label>Confirm changes?</label>
            <input type="checkbox" name="confirmBox" id="confirmBox">
            <br>
            <button type="submit">Save</button>
</form>
    </fieldset>


