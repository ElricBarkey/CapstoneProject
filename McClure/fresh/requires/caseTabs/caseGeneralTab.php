<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


$action = "add";
$clientID = "";
$caseID = "";
$date_ = "";
$attorney = "";
$actionID = "";
$hourlyRate = "";
$timeSpent = "";
$total = "";
$caseCheck = "";
$notes = "";
$rate = "";

if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);
    if($_POST['rate'] == ''){
        $_POST['rate'] = 0;
    }
    //var_dump($_POST);

    $sql = "UPDATE `Cases` SET `caseNumber`='".$_POST['caseNumber']."',`caseName`='".$_POST['caseName']."',`AttorneyID`='".$_POST['attorneyID']."',
`OriginAttyID`='".$_POST['OriginAttyID']."',`categoryID`='".$_POST['category']."',`subCategoryID`='".$_POST['subCategory']."',
`escrowID`='".$_POST['escrow']."',`openDate`='".$_POST['opened']."',`FeeBasis`='".$_POST['feeBasis']."',
`CaseHourlyRate`='".$_POST['rate']."',`Status_`='".$_POST['status']."',
`lastBillDate`='".$_POST['lastBill']."',`bill`='".$_POST['bill']."',`billInfo`='".$_POST['billing']."',
 `Marked`='".$_POST['Mark']."', `Responsible`='".$_POST['responsible']."'
WHERE `ClientID`='".$_SESSION['ClientID']."';";
//echo $sql;
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}

//Define a query
$sql = "SELECT * FROM Cases";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

foreach ($result as $row) {
    $status = $row['Status_'];
    $mark = $row['Marked'];
    $caseName = $row['caseName'];
    $opened = $row['openDate'];
    $escrow = $row['escrowID'];
    $attorney = $row['AttorneyID'];
    $originating = $row['OriginAttyID'];
    $responsible = $row['Responsible'];
    $lastBill = $row['lastBillDate'];
    $category = $row['categoryID'];
    $subCategory = $row['subCategoryID'];
    $bill = $row['bill'];
    $feeBasis = $row['FeeBasis'];
    $billing = $row['billInfo'];
    $caseNum = $row['caseNumber']; //need to run a join call to get this from contact
    $caseID = $row['caseID'];
    $_SESSION['caseID'] = $caseID;

}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset class="form-group" id="#c"><!-- gets first name, last name, and email -->


        <div class='table'>
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label for='Status'>Status:</label>
                            <input type='text' class='form-control' id='status' name='status' value='<?php echo $status ?>'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Mark'>Mark:</label>
                            <input type='checkbox' class='form-control' id='Mark' name='Mark'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Case'>Case:</label>
                            <input type='text' class='form-control' id='caseName' name='caseName' value='<?php echo $caseName ?>'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class="col-sm-4">
                            <label for="client">Client</label>
                            <select id="client" name="client">
                                <option value="0">--Select--</option>

                                <?php

                                //Write query
                                $sql = "SELECT clientID as clientID, fName as first, lName as last
                            FROM clients";
                                //Send query to database and get result
                                $result = mysqli_query($cnxn, $sql);

                                //Process result
                                foreach ($result as $row) {

                                    //Get the row data
                                    $clientID = $row['clientID'];
                                    $fName = $row['first'];
                                    $lName = $row['last'];

                                    echo "<option value='$clientID' ";

                                    //If this is the advisor of the student
                                    //being updated, select it
                                    if($clientID == $attorney){
                                        echo "selected";
                                    }
                                    echo ">".$lName.", ".$fName."</option>";
                                }

                                ?>

                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Status'>Opened:</label>
                            <input type='text' class='form-control' id='opened' name='opened' value='<?php echo $opened ?>'>
                        </div>
                        <div class="col-sm-4">
                            <label for="escrow">Escrow</label>
                            <select id="escrow" name="escrow">
                                <option value="0">--Select--</option>

                                <?php

                                //Write query
                                $sql = "SELECT escrowID as escrowID, amount as amount
                            FROM Escrow";
                                //Send query to database and get result
                                $result = mysqli_query($cnxn, $sql);

                                //Process result
                                foreach ($result as $row) {

                                    //Get the row data
                                    $clientID = $row['escrowID'];
                                    $fName = $row['amount'];

                                    echo "<option value='$clientID' ";

                                    //If this is the advisor of the student
                                    //being updated, select it
                                    if($clientID == $attorney){
                                        echo "selected";
                                    }
                                    echo ">".$lName."</option>";
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class="col-sm-3">
                            <label for="attorneyID">Attorney</label>
                            <select id="attorneyID" name="attorneyID">
                                <option value="0">--Select--</option>

                                <?php

                                //Write query
                                $sql = "SELECT attorneyID as attorneyID, fName as last, lName as first
                            FROM attorneys";
                                //Send query to database and get result
                                $result = mysqli_query($cnxn, $sql);

                                //Process result
                                foreach ($result as $row) {

                                    //Get the row data
                                    $clientID = $row['attorneyID'];
                                    $fName = $row['first'];
                                    $lName = $row['last'];

                                    echo "<option value='$clientID' ";

                                    //If this is the advisor of the student
                                    //being updated, select it
                                    if($clientID == $attorney){
                                        echo "selected";
                                    }
                                    echo ">".$lName.", ".$fName."</option>";
                                }

                                ?>

                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="OriginAttyID">Originating</label>
                            <select id="OriginAttyID" name="OriginAttyID">
                                <option value="0">--Select--</option>

                                <?php

                                //Write query
                                $sql = "SELECT attorneyID as attorneyID, fName as last, lName as first
                            FROM attorneys";
                                //Send query to database and get result
                                $result = mysqli_query($cnxn, $sql);

                                //Process result
                                foreach ($result as $row) {

                                    //Get the row data
                                    $clientID = $row['attorneyID'];
                                    $fName = $row['first'];
                                    $lName = $row['last'];

                                    echo "<option value='$clientID' ";

                                    //If this is the advisor of the student
                                    //being updated, select it
                                    if($clientID == $attorney){
                                        echo "selected";
                                    }
                                    echo ">".$lName.", ".$fName."</option>";
                                }

                                ?>

                            </select>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Mark'>Responsible:</label>
                            <input type='text' class='form-control' id='responsible' name='responsible' value='<?php echo $responsible ?>'>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Mark'>Last Bill:</label>
                            <input type='text' class='form-control' id='lastBill' name='lastBill' value='<?php echo $opened ?>'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class="col-sm-3">
                            <label for="category">Category</label>
                            <select id="category" name="category">
                                <option value="0">--Select--</option>

                                <?php

                                //Write query
                                $sql = "SELECT categoryID as categoryID, categoryName as name
                            FROM category";
                                //Send query to database and get result
                                $result = mysqli_query($cnxn, $sql);

                                //Process result
                                foreach ($result as $row) {

                                    //Get the row data
                                    $clientID = $row['categoryID'];
                                    $name = $row['name'];

                                    echo "<option value='$clientID' ";

                                    //If this is the advisor of the student
                                    //being updated, select it
                                    if($clientID == $attorney){
                                        echo "selected";
                                    }
                                    echo ">".$name."</option>";
                                }

                                ?>

                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="subCategory">sub category</label>
                            <select id="subCategory" name="subCategory">
                                <option value="0">--Select--</option>

                                <?php

                                //Write query
                                $sql = "SELECT subCategoryID as subCategoryID, subCategoryName as name
                                        FROM subCategory";
                                //Send query to database and get result
                                $result = mysqli_query($cnxn, $sql);

                                //Process result
                                foreach ($result as $row) {

                                    //Get the row data
                                    $clientID = $row['subCategoryID'];
                                    $name = $row['name'];

                                    echo "<option value='$clientID' ";

                                    //If this is the advisor of the student
                                    //being updated, select it
                                    if($clientID == $attorney){
                                        echo "selected";
                                    }
                                    echo ">".$name."</option>";
                                }

                                ?>

                            </select>
                        </div>

                        <div class='col-sm-3'>
                            <label for='Status'>Rate:</label>
                            <input type='text' class='form-control' id='rate' name='rate' value='<?php echo $rate ?>'>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Status'>Bill:</label>
                            <input type='radio' class='form-control' id='bill' name='bill' value='<?php echo $bill ?>'>
                        </div>
                    </div>

                    <div style='' class='row'>
                        <div class='col-sm-6'>
                            <label for='Status'>Fee Basis:</label>
                            <input type='text' class='form-control' id='feeBasis' name='feeBasis' value='<?php echo $feeBasis ?>'>
                        </div>
                        <div class='col-sm-6'>
                            <label for='Status'>Billing info:</label>
                            <input type='text' class='form-control' id='billing' name='billing' value='<?php echo $billing ?>'>
                        </div>
                    </div>
                    <hr>
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label for='Status'>Case Number:</label>
                            <input type='text' class='form-control' id='caseNumber' name='caseNumber' value='<?php echo $caseNum ?>'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Status'>ID #:</label>
                            <input type='text' class='form-control' id='caseID' name='caseID' value='<?php echo $caseID ?>'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Status'>Contact No:</label>
                            <input type='text' class='form-control' id='Status' name='Status' value=''>
                        </div>
                    </div>
                </div>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>

