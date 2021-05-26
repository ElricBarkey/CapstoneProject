<?php //comment to double check

$action = "add";
$clientID = "";
$caseID = $_SESSION['caseID'];
$date_ = "";
$attorney = "";
$actionID = "";
$hourlyRate = "";
$timeSpent = "";
$total = "";
$caseCheck = "";
$notes = "";
$rate = "";

if(isset($_POST['confirmBox']) == 'on'){
    if($_POST['rate'] == ''){
        $_POST['rate'] = 0;
    }
    if(!isset($_POST['bill'])){
        $_POST['bill'] = 'off';
    }
    if(!isset($_POST['Mark'])){
        $_POST['Mark'] = 'off';
    }

    $sql = "UPDATE `Cases` SET `caseNumber`='".$_POST['caseNumber']."',`caseName`='".$_POST['caseName']."',`AttorneyID`='".$_POST['attorneyID']."',
`OriginAttyID`='".$_POST['OriginAttyID']."',`categoryID`='".$_POST['category']."',`subCategoryID`='".$_POST['subCategory']."',
`escrowID`='".$_POST['escrow']."',`openDate`='".$_POST['opened']."',`FeeBasis`='".$_POST['feeBasis']."',
`CaseHourlyRate`='".$_POST['rate']."',`Status_`='".$_POST['status']."',
`lastBillDate`='".$_POST['lastBill']."',`bill`='".$_POST['bill']."',`billInfo`='".$_POST['billing']."',
 `Marked`='".$_POST['Mark']."', `Responsible`='".$_POST['responsible']."'
WHERE `ClientID`='".$_SESSION['ClientID']."' AND `caseID`='".$_SESSION['caseID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}

//Define a query
$sql = "SELECT * FROM Cases INNER JOIN clients ON Cases.clientID WHERE Cases.clientID = clients.clientID AND Cases.caseID = '".$_SESSION['caseID']."';
";
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

foreach ($result as $row) {
    $status = $row['Status_'];
    $mark = $row['Marked'];
    $caseName = $row['caseName'];
    $opened = $row['openDate'];
    $escrow = $row['escrowID'];
    $attorney = $row['AttorneyID'];
    $originating = $row['OriginAttyID'];
    $responsible = $row['Responsible'];
    $lastBillDate = $row['lastBillDate'];
    $category = $row['categoryID'];
    $subCategory = $row['subCategoryID'];
    $bill = $row['bill'];
    $feeBasis = $row['FeeBasis'];
    $billing = $row['billInfo'];
    $caseNum = $row['caseNumber']; //need to run a join call to get this from contact (?)
    $caseID = $row['caseID'];
    $_SESSION['caseID'] = $caseID;

    $clientID = $row['clientID'];
    $rate = $row['CaseHourlyRate'];

}
?>
<!-- look into inserting php if-thens into form. Think I can make it tab between forms -->
<div class="container-fluid" style="width: 80%;">
    <form id="form" method="post" action="#">
        <!-- Contact Information -->
        <fieldset class="form-group" id="#c"><!-- gets first name, last name, and email -->

            <hr>
            <div class='table'>
                <div style='' class='row'>
                    <div class='col-sm-3'>
                        <label for='status'>Status:</label>
                        <select id='status' name='status'>
                            <option value="NA" <?php if($status == "NA") echo "selected"; ?>>NA</option>
                            <option value="Open" <?php if($status == "Open") echo "selected"; ?>>Open</option>
                            <option value="Closed" <?php if($status == "Closed") echo "selected"; ?>>Closed</option>
                        </select>
                    </div>
                    <div class='col-sm-3'>
                        <label for='Mark'>Mark:</label>
                        <input class='form-control' id='Mark' name='Mark' type='checkbox' <?php if($mark == 'on')echo 'checked=""' ?>>
                    </div>
                    <div class='col-sm-3'>
                        <label for='Case'>Case:</label>
                        <input type='text' class='form-control' id='caseName' name='caseName' value='<?php echo $caseName ?>'>
                    </div>
                    <div class="col-sm-3">
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

                                if($clientID == $_SESSION['ClientID']){
                                    echo "selected";
                                }
                                echo ">".$lName.", ".$fName."</option>";
                            }

                            ?>

                        </select>
                    </div>
                </div>
                <hr>
                <div style='' class='row'>
                    <div class='col-sm-3'>
                        <label for='Status'>Opened:</label>
                        <input type='date' class='form-control' id='opened' name='opened' value='<?php echo $opened ?>'>
                    </div>
                    <div class="col-sm-3">
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
                                $escrowID = $row['escrowID'];
                                $fName = $row['amount'];

                                echo "<option value='$escrowID' ";

                                if($escrowID == $escrow){
                                    echo "selected";
                                }
                                echo ">".$lName."</option>";
                            }

                            ?>

                        </select>
                    </div>
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
                                $attorneyID = $row['attorneyID'];
                                $fName = $row['first'];
                                $lName = $row['last'];

                                echo "<option value='$attorneyID' ";

                                //If this is the advisor of the student
                                //being updated, select it
                                if($attorneyID == $attorney){
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
                                $OattyID = $row['attorneyID'];
                                $fName = $row['first'];
                                $lName = $row['last'];

                                echo "<option value='$OattyID' ";

                                //If this is the advisor of the student
                                //being updated, select it
                                if($OattyID == $originating){
                                    echo "selected";
                                }
                                echo ">".$lName.", ".$fName."</option>";
                            }

                            ?>

                        </select>
                    </div>
                </div>
                <hr>
                <div style='' class='row'>
                    <div class='col-sm-3'>
                        <label for='responsible'>Responsible:</label>
                        <input type='text' class='form-control' id='responsible' name='responsible' value='<?php echo $responsible ?>'>
                    </div>
                    <div class='col-sm-3'>
                        <label for='lastBill'>Last Bill:</label>
                        <input type='text' class='form-control' id='lastBill' name='lastBill' value='<?php echo $lastBillDate ?>'>
                    </div>
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
                                $categoryID = $row['categoryID'];
                                $name = $row['name'];

                                echo "<option value='$categoryID' ";

                                //If this is the advisor of the student
                                //being updated, select it
                                if($categoryID == $category){
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
                                $subCategoryID = $row['subCategoryID'];
                                $name = $row['name'];

                                echo "<option value='$subCategoryID' ";

                                //If this is the advisor of the student
                                //being updated, select it
                                if($subCategoryID == $subCategory){
                                    echo "selected";
                                }
                                echo ">".$name."</option>";
                            }

                            ?>

                        </select>
                    </div>
                </div>

                <div style='' class='row'>
                    <div class='col-sm-3'>
                        <label for='rate'>Rate:</label>
                        <input type='text' class='form-control' id='rate' name='rate' value='<?php echo $rate ?>'>
                    </div>
                    <div class='col-sm-3'>
                        <label for='bill'>Bill:</label>
                        <input type='checkbox' class='form-control' id='bill' name='bill' <?php if($bill == 'on')echo 'checked=""' ?>>
                    </div>
                    <div class='col-sm-3'>
                        <label for='feeBasis'>Fee Basis:</label>
                        <input type='text' class='form-control' id='feeBasis' name='feeBasis' value='<?php echo $feeBasis ?>'>
                    </div>
                    <div class='col-sm-3'>
                        <label for='billing'>Billing info:</label>
                        <input type='text' class='form-control' id='billing' name='billing' value='<?php echo $billing ?>'>
                    </div>
                </div>
                <hr>
                <div style='' class='row'>
                    <div class='col-sm-3'>
                        <label for='caseNumber'>Case Number:</label>
                        <input type='text' class='form-control' id='caseNumber' name='caseNumber' value='<?php echo $caseNum ?>'>
                    </div>
                    <div class='col-sm-3'>
                        <label>Confirm changes?</label>
                        <input type="checkbox" name="confirmBox" id="confirmBox">
                    </div>
                    <div class='col-sm-3'>
                        <button type="submit">Save</button>
                    </div>
                </div>
        </fieldset>
    </form>
</div>

