<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["username"])){
    header("Location:index.php");
}
include "_header.php";
include "_zoneAndDistrict.php";
?>
<html>
<head>
    <title>Add Catering - Catering Adviser</title>
    <script type="text/javascript">
        function nextVenueForm() {
            $("#firstForm").addClass("hide");
            $("#secondForm").removeClass("hide");
            $("#thirdForm").addClass("hide");
        }

        function previousCateringForm() {
            $("#firstForm").removeClass("hide");
            $("#secondForm").addClass("hide");
            $("#thirdForm").addClass("hide");
        }

        function nextFoodMenu() {
            $("#firstForm").addClass("hide");
            $("#secondForm").addClass("hide");
            $("#thirdForm").removeClass("hide");
        }

        function previousVenueForm() {
            $("#firstForm").addClass("hide");
            $("#secondForm").removeClass("hide");
            $("#thirdForm").addClass("hide");
        }
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <form action="" method="post" class="form" id="cateringForm" enctype="multipart/form-data">
            <div id="firstForm">
                <?php include "_cateringForm.php"; ?>
            </div>
            <div id="secondForm" class="hide">
                <?php include "_venue.php"; ?>
            </div>
            <div id="thirdForm" class="hide">
                <?php include "_foodMenu.php"; ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-default" name="cateringSubmit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
if(isset($_POST["cateringSubmit"])){
    storeCatering();
}
?>