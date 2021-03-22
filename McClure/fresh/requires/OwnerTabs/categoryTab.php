<?php

//Define a query
$sql = "SELECT * FROM `category`;";
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
                <th scope="col">categoryID</th>
                <th scope="col">actionName</th>
                <th scope="col">actionDescription</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>

        <?php

        foreach ($result as $row) {
            $categoryID = $row['categoryID'];
            $categoryName = $row['categoryName'];
            $actionDescription = $row['description'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newCategory.php?categoryID=$categoryID'>$categoryID</td>
                    <td>$categoryName</td>
                    <td>$actionDescription</td>
                    <td><a href='requires/OwnerTabs/newCategory.php?categoryID=$categoryID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="requires/OwnerTabs/newCategory.php">Add an action</a>
</div>


