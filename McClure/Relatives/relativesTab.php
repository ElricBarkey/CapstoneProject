<?php

//Define a query
$sql = "SELECT * FROM clients WHERE `clientID`='".$_SESSION['ClientID']."';";
//Send the query to the db
$result = mysqli_query($cnxn, $sql);

$sql = "SELECT * FROM relatives WHERE `clientID`='".$_SESSION['ClientID']."';";
$result = mysqli_query($cnxn, $sql);

?>

<div id="main" class="container">
    <table class="table" id="clientInfoTable">
        <thead>
        <tr>
            <th scope="col">relativeID</th>
            <th scope="col">clientID</th>
            <th scope="col">Last Name</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">suffix</th>
            <th scope="col">preferred</th>
            <th scope="col">address1</th>
            <th scope="col">address2</th>
            <th scope="col">city</th>
            <th scope="col">state</th>
            <th scope="col">zip</th>
            <th scope="col">phone</th>
            <th scope="col">relationship</th>
            <th scope="col">comment_</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach ($result as $row) {
            $_SESSION['relativeID'] = $row['relativeID'];
            $clientID = $row['clientID'];
            $lName = $row['lName'];
            $fName = $row['fName'];
            $mName = $row['mName'];
            $suffix = $row['suffix'];
            $preferred = $row['preferred'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $phone = $row['phone'];
            $relationship = $row['relationship'];
            $comment_ = $row['comment_'];

            echo "
                <tr>
                    <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Relatives/newRelative.php?actionID=".$_SESSION['relativeID']."'>".$_SESSION['relativeID']."</td>
                    <td>$clientID</td>
                    <td>$lName</td>
                    <td>$fName</td>
                    <td>$mName</td>
                    <td>$suffix</td>
                    <td>$preferred</td>
                    <td>$address1</td>
                    <td>$address2</td>
                    <td>$city</td>
                    <td>$state</td>
                    <td>$zip</td>
                    <td>$phone</td>
                    <td>$relationship</td>
                    <td>$comment_</td>
                    <td><a href='https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Relatives/newRelative.php?actionID=".$_SESSION['relativeID']."&delete=true' onclick='return confirm(\"Are you sure you want to delete?\")'>Delete</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="https://bhalbert2.greenriverdev.com/CapstoneProject/McClure/Relatives/newRelative.php">Add a Relative</a>
</div>