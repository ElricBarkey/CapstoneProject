<?php
session_start();
?>
<div id="main" class="container">
    <!-- Contact Information -->
    <table class="table" id="test">
        <thead>
        <tr>
            <th scope="col">escrowID</th>
            <th scope="col">Date</th>
            <th scope="col">Atty</th>
            <th scope="col">caseID</th>
            <th scope="col">Action</th>
            <th scope="col">Description</th>
            <th scope="col">CheckNo</th>
            <th scope="col">Amount</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
<?php

//Define a query
$sql = "SELECT * FROM `Escrow` WHERE `caseID`='".$_SESSION['caseID']."';";
//Send the query to the db
$result = mysqli_query($cnxn, $sql);
//var_dump($result);

foreach ($result as $row) {
    $escrowID = $row['escrowID'];
    $date = $row['date_'];
    $atty = $row['attyID'];
    $caseID = $row['caseID'];
    $action = $row['actionID'];
    $description = $row['description'];
    $checkNo = $row['CheckNo'];
    $amount = $row['amount'];
    echo "
        <tr>
            <td><a href='newEscrow.php?escrowID=$escrowID'>$escrowID</td>
            <td>$date</td>
            <td>$atty</td>
            <td>$caseID</td>
            <td>$action</td>
            <td>$description</td>
            <td>$checkNo</td>
            <td>$amount</td>
            <td><a href='http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newEscrow.php?escrowID=$escrowID&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
        </tr>
";
}
?>
        </tbody>
    </table>
    <a href="http://bhalbert2.greenriverdev.com/CapstoneProject/McClure/fresh/requires/caseTabs/newEscrow.php">Add a Slip</a>
</div>