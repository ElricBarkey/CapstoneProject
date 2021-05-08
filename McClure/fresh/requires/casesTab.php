<?php
if(isset($_POST['newCaseName']) && isset($_POST['newCaseStatus'])){
    $sql = "INSERT INTO `Cases` (`clientID`, `caseName`, `Status_`) VALUES ('".$_SESSION['ClientID']."', '".$_POST['newCaseName']."', '".$_POST['newCaseStatus']."');";

    //echo $sql;
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=cases");
}
//Define a query

$sql = "SELECT * FROM Cases WHERE `clientID`='".$_SESSION['ClientID']."';";
//echo($sql);
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

//Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `clients` SET `contact`='".$_POST['contactType']."',`phoneNum`='".$_POST['number']."' WHERE `cLName`='".$_POST['lName']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}
?>

<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset id="#p" class="form-group"><!-- gets first name, last name, and email -->
        <legend>Cases</legend>
        <div class='row'>
            <div class='col-sm-6'>
                <p>Case</p>
            </div>
            <div class='col-sm-6'>
                <p>Status</p>
            </div>
        </div>
        <?php
        foreach ($result as $row) {
            $caseName = $row['caseName'];
            $status = $row['Status_'];
            $caseID = $row['caseID'];

            $_SESSION['caseName'] = $caseName;

            echo "
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label type=\"text\" class=\"form-control\" id='caseName'>".$caseName."</label>
                        </div>
                        <div class='col-sm-4'>
                            <label type=\"text\" class=\"form-control\" id='status'>".$status."</label>
                        </div>
                        <div class='col-sm-4'>
                            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=generalTab&caseID=".$caseID."'>Edit/View case</a>
                            <a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/add-case.php?caseTab=generalTab&actionID=".$caseID."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>delete</a>
                        </div>
                    </div>";
        }
        ?>
        <div style='' class='row'>
            <div class='col-sm-4'>
                <input type="text" class="form-control" id='newCaseName' name="newCaseName" placeholder="New Case Name">
            </div>
            <div class='col-sm-4'>
                <input type="text" class="form-control" id='newCaseStatus' name="newCaseStatus" placeholder="New Case Status">
            </div>
        </div>
        <button type="submit">Save</button>
    </fieldset>
</form>


