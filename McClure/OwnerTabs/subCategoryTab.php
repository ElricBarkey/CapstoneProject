<?php
//Define a query
$sql = "SELECT * FROM `subCategory`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<div id="main" class="container">
    <table class="table" id="test">
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
            $categoryID = $row['subCategoryID'];
            $actionDescription = $row['subCategoryDescription'];
            echo "
                <tr>
                    <td><a href='OwnerTabs/newSubCategory.php?subCategoryID=".$_SESSION['subCatID']."'>".$_SESSION['subCatID']."</td>
                    <td>$categoryID</td>
                    <td>$categoryName</td>
                    <td>$actionDescription</td>
                    <td><a href='OwnerTabs/newSubCategory.php?subCategoryID=".$_SESSION['subCatID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="OwnerTabs/newSubCategory.php">Add a subCategory</a>
</div>

