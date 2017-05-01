<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/23/17
 * Time: 6:09 PM
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_SESSION["role"] != "catering"){
    header("Location:index.php");
}
include "Common.php";

$cId = $_GET["id"];
$cateringInfo = getCateringInfo($cId);
$contact = $cateringInfo["contact"];
$venue = $cateringInfo["venue"];
$facility = $cateringInfo["facility"];
$menu = $cateringInfo["menu"];
$price = $cateringInfo["price"];
$averagePrice = $price["price"]/$price["no_of_people"];
if($contact["user_id"] != $_SESSION["user_id"]){
    header("Location:index.php");
}
include "_header.php";
include "_zoneAndDistrict.php";

$isEdit = true;
$vegSnacks = "";$nonVegSnacks="";
$mainCourseVeg = "";$mainCourseNonVeg="";
$salad = "";$pickles="";
$softDrinks = "";$hardDrinks="";$hotDrinks="";
$soup = "";$bbq = "";
foreach ($menu as $menuItems){
    $vegSnacks.=$menuItems["category"] == "Veg Snacks"?$menuItems["item_name"]:"";
    $nonVegSnacks.=$menuItems["category"] == "Non-Veg Snacks"?$menuItems["item_name"]:"";
    $mainCourseVeg.=$menuItems["category"] == "Veg Main Course"?$menuItems["item_name"]:"";
    $mainCourseNonVeg.=$menuItems["category"] == "Non-Veg Main Course"?$menuItems["item_name"]:"";
    $salad.=$menuItems["category"] == "Salad"?$menuItems["item_name"]:"";
    $pickles.=$menuItems["category"] == "Pickles"?$menuItems["item_name"]:"";
    $softDrinks.=$menuItems["category"] == "Soft Drinks"?$menuItems["item_name"]:"";
    $hardDrinks.=$menuItems["category"] == "Hard Drinks"?$menuItems["item_name"]:"";
    $hotDrinks.=$menuItems["category"] == "Hot Drinks"?$menuItems["item_name"]:"";
    $soup.=$menuItems["category"] == "Soup"?$menuItems["item_name"]:"";
    $bbq.=$menuItems["category"] == "BBQ"?$menuItems["item_name"]:"";
}

?>
    <html>
    <head>
        <title>Edit Catering - Catering Adviser</title>
        <script type="text/javascript">
            $(function(){
                $("#zone").val("<?php echo $contact['zone'] ?>");
                $("#district").val("<?php echo $contact['district'] ?>");
                <?php
                foreach ($facility as $fc){
                ?>
                $(":checkbox[value='<?php echo $fc["name"] ?>']").prop("checked","true");
                <?php
                }
                ?>

            });
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

            function anotherPriceRange(){
                var initialRange = $("#initialRange").clone();
                $("#priceRange").append(initialRange);
            }

        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <form action="" method="post" class="form" id="cateringForm" enctype="multipart/form-data">
                <input type="hidden" name="cId" id="cId" value="<?php echo $contact['id'] ?>"/>
                <div id="firstForm">
                    <?php include "_cateringForm.php"; ?>
                </div>
                <div id="secondForm" class="hide">
                    <?php include "_venue.php"; ?>
                </div>
                <div id="thirdForm" class="hide">
                    <?php include "_foodMenu.php"; ?>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default" name="cateringSubmit">Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>

<?php
if(isset($_POST["cateringSubmit"])){
    updateCatering();
}