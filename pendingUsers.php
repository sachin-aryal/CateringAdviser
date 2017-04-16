<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/8/17
 * Time: 12:42 PM
 */

include "_header.php";
if($_SESSION["role"] != "admin"){
    header("Location:index.php");
}
$pendingUsers = fetchAllPendingUsers();
?>
<html>
<head>
    <title>Pending Users - Catering Adviser</title>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#pendingUsers').DataTable();
        });
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table id="pendingUsers" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($pendingUsers as $pendingUser){
                        echo "<tr>";
                        echo "<td>".$pendingUser["username"]."</td>";
                        echo "<td>".$pendingUser["phone_no"]."</td>";
                        echo "<td><a href='controller/activateUser.php?id=".$pendingUser['id']."'>Activate</a></td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
