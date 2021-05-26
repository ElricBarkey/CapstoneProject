<?php
//Turn on error reporting -- this is critical!
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
include('../db.php');
//var_dump($_GET);
$action = "add";
$subCategoryID = "";
$categoryID = "";
$subCategoryName = "";
$subCategoryDescription = "";

//See if this is an edit
if(!empty($_GET['subCategoryID'])){
    //Get the SID
    $subCategoryID = $_GET['subCategoryID'];
    //echo $sid;

    //set a flag
    $action = "edit";

    //Query the database
    $subCategoryID = mysqli_real_escape_string($cnxn, $subCategoryID);
    $sql = "SELECT * FROM subCategory WHERE subCategoryID = '$subCategoryID'";
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    $row = mysqli_fetch_array($result);
    //var_dump($row);

    //Get the data from the row
    $subCategoryID = $row['subCategoryID'];
    $categoryID = $row['categoryID'];
    $subCategoryName = $row['subCategoryName'];
    $subCategoryDescription = $row['subCategoryDescription'];

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
    header("location: https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/OwnerTabs/index.php?&ownerTab=subCategory");

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
    echo "<h3>$text subCategory</h3>";

    $url = "add-subCategory.php";
    if($action == 'edit'){
        $url .= '?action=edit';
    }
    ?>

    <form id="student-form" action=<?php echo $url ?> method="post">

        <div class="form-group">
            <label for="categoryID">Category</label>
            <select id="categoryID" name="categoryID">
                <option value="0">--Select--</option>

                <?php

                //Write query
                $sql = "SELECT categoryID as categoryID, categoryName as name
                            FROM category";
                //Send query to database and get result
                $result = mysqli_query($cnxn, $sql);

                //Process result
                foreach ($result as $row) {

                    //Get the row data
                    $category = $row['categoryID'];
                    $name = $row['name'];

                    echo "<option value='$category' ";

                    //If this is the advisor of the student
                    //being updated, select it
                    if($categoryID == $category){
                        echo "selected";
                    }
                    echo ">". $name." </option>";
                }

                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="subCategoryName">Subcategory Name</label>
            <input type="text" class="form-control"
                   id="subCategoryName" name="subCategoryName" value="<?php echo $subCategoryName ?>">
        </div>
        <div class="form-group">
            <label for="subCategoryDescription">Subcategory Description</label>
            <input type="text" class="form-control"
                   id="subCategoryDescription" name="subCategoryDescription" value="<?php echo $subCategoryDescription ?>">
        </div>
        <button id="submit" type="submit" class="btn btn-primary">
            <?php
            echo $action  == "add" ? "Submit" : "Save Changes ";
            ?>
        </button>

    </form>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?&ownerTab=subCategory">View subCategories</a>
</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
