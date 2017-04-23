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

        function checkCheckBox() {
            if($('input[class="comparisonCheck"]:checked').length == 2){
                $("#compareCaterings").submit();
            }
        }

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
                                    <label><input type="checkbox" name="cCatering[]" class="comparisonCheck" value="<?php echo $row["id"]?>" onclick="checkCheckBox()"/>Compare</label>
                                </div>
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
