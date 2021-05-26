<?php

//Define a query
$sql = "SELECT * FROM `purgatory`;";
//echo $sql;
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

?>
<div id="main" class="container">
    <table class="table" id="test">
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
            $_SESSION['pClientID'] = $row['clientID'];
            $lName = $row['lName'];
            $fName = $row['fName'];
            echo "
                <tr>
                    <td><a href='newPurgatory2.php?clientID=$clientID'>$clientID</td>
                    <td>$lName</td>
                    <td>$fName</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="newSubCategory.php">Add a subCategory</a>
</div>


