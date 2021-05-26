<?php //STYLE TO PULL

if(isset($_POST['confirmBox']) == 'on'){

    $sql = "UPDATE `Cases` SET `CaseComment`='".$_POST['comments']."' WHERE `caseID`='".$_SESSION['caseID']."';";
    echo '<script>alert("database updated!")</script>';
    mysqli_query($cnxn, $sql);


}
//Define a query
$sql = "SELECT * FROM `Cases` WHERE `caseID` = " . $_SESSION['caseID'];

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

foreach ($result as $row) {
    $comment = $row['CaseComment'];
}
?>
<div class="container-fluid">
    <form id="form" method="post" action="#">
        <fieldset id="#n" class="form-group">
            <div style=''>
                <textarea rows='8' cols='50' id='comments' name='comments'><?php echo $comment?></textarea>
            </div>
            <label>Confirm changes?</label>
            <input type="checkbox" name="confirmBox" id="confirmBox">
            <br>
            <button type="submit">Save</button>
        </fieldset>
    </form>
</div>
<style>
    .container-fluid{
        text-align: center;
    }
</style>


