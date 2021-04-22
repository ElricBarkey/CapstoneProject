<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../db.php');
//var_dump($_GET);
$action = "add";
$contactID = "";
$caseID = "";
$clientID = "";
$preferred = "";
$phone = "";
$email = "";
$name = "";
$description = "";

//See if this is an edit
if(!empty($_GET['subCategoryID'])){
    //Get the SID
    $contactID = $_GET['subCategoryID'];
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
    $preferred = $row['preferred'];
    $phone = $row['phone'];
    $email = $row['email'];
    $name = $row['name'];
    $description = $row['description'];

}

if(!empty($_GET['subCategoryID']) && (!empty($_GET['delete']))){
    //Get the SID
    $subCategoryID = $_GET['subCategoryID'];
    //echo $sid;

    //Query the database
    $actionID = mysqli_real_escape_string($cnxn, $subCategoryID);
    $sql = "DELETE FROM subCategory WHERE subCategoryID = '$subCategoryID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    //header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=subCategory");

}

if(!empty($_GET['subCategoryID']) && (!empty($_GET['delete']))){
    //Get the SID
    $contactID = $_GET['subCategoryID'];
    //echo $sid;
    //echo 'test';

    //Query the database
    $contactID = mysqli_real_escape_string($cnxn, $contactID);
    $sql = "DELETE FROM contacts WHERE contactID = '$contactID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
    //echo $sql;
    //Get the data from the row
    header("location: http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?tab=phones");

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
    echo "<h3>$text Contacts</h3>";

    $url = "add-phone.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="caseID">caseID</label>
            <input type="text" class="form-control"
                   id="caseID" name="caseID" value="<?php echo $caseID ?>">
        </div>
        <div class="form-group">
            <label for="clientID">ClientID</label>
            <input type="text" class="form-control"
                   id="clientID" name="clientID" value="<?php echo $clientID ?>">
        </div>
        <div class="form-group">
            <label for="preferred">Preferred</label>
            <input type="text" class="form-control"
                   id="preferred" name="preferred" value="<?php echo $preferred ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control"
                   id="phone" name="phone" value="<?php echo $phone ?>">
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
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/index.php?&ownerTab=subCategory">View subCategories</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
