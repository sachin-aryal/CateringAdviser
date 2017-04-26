<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/25/17
 * Time: 8:46 AM
 */
include "_header.php";
?>

<html>
<head>
    <title>Forget Password - Catering Adviser</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 well">
            <?php
            if(isset($_SESSION["message"])){
                echo "<p>".$_SESSION["message"]."</p>";
                $_SESSION["message"] = null;
            }
            ?>
            <form method="post" action="controller/forgetPassword.php" class="form">
                <fieldset>
                    <legend>Forget Password</legend>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-default"/>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</body>
</html>

