<?php
//Define a query
$sql = "SELECT * FROM `clients`;";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>
<table class="table" id="searchBar">
    <thead>
    <tr>
        <th scope="col">Client Name</th>
        <th scope="col">Number</th>
        <th scope="col">Legal Service</th>
        <th scope="col">Load Info</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($result as $row) {
        $clientID = $row['clientID'];
        $_SESSION['pClientID'] = $row['clientID']; //needed for newPurgatory

        $fName = $row['fName'];
        $lName = $row['lName'];
        $clientNumber = $row['clientNumber'];
        $legalService = $row['legalService'];
        echo "
            <tr>
                <td>".$fName.", ".$lName."</td>
                <td>".$clientNumber."</td>
                <td>".$legalService."</td>
                <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/index.php?tab=general&ClientID=".$clientID."'><button>Load</button></a></td>
            </tr>";
    }
    ?>
    </tbody>
</table>
