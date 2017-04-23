<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/22/17
 * Time: 7:45 AM
 */
$caterings = $_POST["cCatering"];
if(sizeof($caterings) < 2){
    header("Location:search.php");
}
include "_header.php";

$cateringList = cateringList();

?>

<html>
<head>
    <title>Compare - Catering Adviser</title>
    <script type="text/javascript">
        $(function(){
            var fId = "<?php echo $caterings[0] ?>";
            var sId = "<?php echo $caterings[1] ?>";
            compareCatering(fId,sId);
            $("#fCatering").val(fId);
            $("#sCatering").val(sId);
        });

        function  compareCatering(fId,sId) {
            var data = {fId:fId,sId:sId};
            $.ajax({
                type:"POST",
                url:"compareResult.php",
                data:data,
                success:function (html) {
                    $("#comparisonResult").html(html);
                }
            })
        }


        function cateringChange() {
            compareCatering($("#fCatering").val(),$("#sCatering").val());
        }

    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 form-inline">
            <label for="fCatering">Select Catering</label>
            <select class="form-control" name="fCatering" id="fCatering" onchange="cateringChange()">
                <?php
                foreach ($cateringList as $catering){
                    echo "<option value='".$catering["id"]."'>".$catering["catering_name"]."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-6 form-inline">
            <label for="fCatering">Select Catering</label>
            <select class="form-control" name="sCatering" id="sCatering" onchange="cateringChange()">
                <?php
                foreach ($cateringList as $catering){
                    echo "<option value='".$catering["id"]."'>".$catering["catering_name"]."</option>";
                }
                ?>
            </select>
        </div>
        <div id="comparisonResult"></div>
    </div>
</div>
</body>
</html>
