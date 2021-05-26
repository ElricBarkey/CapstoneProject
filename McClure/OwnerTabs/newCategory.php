<?php
session_start();
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../db.php');
//var_dump($_GET);
$action = "add";
$categoryID = "";
$categoryName = "";
$description = "";

//See if this is an edit
if(!empty($_GET['categoryID']) && (!empty($_GET['delete']))){

    //Get the SID
    $categoryID = $_GET['categoryID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $actionID = mysqli_real_escape_string($cnxn, $categoryID);
    $sql = "SELECT * FROM category WHERE categoryID = '$categoryID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $categoryID = $row['categoryID'];
    $categoryName = $row['categoryName'];
    $description = $row['description'];

}

if(!empty($_GET['categoryID']) && (!empty($_GET['delete']))){
    //Get the SID
    $categoryID = $_GET['categoryID'];
    //echo $sid;

    //set a flag
    $action = "delete";

    //Query the database
    $categoryID = mysqli_real_escape_string($cnxn, $categoryID);
    $sql = "DELETE FROM category WHERE categoryID = '$categoryID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    //var_dump($row);
;
    //Get the data from the row
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=category");

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
    echo "<h3>$text Category</h3>";

    $url = "add-category.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="actionName">Category name</label>
            <input type="text" class="form-control"
                   id="categoryName" name="categoryName" value="<?php echo $categoryName ?>">
        </div>
        <div class="form-group">
            <label for="lastName">Category description</label>
            <input type="text" class="form-control"
                   id="description" name="description" value="<?php echo $description ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>

    </form>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=category">View categories</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
