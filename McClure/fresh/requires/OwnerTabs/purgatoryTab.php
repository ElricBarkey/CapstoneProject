<?php

//Define a query
$sql = "SELECT * FROM `purgatory`;";
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
            <th scope="col">clientID</th>
            <th scope="col">firstName</th>
            <th scope="col">lastName</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $clientID = $row['clientID'];
            $lName = $row['lName'];
            $fName = $row['fName'];
            echo "
                <tr>
                    <td><a href='requires/OwnerTabs/newPurgatory.php?clientID=$clientID'>$clientID</td>
                    <td>$lName</td>
                    <td>$fName</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="requires/OwnerTabs/newSubCategory.php">Add a subCategory</a>
</div>


