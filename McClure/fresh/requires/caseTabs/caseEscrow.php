<?php

//check if information was edited
if($_POST['confirmBox'] == 'on'){
    //var_dump($_POST);

    $sql = "UPDATE `Escrow` SET `attyID`='".$_POST['atty']."', `date_`='".$_POST['date']."',
      `actionID`='".$_POST['action']."', `description`='".$_POST['description']."', `CheckNo`='".$_POST['checkNo']."',
       `amount`='".$_POST['amount']."' WHERE `escrowID`='".$_SESSION['escrowID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);
    $_SESSION['escrowID'] = '';
}
?>
<form id="form" method="post" action="#">
    <!-- Contact Information -->
    <fieldset class=\"form-group\">
        <div class='row'>
            <div class='col-sm-2'>Date</div>
            <div class='col-sm-1'>Atty</div>
            <div class='col-sm-2'>Action</div>
            <div class='col-sm-5'>Description</div>
            <div class='col-sm-1'>CheckNo</div>
            <div class='col-sm-1'>Amount</div>
        </div>
<?php

//Define a query
$sql = "SELECT * FROM `Escrow`";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

foreach ($result as $row) {
    $_SESSION['escrowID'] = $row['escrowID'];
    $date = $row['date_'];
    $atty = $row['attyID'];
    $action = $row['actionID'];
    $description = $row['description'];
    $checkNo = $row['CheckNo'];
    $amount = $row['amount'];
    echo "
            
        <div class='row'>
            <div class='col-sm-2'>
                <input type='text' class='form-control' id='date' name='date' value='$date'>
            </div>
            <div class='col-sm-1'>
                   <input type='text' class='form-control' id='atty' name='atty' value='$atty'>
            </div>
            <div class='col-sm-2'>
                <input type='text' class='form-control' id='action' name='action' value='$action'>
            </div>
            <div class='col-sm-5'>
                <input type='text' class='form-control' id='description' name='description' value='$description'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='checkNo' name='checkNo' value='$checkNo'>
            </div>
            <div class='col-sm-1'>
                <input type='text' class='form-control' id='amount' name='amount' value='$amount'>
            </div>
        </div>
";
}
?>


<label>Confirm changes?</label>
<input type="checkbox" name="confirmBox" id="confirmBox">
<br>
<button type="submit">Save</button>
</fieldset>
</form>