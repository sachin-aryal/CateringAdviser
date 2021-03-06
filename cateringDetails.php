<?php
$editOption = false;
if(!isset($_GET["id"])){
    header("Location:search.php");
}else{
    include "_header.php";
    $id = $_GET["id"];
    $cateringInfo = getCateringInfo($id);
    $contact = $cateringInfo["contact"];
    $venue = $cateringInfo["venue"];
    $facility = $cateringInfo["facility"];
    $menu = $cateringInfo["menu"];
    $price = $cateringInfo["price"];
    if(isset($_SESSION["user_id"]) && ($contact["user_id"] == $_SESSION["user_id"])){
        $editOption = true;
    }
}
?>
<html>
<head>
    <title>Catering Adviser</title>
    <script type="text/javascript">
        function changePrice(){
            var noOfPeople = $("#no_of_people").val();
            var catering_id = "<?php echo $contact["id"] ?>";
            var data = {no_of_people:noOfPeople,catering_id:catering_id};
            $.ajax({
                url:"controller/priceCalculation.php",
                type:"POST",
                data:data,
                success:function (data) {
                    $("#totalCost").val(noOfPeople*data);
                }
            });



        }
    </script>
</head>
<body>
<div class="container">
    <div class="row well">
        <div class="col-md-4">
            <img class="logo" src="<?php echo $contact["logo"] ?>"/>
        </div>
        <div class="col-md-3">
            <p><?php echo $contact["catering_name"] ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p>Location:<?php echo $contact["zone"]."/".$contact["district"]."/".$contact["area"]."/".$contact["street"] ?></p>
            <p>Contact:<?php
                echo $contact["phone_no1"];
                if($contact["phone_no2"] != ""){
                    echo "/".$contact["phone_no2"];
                }
                ?>
            </p>
            <p>Email:<?php echo $contact["email_id"] ?></p>
            <p>Website:<?php echo $contact["website"]?$contact["website"]:"N/A" ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p>Contact Person:<?php echo $contact["first_name"]." ". $contact["last_name"]." - ".$contact["designation"]?></p>
            <p>Nearest Landmark: <?php echo $contact["nearest_landmark"] ?></p>
            <p>Building: <?php echo $contact["building"] ?></p>
            <p>Floor: <?php echo $contact["floor"] ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p>Opening Time: <?php echo $venue["opening_time"] ?> | Closing Time: <?php echo $venue["closing_time"] ?>
                | Music End: <?php echo $venue["music_end"] ?></p>
            <p>Indoor Size: <?php echo $venue["indoor_size"] ?> | Max Capacity: <?php echo $venue["i_max_capacity"] ?></p>
            <p>Outdoor Size: <?php echo $venue["outdoor_size"] ?> | Max Capacity: <?php echo $venue["o_max_capacity"] ?></p>
            <p>Venue Size: <?php echo $venue["venue_size"] ?> | No of Halls: <?php echo $venue["no_of_halls"] ?></p>
            <p>No Of Servers: <?php echo $venue["no_of_servers"] ?> | No of Bar: <?php echo $venue["no_of_bars"] ?></p>
            <p>No Of Helpers: <?php echo $venue["no_of_helpers"] ?> | No of Cooks: <?php echo $venue["no_of_cooks"] ?></p>
            <p>No Of Cleaners: <?php echo $venue["no_of_cleaners"] ?> | No of Guards: <?php echo $venue["no_of_guards"]?> | No of Others: <?php echo $venue["no_of_others"]?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <?php
            if(sizeof($facility) >0 ){
                echo "<ol>Facilities";
                foreach ($facility as $eachFacility){
                    echo "<li>".$eachFacility["name"]."</li>";
                }
                echo "</ol>";
            }
            ?>
        </div>
    </div>
    <hr>
    <?php
    if(sizeof($menu) > 0){
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
        <div class="row">
            <div class="col-md-6">
                <h3>Snacks Non-Veg</h3>
                <p><?php echo $nonVegSnacks ?></p>
            </div>
            <div class="col-md-6">
                <h3>Snacks Veg</h3>
                <p><?php echo $vegSnacks ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h3>Main Course Non-Veg</h3>
                <p><?php echo $mainCourseNonVeg ?></p>
            </div>
            <div class="col-md-6">
                <h3>Main Course Veg</h3>
                <p><?php echo $mainCourseVeg ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h3>Salad</h3>
                <p><?php echo $salad ?></p>
            </div>
            <div class="col-md-6">
                <h3>Pickles</h3>
                <p><?php echo $pickles ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <h3>Soft Drinks</h3>
                <p><?php echo $softDrinks ?></p>
            </div>
            <div class="col-md-4">
                <h3>Hard Drinks</h3>
                <p><?php echo $hardDrinks ?></p>
            </div>
            <div class="col-md-4">
                <h3>Hot Drinks</h3>
                <p><?php echo $hotDrinks ?></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <h3>Soup</h3>
                <p><?php echo $soup ?></p>
            </div>
            <div class="col-md-4">
                <h3>BBQ</h3>
                <p><?php echo $bbq ?></p>
            </div>
        </div>
        <hr>
        <div id="priceRange">
            <h3>Price Range</h3>
            <?php
            foreach ($price as $pRange) {
                ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="no_of_people_start">Number of People(Start)</label>
                            <input readonly="readonly" class="form-control" type="number"
                                   value="<?php echo $pRange["no_of_people_start"] ?>" id="no_of_people_start"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="no_of_people_start">Number of People(End)</label>
                            <input readonly="readonly" class="form-control" type="number"
                                   value="<?php echo $pRange["no_of_people_end"] ?>" id="no_of_people_end"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="price">Price(NRs)</label>
                            <input readonly="readonly" class="form-control" type="number"
                                   value="<?php echo $pRange["price"] ?>" id="price"/>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>No of People</label>
                    <input type="number" onkeyup="changePrice()" name="no_of_people" id="no_of_people" class="form-control"/>
                </div>
            </div>
            <div class="col-md-6">
                <label>Total Cost (NRs)</label>
                <input type="number" id="totalCost" class="form-control" readonly="readonly"/>
            </div>
        </div>
        <hr>
        <br>
        <?php
        if($editOption){
            echo '<a class="btn btn-info" href="editCatering.php?id='.$contact["id"].'">Edit</a>|';
            echo '<a class="btn btn-danger" href="deleteCatering.php?id='.$contact["id"].'">Delete</a>';
        }
    }
    ?>
</div>
</body>
</html>
