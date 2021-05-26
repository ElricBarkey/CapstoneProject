<?php // HTML TO REFACTOR || STYLE TO PULL
//check if information was edited
if(isset($_POST['confirmBox']) == 'on'){

    $sql = "UPDATE `clients` SET `lName`='".$_POST['lName']."',`fName`='".$_POST['fName']."',`mName`='".$_POST['mName']."',
    `address1`='".$_POST['street']."',`city`='".$_POST['city']."',`cState`='".$_POST['state']."',`zip`='".$_POST['zip']."',`DOB`='".$_POST['dob']."',`DOD`='".$_POST['dod']."',
    `clientNumber`='".$_POST['contactNumber']."',`contactTitle`='".$_POST['contactTitle']."',`Referral`='".$_POST['referred']."',`sLName`='".$_POST['contactLName']."',
    `sFName`='".$_POST['contactFName']."',`sMName`='".$_POST['contactMName']."', `comments`='".$_POST['aptStart']."'
    WHERE `ClientID`='".$_SESSION['ClientID']."';";

    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}

if(isset($_POST['createNew']) == 'on'){

    $sql = "INSERT INTO `clients` (`lName`, `fName`, `mName`, `address1`, `city`, `cState`, `zip`, `DOB`, `DOD`, `clientNumber`,
    `contactTitle`, `Referral`, `sLName`, `sMName`, `sFName`, `contactName`, `phoneNum`) VALUES ('".$_POST['lName']."', '".$_POST['fName']."',
     '".$_POST['mName']."','".$_POST['street']."', '".$_POST['city']."', '".$_POST['state']."', '".$_POST['zip']."',
      '".$_POST['dob']."', '".$_POST['dod']."', '".$_POST['contactNumber']."', '".$_POST['contactTitle']."', '".$_POST['referred']."',
       '".$_POST['contactLName']."', '".$_POST['contactMName']."', '".$_POST['contactFName']."', '".$_POST['phoneNum']."', '".$_POST['contactName']."');";

    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}

if(isset($_POST['delete']) == 'on'){

    $sql = "DELETE FROM `clients` WHERE ClientID = '".$_SESSION['ClientID']."';";

    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}
$sql = "SELECT * FROM clients WHERE `clientID`='".$_SESSION['ClientID']."';";
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

    foreach ($result as $row) {
        $fName = $row['fName'];
        $mName = $row['mName'];
        $lName = $row['lName'];
        $number = $row['clientNumber'];
        $street = $row['address1'];
        $city = $row['city'];
        $zip = $row['zip'];
        $state = $row['cState'];
        $dob = $row['DOB'];
        $dod = $row['DOD'];
        $referred = $row['Referral'];
        $contactFName = $row['sFName'];
        $contactMName = $row['sMName'];
        $contactLName = $row['sLName'];
        $contactTitle = $row['contactTitle'];
        $contactNumber = $row['phoneNum'];
        $contactName = $row['contactName'];
    }
?>
<div class="container-fluid">
    <form id="form" method="post" action="#">
            <fieldset id="#g" class="form-group">
                <legend>General Information</legend>
                <?php
                    echo "<div style='' class='row'>
                             <div class='col-sm-4'>
                                <label for='firstName'>First Name</label>
                                <input type='text' class='form-control' id='fName' name='fName' value='".$fName."'>
                             </div>
                             <div class='col-sm-4'>
                                <label for='middleName'>Middle Name</label>
                                <input type=\"text\" class=\"form-control\" id='mName' name='mName' value='".$mName."'>
                             </div>
                             <div class='col-sm-4'>
                                <label for='lastName'>Last Name</label>
                                <input type=\"text\" class=\"form-control\" id='lName' name='lName' value='".$lName."'>
                             </div>
                          </div>
                          
                          <div style='' class='row'>
                             <div class='col-sm-3'>
                                <label for='street'>Street</label>
                                <input type=\"text\" class=\"form-control\" id='street' name='street' value='".$street."'>
                             </div>
                             <div class='col-sm-3'>
                                <label for='city'>City</label>
                                <input type=\"text\" class=\"form-control\" id='city' name='city' value='".$city."'>
                             </div>
                             <div class='col-sm-3'>
                                <label for='zip'>Zip</label>
                                <input type=\"text\" class=\"form-control\" id='zip' name='zip' value='".$zip."'>
                             </div>
                             <div class='col-sm-3'>
                                <label for='state'>State</label>
                                <input type=\"text\" class=\"form-control\" id='state' name='state' value='".$state."'>
                             </div>
                          </div>
                          
                          <div style='' class='row'>
                             <div class='col-sm-4'>
                                <label for='dob'>Date of Birth</label>
                                <input type='date' class='form-control' id='dob' name='dob' value='".$dob."'>
                             </div>
                             <div class='col-sm-4'>
                                <label for='dod'>Date of Death</label>
                                <input type='date' class=\"form-control\" id='dod' name='dod' value='".$dod."'>
                             </div>
                             <div class='col-sm-4'>
                                <label for='dod'>Client Number</label>
                                <input type=\"text\" class=\"form-control\" id='dod' name='dod' value='".$number."'>
                             </div>
                          </div>
                          
                          <div style='' class='row'>
                             <div class='col-sm-6'>
                                <label for='referred'>Referred</label>
                                <input type=\"text\" class=\"form-control\" id='referred' name='referred' value='".$referred."'>
                             </div>
                             <div class='col-sm-2'>
                                <label for='conctactName'>Spouse First Name</label>
                                <input type=\"text\" class=\"form-control\" id='contactFName' name='contactFName' value='".$contactFName."'>
                             </div>
                             <div class='col-sm-2'>
                                <label for='conctactName'>Spouse Middle Name</label>
                                <input type=\"text\" class=\"form-control\" id='contactMName' name='contactMName' value='".$contactMName."'>
                             </div>
                             <div class='col-sm-2'>
                                <label for='conctactName'>Spouse Last Name</label>
                                <input type=\"text\" class=\"form-control\" id='contactLName' name='contactLName' value='".$contactLName."'>
                             </div>
                          </div>
                          
                          <div style='' class='row'>
                             <div class='col-sm-4'>
                                <label for='firstName'>Contact Title</label>
                                <input type=\"text\" class=\"form-control\" id='contactTitle' name='contactTitle' value='".$contactTitle."'>
                             </div>
                             <div class='col-sm-4'>
                                <label for='firstName'>Contact Number</label>
                                <input type=\"text\" class=\"form-control\" id='contactNumber' name='contactNumber' value='".$contactNumber."'>
                             </div>
                             <div class='col-sm-4'>
                                <label for='firstName'>Contact Name</label>
                                <input type=\"text\" class=\"form-control\" id='contactName' name='contactName' value='".$contactName."'>
                             </div>
                          </div>";
                ?>
                <label>Confirm changes?</label>
                <input type="checkbox" name="confirmBox" id="confirmBox">
                <br>

                <label>Create New?</label>
                <input type="checkbox" name="createNew" id="createNew">
                <br>

                <?php
                if($_SESSION['ClientID']){
                    echo "
                        <label>Delete?</label>
                        <input type=\"checkbox\" name=\"delete\" id=\"delete\">
                        <br>
                    ";
                }
                ?>

                <button type="submit">Save</button>
            </fieldset>
    </form>
</div>
<style>
    .container-fluid{
        padding-left: 30px;
        padding-right: 30px;
    }
</style>

