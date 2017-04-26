<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/23/17
 * Time: 9:21 AM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SESSION["role"] != "catering"){
    header("Location:index.php");
}
include "_header.php";
$cateringList = getMyCatering($_SESSION["user_id"]);
?>
<html>
<head>
    <title>Catering List - Catering Adviser</title>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cateringList").DataTable();
        });
    </script>
    <style>
        table,thead,th,tr,tbody,td{
            border-style: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="compare.php" id="compareCaterings">
                <table id="cateringList" class="table table-responsive">
                    <caption style="text-align: center">My Caterings</caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($cateringList as $row){
                        ?>
                        <tr>
                            <td><a href="cateringDetails.php?id=<?php echo $row["id"]?>"><img src="<?php echo $row["logo"]?>" class="logo"/></a></td>
                            <td>
                                <?php
                                echo $row["catering_name"]."<br>";
                                echo $row["zone"]."/".$row["district"]."/".$row["area"]."/".$row["street"]."<br>";
                                echo $row["phone_no1"];
                                if($row["phone_no2"] != ""){
                                    echo "/".$row["phone_no2"];
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
