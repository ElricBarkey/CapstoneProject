<?php
session_start();
include('../../db.php'); // CHANGE
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
if(!empty($_GET['contactID'])){

    $_SESSION['contactID'] = $_GET['contactID'];
    //set a flag
    $action = "edit";

    //Query the database
    $contactID = mysqli_real_escape_string($cnxn, $contactID);
    $sql = "SELECT * FROM contacts WHERE contactID = '".$_SESSION['contactID']."'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $contactID = $row['contactID'];
    $preferred = $row['preferred'];
    $phone = $row['phone'];
    $email = $row['email'];
    $name = $row['name'];
    $description = $row['description'];

}

if(!empty($_GET['clientID']) && (!empty($_GET['delete']))){

    $sql = "DELETE FROM contacts WHERE contactID = '".$_SESSION['contactID']."'";
    $result = mysqli_query($cnxn, $sql);
}

if(!empty($_GET['clientID']) && (!empty($_GET['delete']))){

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
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&tab=phones">View contacts</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
