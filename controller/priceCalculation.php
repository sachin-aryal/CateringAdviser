<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 5/1/17
 * Time: 1:37 PM
 */
require_once "../Common.php";
$noOfPeople = $_POST["no_of_people"];
$catering_id = $_POST["catering_id"];
$price = getPriceByPeople($noOfPeople,$catering_id);
echo $price;