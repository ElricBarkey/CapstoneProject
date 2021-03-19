<?php

if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `Cases` SET `caseNumber`='".$_POST['caseNumber']."',`caseName`='".$_POST['caseName']."',`attorneyID`='".$_POST['attorneyID']."',
`OriginAttyID`='".$_POST['OriginAttyID']."',`categoryID`='".$_POST['category']."',`subCategoryID`='".$_POST['subCategory']."',
`escrowID`='".$_POST['escrow']."',`openDate`='".$_POST['opened']."',`FeeBasis`='".$_POST['feeBasis']."',
`CaseHourlyRate`='".$_POST['rate']."',`Status_`='".$_POST['status']."',`closeDate`='".$_POST['closeDate']."',
`lastBillDate`='".$_POST['lastBill']."',`previousBalance`='".$_POST['previousBalance']."',
 `Marked`='".$_POST['Marked']."', `Reference`='".$_POST['Reference']."', `Salutation`='".$_POST['Salutation']."', `Responsible`='".$_POST['Responsible']."'
WHERE `ClientID`='".$_SESSION['ClientID']."';";

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
    $caseName = $row['CaseName'];
    $opened = $row['openDate'];
    $escrow = $row['escrowID'];
    $attorney = $row['AttorneyID'];
    $originating = $row['OriginAttyID'];
    $responsible = $row['Responsible'];
    $lastBill = $row['lastBillDate'];
    $caseName = $row['caseName'];
    $category = $row['categoryID'];
    $subCategory = $row['subCategoryID'];
    $rate = $row['interestRate'];
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


        <?php

        echo "
                <div class='table'>
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label for='Status'>Status:</label>
                            <input type='text' class='form-control' id='status' name='status' value='".$status."'>
                            <select>
                                <option value='open' selected='selected'>Open</option>
                                <option value='closed' selected='selected'>Closed</option>
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Mark'>Mark:</label>
                            <input type='checkbox' class='form-control' id='Mark' name='Mark'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Case'>Case:</label>
                            <input type='text' class='form-control' id='caseName' name='caseName' value='".$caseName."'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-6'>
                            <label for='Status'>Opened:</label>
                            <input type='text' class='form-control' id='opened' name='opened' value='".$opened."'>
                        </div>
                        <div class='col-sm-6'>
                            <label for='Mark'>Escrow:</label>
                            <input type='text' class='form-control' id='escrow' name='escrow' value='".$escrow."'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-3'>
                            <label for='Status'>Attorney:</label>
                            <input type='text' id='attorneyID' name='attorneyID' value='".$attorney."'>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Status'>Originating:</label>
                            <input type='text' id='OriginAttyID' name='OriginAttyID' value='".$originating."'>
                            <select>
                                <option value='open'>???</option>
                                <option value='closed' selected='selected'>???</option>
                            </select>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Mark'>Responsible:</label>
                            <select>
                                <option value='open'>???</option>
                                <option value='closed' selected='selected'>???</option>
                            </select>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Mark'>Last Bill:</label>
                            <input type=\"text\" class=\"form-control\" id=\"lastBill\" name=\"lastBill\" value='".$lastBill."'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-12'>
                            <label for='Status'>Case Name:</label>
                            <input type=\"text\" class=\"form-control\" id=\"caseName\" name=\"caseName\" value='".$caseName."'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-12'>
                            <label for='Status'>Category:</label>
                            <input type=\"text\" class=\"form-control\" id=\"category\" name=\"category\" value='".$category."'>
                            <select>
                                <option value='open'>???</option>
                                <option value='closed' selected='selected'>???</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-12'>
                            <label for='Status'>Sub-category:</label>
                            <input type=\"text\" class=\"form-control\" id=\"subCategory\" name=\"subCategory\" value='".$category."'>
                            <select>
                                <option value='open'>???</option>
                                <option value='closed' selected='selected'>???</option>
                            </select>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-3'>
                            <label for='Status'>Rate:</label>
                            <input type=\"text\" class=\"form-control\" id=\"rate\" name=\"rate\" value='".$rate."'>
                        </div>
                        <div class='col-sm-3'>
                            <label for='Status'>Bill:</label>
                            <input type=\"radio\" class=\"form-control\" id=\"bill\" name=\"bill\" value='".$bill."'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-12'>
                            <label for='Status'>Fee Basis:</label>
                            <input type=\"text\" class=\"form-control\" id=\"feeBasis\" name=\"feeBasis\" value='".$feeBasis."'>
                        </div>
                    </div>
                    
                    <div style='' class='row'>
                        <div class='col-sm-12'>
                            <label for='Status'>Billing info:</label>
                            <input type=\"text\" class=\"form-control\" id=\"billing\" name=\"billing\" value='".$billing."'>
                        </div>
                    </div>
                    <hr>
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label for='Status'>Case Number:</label>
                            <input type=\"text\" class=\"form-control\" id='caseNumber' name='caseNumber' value='".$caseNum."'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Status'>ID #:</label>
                            <input type=\"text\" class=\"form-control\" id=\"caseID\" name=\"caseID\" value='".$caseID."'>
                        </div>
                        <div class='col-sm-4'>
                            <label for='Status'>Contact No:</label>
                            <input type=\"text\" class=\"form-control\" id=\"Status\" name=\"Status\" value='"."'>
                        </div>
                    </div>
                </div>";
        ?>
        <label>Confirm changes?</label>
        <input type="checkbox" name="confirmBox" id="confirmBox">
        <br>
        <button type="submit">Save</button>
    </fieldset>
</form>

