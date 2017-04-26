<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/25/17
 * Time: 8:06 AM
 */
require "Common.php";

$cId = $_GET["id"];
$contactInfo = getCateringContactInfo($cId);

if((isset($_SESSION["user_id"])) && $contactInfo["user_id"] == $_SESSION["user_id"]){
    deleteCatering($cId);
    header("Location:myCatering.php");
    return;
}else{
    header("Location:cateringDetails.php?id=".$cId);
}