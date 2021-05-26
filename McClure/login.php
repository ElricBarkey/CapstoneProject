<?php //STYLE TO PULL
/**
 *  File name & path
 *  Author
 *  Date
 *  Description
 */

if(isset($_SESSION)){
    include("Includes/clearSession.php");
}

//Start session
session_start();

//Initialize error flag
$err = false;
$username = "";

//if the form has been submitted
if(!empty($_POST)){
    //Get username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Dummy variables store these somewhere else
    $user = 'user';
    $pass = 'pass';

    if($username == $user && $password == $pass){

        //Store username in the session array
        $_SESSION['un'] = $username;

        //redirect user to signUp.php
        $page = isset($_SESSION['page']) ? $_SESSION['page'] : "index.php";
        header("location: $page");
    }
    else{

        //Set error flag to true;
        $err = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="icon" type="image/png" href="https://www.mcclurelawgroup.com/wp-content/uploads/2021/01/mcclure-logo-1-300x83.png">
    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container">

    <h1>Login Page</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" >
        </div>

        <?php
        if($err){
            echo '<span class="err">Incorrect login</span><br>';
        }
        ?>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</div>
</body>
</html>