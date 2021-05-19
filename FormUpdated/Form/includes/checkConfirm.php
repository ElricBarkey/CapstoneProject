<?php
if ($_SESSION['un'] != "hi") {

    //Redirect to login page
    header("location: form.php");
}