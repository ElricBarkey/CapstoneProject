<?php
session_start();
//Define a query
$sql = "SELECT * FROM `subCategory`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<!-- look into inserting php if-thens into form. Think I can make it tab
 between forms -->

<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test"><!-- gets first name, last name, and email -->
        <thead>
        <tr>
            <th scope="col">subCategoryID</th>
            <th scope="col">categoryID</th>
            <th scope="col">actionName</th>
            <th scope="col">actionDescription</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $_SESSION['subCatID'] = $row['categoryID'];
            $subCategoryID = $row['subCategoryID'];
            $categoryName = $row['subCategoryName'];
            $actionDescription = $row['subCategoryDescription'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newSubCategory.php?subCategoryID=".$_SESSION['subCatID']."'>".$_SESSION['subCatID']."</td>
                    <td>$categoryID</td>
                    <td>$categoryName</td>
                    <td>$actionDescription</td>
                    <td><a href='requires/OwnerTabs/newSubCategory.php?subCategoryID=".$_SESSION['subCatID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="requires/OwnerTabs/newSubCategory.php">Add a subCategory</a>
</div>

