<?php require "Common.php";?>
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Catering Adviser</a>
        </div>
        <ul class="nav navbar-nav" style="float: right">
            <li><a href="search.php">Search</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $textMessage ?>  <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php
                    if(!isset($_SESSION["username"])) {
                        ?>
                        <li><a style="cursor: pointer" data-toggle="modal" data-target="#loginFormModal">Login</a></li>
                        <li><a style="cursor: pointer" data-toggle="modal" data-target="#registerFormModal">Register</a></li>
                        <?php
                    }else{
                        if($_SESSION["role"] == "catering") {
                            ?>
                            <li><a href='catering.php'>New Catering</a></li>;
                            <?php
                        }else if ($_SESSION["role"] == "admin"){
                            ?>
                            <li><a href='pendingUsers.php'>Pending Users</a></li>;
                            <?php
                        }
                        ?>
                        <li><a href="controller/logout.php">Logout</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </div>
</nav>

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