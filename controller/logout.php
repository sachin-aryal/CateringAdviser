<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/12/17
 * Time: 10:22 PM
 */
session_start();
session_destroy();
header("Location:../index.php");