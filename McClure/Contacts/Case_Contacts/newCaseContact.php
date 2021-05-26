<?php //HTML TO BE CHANGED
session_start();

include('../../db.php');

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

    $contactID = $_GET['slipID'];

    //set a flag
    $action = "edit";

    //Query the database
    $contactID = mysqli_real_escape_string($cnxn, $contactID);
    $sql = "SELECT * FROM contacts WHERE contactID = '$contactID'";
    $result = mysqli_query($cnxn, $sql);
    $row = mysqli_fetch_array($result);

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

    $contactID = $_GET['slipID'];

    //Query the database
    $sql = "DELETE FROM contacts WHERE contactID = '$contactID'";
    $result = mysqli_query($cnxn, $sql);

    //Get the data from the row
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=contacts");

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

    $url = "add-caseContact.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form method="post" id="student-form" action=<?php echo $url ?>><!--edit this line-->
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
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=action">View actions</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
