<?php
include "_header.php";
$cateringList = cateringList();
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
        .logo {
            position: relative;
            width:  180px;
            height: 150px;
            background: no-repeat 50% 50%;
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table id="cateringList" class="table table-responsive">
                <caption style="text-align: center">Catering List</caption>
                <thead>
                <tr>
                    <th></th>
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
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" value="<?php echo $row["id"]?>"/>Compare</label>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
