<?php
?>
<div id="main" class="container">
    <table class="table" id="clientInfoTable">
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

foreach ($result as $row) {
    $_SESSION['escrowID'] = $row['escrowID'];
    $date = $row['date_'];
    $atty = $row['attyID'];
    $caseID = $row['caseID'];
    $action = $row['actionID'];
    $description = $row['description'];
    $checkNo = $row['CheckNo'];
    $amount = $row['amount'];
    echo "
        <tr>
            <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Escrow/Case_Escrow/newEscrow.php?escrowID=".$_SESSION['escrowID']."'>".$_SESSION['escrowID']."</td>
            <td>$date</td>
            <td>$atty</td>
            <td>$caseID</td>
            <td>$action</td>
            <td>$description</td>
            <td>$checkNo</td>
            <td>$amount</td>
            <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Escrow/Case_Escrow/newEscrow.php?escrowID=".$_SESSION['escrowID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
        </tr>
";
}
?>
        </tbody>
    </table>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Escrow/Case_Escrow/newEscrow.php">Add an Escrow</a>
</div>