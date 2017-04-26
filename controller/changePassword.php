<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/25/17
 * Time: 8:26 AM
 */

require "../Common.php";
$changeResult = changePassword();
echo json_encode($changeResult);
return;

