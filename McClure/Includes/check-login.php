<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 2/27/2020
 * Time: 2:24 PM
 */

//If not logged in
if (!isset($_SESSION['un'])) {

    //Store current location
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    //Redirect to login page
    header("location: login.php");
}