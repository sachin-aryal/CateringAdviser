<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/25/17
 * Time: 8:52 AM
 */

require_once "../Common.php";
require_once('../phpMailer/class.phpmailer.php');
require_once("../phpMailer/class.smtp.php");
require '../phpMailer/PHPMailerAutoload.php';

$userName = $_POST["username"];
if(checkUserName($userName)){
    $result = resetPassword($userName);
    if($result["success"]){
        $password = $result["newPassword"];
        if(sendNewPassword($userName,$password)){
            $_SESSION["message"] = "New password is sent to your email.";
            header("Location:../forgetPassword.php");
        }else{
            $_SESSION["message"] = "Error while sending email. Please try again later.";
            header("Location:../forgetPassword.php");
        }
    }else{
        $_SESSION["message"] = "Internal server error. Try again later.";
        header("Location:../forgetPassword.php");
    }
}else{
    $_SESSION["message"] = "Invalid username. Try again later.";
    header("Location:../forgetPassword.php");
}


function sendNewPassword($username, $password){
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPSecure = 'tls';
    $mailer->Host = 'smtp.gmail.com';
    $mailer->Port = 587;
    $mailer->Username = 'saaryal51@gmail.com';
    $mailer->Password = 'majuwasachin69';
    $mailer->SMTPAuth = true;
    $mailer->From = 'saaryal51@gmail.com';
    $mailer->FromName = 'Catering Adviser';
    $mailer->Subject = 'Reset Password.';
    $mailer->Body = 'Hello '. $username."\n\n Your new password is ".$password."\n Thank You\n Catering Adviser Team";
    $mailer->ClearAddresses();
    $mailer->AddAddress($username);
    if($mailer->Send()){
        return true;
    }
    return false;
}