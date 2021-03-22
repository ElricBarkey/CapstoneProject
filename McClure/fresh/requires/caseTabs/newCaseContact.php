<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../../db.php');
//var_dump($_GET);
$action = "add";
$contactID = "";
$caseID = "";
$clientID = "";
$contactType = "";
$number = "";
$email = "";
$name = "";
$description = "";

//See if this is an edit
if(!empty($_GET['slipID'])){

    //Get the SID
    $contactID = $_GET['slipID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $contactID = mysqli_real_escape_string($cnxn, $contactID);
    $sql = "SELECT * FROM contacts WHERE contactID = '$contactID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $contactID = $row['contactID'];
    $caseID = $row['caseID'];
    $clientID = $row['clientID'];
    $contactType = $row['preferred'];
    $number = $row['phone'];
    $email = $row['email'];
    $name = $row['name'];
    $description = $row['description'];

}

if(!empty($_GET['slipID']) && (!empty($_GET['delete']))){
    //Get the SID
    $contactID = $_GET['slipID'];
    //echo $sid;

    //Query the database
    $sql = "DELETE FROM contacts WHERE contactID = '$contactID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/caseController.php?caseTab=contacts");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Action</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>

<div class="container">
    <?php
    $text = $action == "add" ? "Add a new " : "Edit ";
    echo "<h3>$text Contact</h3>";

    $url = "add-contact.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="ContactID">ContactID</label>
            <input type="text" class="form-control"
                   id="ContactID" name="ContactID" value="<?php echo $contactID ?>">
        </div>
        <div class="form-group">
            <label for="caseID">caseID</label>
            <select id="caseID" name="caseID">
                <option value="0">--Select--</option>

                <?php

                //Write query
                $sql = "SELECT caseID as caseID, caseName as caseName
                            FROM Cases";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $action_ID = $row['caseID'];
                    $name = $row['caseName'];

                    echo "<option value='$action_ID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($action_ID == $caseID){
                        echo "selected";
                    }
                    echo ">".$name."</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="clientID">Client</label>
            <select id="clientID" name="clientID">
                <option value="0">--Select--</option>

                <?php

                //Write query
                $sql = "SELECT clientID as clientID, fName as fName, lName as lName
                            FROM clients";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $action_ID = $row['actionID'];
                    $fName = $row['fName'];
                    $lName = $row['lName'];

                    echo "<option value='$action_ID' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($action_ID == $clientID){
                        echo "selected";
                    }
                    echo ">".$lName.", ".$fName."</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="contactType">Contact Type</label>
            <input type="text" class="form-control"
                   id="contactType" name="contactType" value="<?php echo $contactType ?>">
        </div>
        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" class="form-control"
                   id="number" name="number" value="<?php echo $number ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control"
                   id="email" name="email" value="<?php echo $email ?>">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"
                   id="name" name="name" value="<?php echo $name ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control"
                   id="description" name="description" value="<?php echo $description ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>
    </form>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=action">View actions</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
