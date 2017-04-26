<?php
require_once "Common.php";
?>
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<?php
if(!isset($_SESSION["username"])) {
    $textMessage = "Member";
    createAdminRole();
}else{
    $textMessage = "Welcome ".$_SESSION["username"];
}
?>
<script type="text/javascript">
    function changePassword(){
        var oldPassword = $("#oldPassword").val();
        var newPassword = $("#newPassword").val();
        var data = {oldPassword:oldPassword,newPassword:newPassword};
        $.ajax({
            type: "POST",
            url: "controller/changePassword.php",
            data: data,
            success:function(data){
                console.log(data);
                data = JSON.parse(data);
                if(data.success == true){
                    alert(data.message+"\nPlease login with new password.");
                    window.location = "controller/logout.php"
                }else{
                    alert(data.message);
                }
            },
            error:function(err){
                alert("Internal Server Error.")
            }
        });
    }
</script>
<?php
if(isset($_POST["loginButton"])){
    $loginResult = checkLogin();
    if($loginResult == "true"){
        header("Location:index.php");
        return;
    }else{
        if($loginResult != "false"){
            $loginMessage = "Your account is not activated my admin.";
        }else{
            $loginMessage = "Username and Password did not match.";
        }
        ?>
        <script type="text/javascript">
            $(function(){
                $("#loginForm").append("<br><span class='alert alert-danger'><?php echo $loginMessage; ?></span>");
                $("#loginFormModal").modal("show");
            });
        </script>
        <?php

    }
}
if(isset($_POST["registerButton"])) {
    $newUser = createNewUser();
    if ($newUser == "User created successfully.") {
        ?>
        <script type="text/javascript">
            $(function(){
                $("#registerForm").append("<br><span class='alert alert-info'>" +
                    "<?php echo 'User created successfully. Admin will verify the account sometime later.' ?>" +
                    "</span>");
                $("#registerFormModal").modal("show");
            });
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            $(function() {
                $("#registerForm").append("<br><span class='alert alert-danger'>" +
                    "<?php echo $newUser; ?>" +
                    "</span>");
                $("#registerFormModal").modal("show");
            });
        </script>
        <?php
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar" style="background-color:rgba(34, 3, 34, 0.8);" role="navigation">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Catering Advisor</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="#">Comparision</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $textMessage ?>  <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            if(!isset($_SESSION["username"])) {
                                ?>
                                <li><a style="cursor: pointer" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#loginFormModal">Login</a></li>
                                <li><a style="cursor: pointer" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#registerFormModal">Register</a></li>
                                <?php
                            }else{
                                if($_SESSION["role"] == "catering") {
                                    ?>
                                    <li><a href='catering.php'>New Catering</a></li>;
                                    <li><a href='myCatering.php'>My Catering</a></li>;
                                    <?php
                                }else if ($_SESSION["role"] == "admin"){
                                    ?>
                                    <li><a href='pendingUsers.php'>Pending Users</a></li>;
                                    <?php
                                }
                                ?>
                                <li><a style="cursor: pointer" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#changePassword">Change Password</a></li>
                                <li><a href="controller/logout.php">Logout</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div id="loginFormModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="form" method="post" action="">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" id="username" name="username" placeholder="Username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <br><input type="submit" value="Login" name="loginButton" class="btn btn-default"/>
                        </div>
                        <div class="form-group">
                            <a style="cursor: pointer" href="forgetPassword.php">Forget Password</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="registerFormModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="" autocomplete="off" class="form" id="registerForm">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" id="username" name="username" placeholder="Username" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="phoneNO">Phone Number</label>
                            <input type="text" id="phoneNo" name="phoneNo" placeholder="Phone Number" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <br><input type="submit" value="Register" name="registerButton" class="btn btn-default"/>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="changePassword" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm" class="form" method="post" action="">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">Old Password</label>
                            <input type="password" id="oldPassword" name="oldPassword" placeholder="Old Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <br><input onclick="changePassword();" type="button" value="Change" name="changeButton" class="btn btn-default"/>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>