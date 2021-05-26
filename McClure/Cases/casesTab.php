<?php

if(isset($_POST['newCaseName']) && isset($_POST['newCaseStatus'])){
    $sql = "INSERT INTO `Cases` (`clientID`, `caseName`, `Status_`) VALUES ('".$_SESSION['ClientID']."', '".$_POST['newCaseName']."', '".$_POST['newCaseStatus']."');";

    echo $sql;

    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);

    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=cases");
}
//Define a query

$sql = "SELECT * FROM Cases WHERE `clientID`='".$_SESSION['ClientID']."';";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

//check if information was edited
/*
if(isset($_POST['confirmBox']) == 'on'){

    $sql = "UPDATE `clients` SET `contact`='".$_POST['contactType']."',`phoneNum`='".$_POST['number']."' WHERE `cLName`='".$_POST['lName']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
}
*/
?>

<div class="container-fluid">
    <form id="form" method="post" action="#">
        <fieldset id="#p" class="form-group">
            <legend>Client's Cases</legend>
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

                if($status == "Open"){
                    $text = "<option value='NA'>NA</option>
                                <option value='Open' selected>Open</option>
                                <option value='Closed'>Closed</option>";
                }else if($status == "Closed"){
                    $text = "<option value='NA'>NA</option>
                                <option value='Open'>Open</option>
                                <option value='Closed' selected>Closed</option>";
                }else{
                    $text = "<option value='NA'>NA</option>
                                <option value='Open'>Open</option>
                                <option value='Closed'>Closed</option>";
                }

                echo "
                    <div style='' class='row'>
                        <div class='col-sm-4'>
                            <label type=\"text\" class=\"form-control\" id='caseName'>".$caseName."</label>
                        </div>
                        <div class='col-sm-4'>
                            <select id='status' name='status'>
                                ".$text."
                            </select>
                        </div>
                        <div class='col-sm-4'>
                            <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=general&caseID=".$caseID."'>Edit/View case</a>
                            <a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Cases/add-case.php?caseTab=generalTab&actionID=".$caseID."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>delete</a>
                        </div>
                    </div>";
            }
            ?>
            <div style='' class='row'>
                <div class='col-sm-4'>
                    <input type="text" class="form-control" id='newCaseName' name="newCaseName" placeholder="New Case Name">
                </div>
                <div class='col-sm-4'>
                    <select id='newCaseStatus' name='newCaseStatus'>
                        <option value="NA">NA</option>
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
            </div>
            <button type="submit">Save</button>
        </fieldset>
    </form>
</div>


