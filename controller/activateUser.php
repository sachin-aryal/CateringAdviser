<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/14/17
 * Time: 2:39 PM
 */
include "../Common.php";
activateUsers();
header("Location: ../pendingUsers.php?message=Account activated successfully.");
