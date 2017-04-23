<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/22/17
 * Time: 7:16 PM
 */
require "Common.php";

$fId = $_POST["fId"];
$sId = $_POST["sId"];
$firstCatering = getCateringInfo($fId);
$secondCatering = getCateringInfo($sId);


$contact1 = $firstCatering["contact"];
$venue1 = $firstCatering["venue"];
$facility1 = $firstCatering["facility"];
$menu1 = $firstCatering["menu"];
$price1 = $firstCatering["price"];
//$averagePrice1 = $firstCatering["price"]/$price1["no_of_people"];


$contact2 = $secondCatering["contact"];
$venue2 = $secondCatering["venue"];
$facility2 = $secondCatering["facility"];
$menu2 = $secondCatering["menu"];
$price2 = $secondCatering["price"];
//$averagePrice1 = $firstCatering["price"]/$price1["no_of_people"];

?>

<div class="row">
    <div class="col-md-6">
        <h2><?php echo $contact1["catering_name"] ?></h2>
        <hr>
        <div class="row">
            <h2>Venue Size</h2>
            <p>Indoor:<?php echo $venue1['indoor_size']?"Yes":"No"  ?></p>
            <p>Outdoor:<?php echo $venue1['outdoor_size']?"Yes":"No"  ?></p>
            <p>Parking:
                <?php
                $isParking = false;
                foreach ($facility1 as $eachFacility){
                   if($eachFacility["name"] == "Parking"){
                       $isParking = true;
                       break;
                   }
                }
                echo $isParking?"Yes":"No";
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Staff Numbers</h3>
            <p>No of Cooks: <?php echo $venue1["no_of_cooks"] ?></p>
            <p>No of Servers: <?php echo $venue1["no_of_servers"] ?></p>
            <p>No of Helpers: <?php echo $venue1["no_of_helpers"] ?></p>
            <p>No of Cleaners: <?php echo $venue1["no_of_cleaners"] ?></p>
            <p>No of Guards: <?php echo $venue1["no_of_guards"] ?></p>
        </div>
        <?php
        $vegSnacks = "";$nonVegSnacks="";
        $mainCourseVeg = "";$mainCourseNonVeg="";
        $salad = "";$pickles="";
        $softDrinks = "";$hardDrinks="";$hotDrinks="";
        $soup = "";$bbq = "";
        foreach ($menu1 as $menuItems){
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
        <hr>
        <div class="row">
            <h3>Snacks Non Veg</h3>
            <p><?php
                $nonVegSnacksEach = explode(",",$nonVegSnacks);
                foreach ($nonVegSnacksEach as $nVs){
                    echo $nVs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Snacks Veg</h3>
            <p><?php
                $vegSnacksEach = explode(",",$vegSnacks);
                foreach ($vegSnacksEach as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Main Course Non Veg</h3>
            <p><?php
                $mainCourseNonVeg = explode(",",$mainCourseNonVeg);
                foreach ($mainCourseNonVeg as $nVs){
                    echo $nVs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Main Course Veg</h3>
            <p><?php
                $mainCourseVeg = explode(",",$mainCourseVeg);
                foreach ($mainCourseVeg as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Beverage Soft</h3>
            <p><?php
                $softDrinks = explode(",",$softDrinks);
                foreach ($softDrinks as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Beverage Hard</h3>
            <p><?php
                $hardDrinks = explode(",",$hardDrinks);
                foreach ($hardDrinks as $nVs){
                    echo $nVs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Beverage Hot</h3>
            <p><?php
                $hotDrinks = explode(",",$hotDrinks);
                foreach ($hotDrinks as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Salad</h3>
            <p><?php
                $salad = explode(",",$salad);
                foreach ($salad as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Pickles</h3>
            <p><?php
                $pickles = explode(",",$pickles);
                foreach ($pickles as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Soup</h3>
            <p><?php
                $soup = explode(",",$soup);
                foreach ($soup as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>BBQ</h3>
            <p><?php
                echo $bbq;
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Facilities</h3>
            <p>
                <?php
                foreach ($facility1 as $eachFacility){
                    echo "<li>".$eachFacility["name"]."</li>";
                }
                ?>
            </p>
        </div>
    </div>
    <div class="col-md-6">
        <h2><?php echo $contact2["catering_name"] ?></h2>
        <hr>
        <div class="row">
            <h2>Venue Size</h2>
            <p>Indoor:<?php echo $venue2['indoor_size']?"Yes":"No"  ?></p>
            <p>Outdoor:<?php echo $venue2['outdoor_size']?"Yes":"No"  ?></p>
            <p>Parking:
                <?php
                $isParking = false;
                foreach ($facility2 as $eachFacility){
                    if($eachFacility["name"] == "Parking"){
                        $isParking = true;
                        break;
                    }
                }
                echo $isParking?"Yes":"No";
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Staff Numbers</h3>
            <p>No of Cooks: <?php echo $venue2["no_of_cooks"] ?></p>
            <p>No of Servers: <?php echo $venue2["no_of_servers"] ?></p>
            <p>No of Helpers: <?php echo $venue2["no_of_helpers"] ?></p>
            <p>No of Cleaners: <?php echo $venue2["no_of_cleaners"] ?></p>
            <p>No of Guards: <?php echo $venue2["no_of_guards"] ?></p>
        </div>
        <?php
        $vegSnacks = "";$nonVegSnacks="";
        $mainCourseVeg = "";$mainCourseNonVeg="";
        $salad = "";$pickles="";
        $softDrinks = "";$hardDrinks="";$hotDrinks="";
        $soup = "";$bbq = "";
        foreach ($menu2 as $menuItems){
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
        <hr>
        <div class="row">
            <h3>Snacks Non Veg</h3>
            <p><?php
                $nonVegSnacksEach = explode(",",$nonVegSnacks);
                foreach ($nonVegSnacksEach as $nVs){
                    echo $nVs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Snacks Veg</h3>
            <p><?php
                $vegSnacksEach = explode(",",$vegSnacks);
                foreach ($vegSnacksEach as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Main Course Non Veg</h3>
            <p><?php
                $mainCourseNonVeg = explode(",",$mainCourseNonVeg);
                foreach ($mainCourseNonVeg as $nVs){
                    echo $nVs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Main Course Veg</h3>
            <p><?php
                $mainCourseVeg = explode(",",$mainCourseVeg);
                foreach ($mainCourseVeg as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Beverage Soft</h3>
            <p><?php
                $softDrinks = explode(",",$softDrinks);
                foreach ($softDrinks as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Beverage Hard</h3>
            <p><?php
                $hardDrinks = explode(",",$hardDrinks);
                foreach ($hardDrinks as $nVs){
                    echo $nVs."<br>";
                }
                ?>
            </p>
        </div>
        <hr>
        <div class="row">
            <h3>Beverage Hot</h3>
            <p><?php
                $hotDrinks = explode(",",$hotDrinks);
                foreach ($hotDrinks as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Salad</h3>
            <p><?php
                $salad = explode(",",$salad);
                foreach ($salad as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Pickles</h3>
            <p><?php
                $pickles = explode(",",$pickles);
                foreach ($pickles as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Soup</h3>
            <p><?php
                $soup = explode(",",$soup);
                foreach ($soup as $Vs){
                    echo $Vs."<br>";
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h3>BBQ</h3>
            <p><?php
                echo $bbq;
                ?>
            </p>
        </div>
        <div class="row">
            <h3>Facilities</h3>
            <p>
                <?php
                foreach ($facility2 as $eachFacility){
                    echo "<li>".$eachFacility["name"]."</li>";
                }
                ?>
            </p>
        </div>
    </div>
</div>
