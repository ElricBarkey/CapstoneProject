<?php
//Define a query
$sql = "SELECT Cases.*, clients.*, category.* 
FROM Cases 
	INNER JOIN clients ON clients.clientID = Cases.clientID 
INNER JOIN category ON Cases.categoryID = category.categoryID
ORDER BY Cases.caseID;";

//Send the query to the db
$result = mysqli_query($cnxn, $sql);

?>
<table class="table" id="searchBar">
    <thead>
    <tr>
        <th scope="col">Case Name</th>
        <th scope="col">Client Name</th>
        <th scope="col">Category</th>
        <th scope="col">Load Info</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($result as $row) {
        $caseID = $row['caseID'];
        $_SESSION['caseID'] = $row['caseID']; //needed for newPurgatory

        $name = $row['caseName'];
        $clientName = $row['fName'] . " " . $row['lName'];
        $categoryName = $row['categoryName'];
        echo "
            <tr>
                <td>".$name."</td>
                <td>".$clientName."</td>
                <td>".$categoryName."</td>
                <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Controllers/caseController.php?caseTab=general&CaseID=".$caseID."'><button>Load</button></a></td>
            </tr>";
    }
    ?>
    </tbody>
</table>
