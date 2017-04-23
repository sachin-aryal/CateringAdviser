<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/23/17
 * Time: 9:21 AM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SESSION["role"] != "catering"){
    header("Location:index.php");
}
include "_header.php";
