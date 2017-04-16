<?php
/**
 * Created by PhpStorm.
 * User: iam
 * Date: 4/8/17
 * Time: 12:48 PM
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function getConnection(){
    $conn = mysqli_connect("localhost","root","root","CateringManagement");
    return $conn;
}

function createNewUser(){
    $username = $_POST["username"];
    $phoneNo = $_POST["phoneNo"];
    if(checkUserName($username)){
        return "Username already exists.";
    }
    $password = crypt($_POST["password"],'cateringadviser');
    $role = "catering";
    $newUserQuery = "INSERT INTO users(username,password,role,phone_no) VALUES ('$username','$password',
                      '$role','$phoneNo')";
    $connection = getConnection();
    if($connection->query($newUserQuery)){
        return "User created successfully.";
    }else{
        return "Error while creating new user.".$connection->error;
    }
}

function createAdminRole(){
    $username = "admin@gmail.com";
    $phoneNo = "admin";
    if(checkUserName($username)){
        return "Username already exists.";
    }
    $password = crypt("admin",'cateringadviser');
    $role = "admin";
    $newUserQuery = "INSERT INTO users(username,password,role,phone_no,enabled) VALUES ('$username','$password',
                      '$role','$phoneNo',1)";
    $connection = getConnection();
    if($connection->query($newUserQuery)){
        return "User created successfully.";
    }else{
        return "Error while creating new user.".$connection->error;
    }
}

function checkUserName($username){
    $connection = getConnection();
    $result = $connection->query("SELECT *FROM users where username = '$username'");
    if($result->num_rows){
        return true;
    }else{
        return false;
    }
}


function checkLogin(){
    $username = $_POST["username"];
    $password = crypt($_POST["password"],'cateringadviser');
    $loginQuery = "SELECT *FROM users where username = '$username' AND password = '$password'";
    $connection = getConnection();
    $result = $connection->query($loginQuery);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row["enabled"] == 0){
            return "Account still not activated.";
        }
        $role = $row["role"];
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $role;
        $_SESSION["user_id"] = $row["id"];
        $connection->close();
        return "true";
    }else{
        $connection->close();
        return "false";
    }
}

function redirectIfLogin(){
    if(isset($_SESSION["username"])){
        header("Location:index.php");
    }
}


function storeCatering(){
    $cateringId = saveCateringInfo();
    if($cateringId == -1){
        echo "Error storing catering information. Try again later.";
    }else{
        saveVenueInfo($cateringId);
        saveFacility($cateringId);
        saveFoodMenu($cateringId);
    }
}

function saveCateringInfo(){
    $cateringName = $_POST["cateringName"];
    $establishDate = $_POST["establishDate"];
    $pan = $_POST["pan"];
    $vat = $_POST["vat"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $designation = $_POST["designation"];
    $phoneNo1 = $_POST["phoneNo1"];
    $phoneNo2 = $_POST["phoneNo2"];
    $emailId = $_POST["emailId"];
    $website = $_POST["website"];
    $zone = $_POST["zone"];
    $district = $_POST["district"];
    $area = $_POST["area"];
    $street = $_POST["street"];
    $nearestLandmark = $_POST["nearestLandmark"];
    $building = $_POST["building"];
    $floor = $_POST["floor"];
    $userId = $_SESSION["user_id"];
    $logoName = uploadLogo();

    $newCatering = "INSERT INTO catering(catering_name,established_date,pan_no,vat_no,first_name,last_name,
                    designation,phone_no1,phone_no2,email_id,website,zone,district,area,street,nearest_landmark,
                    building,floor,logo,user_id) VALUES ('$cateringName','$establishDate','$pan','$vat','$firstName','$lastName',
                    '$designation','$phoneNo1','$phoneNo2','$emailId','$website','$zone','$district','$area','$street',
                    '$nearestLandmark','$building','$floor','$logoName',$userId)";

    $connection = getConnection();
    if($connection->query($newCatering)){
        $cateringId = $connection->insert_id;
    }else{
        $cateringId = -1;
    }
    $connection->close();
    return $cateringId;
}

function saveVenueInfo($cateringId){
    $openingTime = $_POST["openingTime"];
    $closingTime = $_POST["closingTime"];
    $musicEnd = $_POST["musicEnd"];
    $indoorSize = $_POST["indoorSize"];
    $iMaxCapacity = $_POST["iMaxCapacity"];
    $outdoorSize = $_POST["outdoorSize"];
    $oMaxCapacity = $_POST["oMaxCapacity"];
    $venueSize = $_POST["venueSize"];
    $noOfHall = $_POST["noOfHall"];
    $parkingSize = $_POST["parkingSize"];
    $noOfServers = $_POST["noOfServers"];
    $noOfBar = $_POST["noOfBar"];
    $noOfHelpers = $_POST["noOfHelpers"];
    $noOfCooks = $_POST["noOfCooks"];
    $noOfCleaners = $_POST["noOfCleaners"];
    $noOfOthers = $_POST["noOfOthers"];
    $noOfGuards = $_POST["noOfGuards"];

    $venueQuery = "INSERT INTO venue(opening_time,closing_time,music_end,indoor_size,i_max_capacity,outdoor_size,o_max_capacity,venue_size,no_of_halls,
                  parking_size,no_of_servers,no_of_bars,no_of_helpers,no_of_cooks,no_of_cleaners,no_of_others,no_of_guards,catering_id) 
                  VALUES ('$openingTime','$closingTime','$musicEnd','$indoorSize',$iMaxCapacity,'$outdoorSize',$oMaxCapacity,'$venueSize',$noOfHall,
                  '$parkingSize',$noOfServers,$noOfBar,$noOfHelpers,$noOfCooks,$noOfCleaners,$noOfOthers,$noOfGuards,$cateringId)";

    $connection = getConnection();
    $connection->query($venueQuery);
    $connection->close();
}

function saveFacility($cateringId){
    if(isset($_POST['facility'])) {
        $facilities = $_POST["facility"];
        $connection = getConnection();
        foreach ($facilities as $facility) {
            $facilityQuery = "INSERT INTO facility(catering_id,name) VALUES ($cateringId,'$facility')";
            $connection->query($facilityQuery);
        }
        $connection->close();
    }
}

function saveFoodMenu($cateringId){
    $vegSnacks = $_POST["vegSnacks"];
    $nonVegSnacks = $_POST["nonVegSnacks"];
    $vegMainCourse = $_POST["vegMainCourse"];
    $nonVegMainCourse = $_POST["nonVegMainCourse"];
    $salad = $_POST["salad"];
    $pickles = $_POST["pickles"];
    $softDrinks = $_POST["softDrinks"];
    $hardDrinks = $_POST["hardDrinks"];
    $hotDrinks = $_POST["hotDrinks"];
    $soup = $_POST["soup"];
    $noOfPeople = $_POST["noOfPeople"];
    $price = $_POST["price"];

    $connection = getConnection();
    $vegSnacks == ""?:insertToFoodMenu("Veg Snacks",$vegSnacks,$connection,$cateringId);
    $nonVegSnacks == ""?:insertToFoodMenu("Non-Veg Snacks",$nonVegSnacks,$connection,$cateringId);
    $vegMainCourse == ""?:insertToFoodMenu("Veg Main Course",$vegMainCourse,$connection,$cateringId);
    $nonVegMainCourse == ""?:insertToFoodMenu("Non-Veg Main Course",$nonVegMainCourse,$connection,$cateringId);
    $salad == ""?:insertToFoodMenu("Salad",$salad,$connection,$cateringId);
    $pickles == ""?:insertToFoodMenu("Pickles",$pickles,$connection,$cateringId);
    $softDrinks == ""?:insertToFoodMenu("Soft Drinks",$softDrinks,$connection,$cateringId);
    $hardDrinks == ""?:insertToFoodMenu("Hard Drinks",$hardDrinks,$connection,$cateringId);
    $hotDrinks == ""?:insertToFoodMenu("Hot Drinks",$hotDrinks,$connection,$cateringId);
    $soup == ""?:insertToFoodMenu("Soup",$soup,$connection,$cateringId);
    isset($_POST["bbq"])?insertToFoodMenu("BBQ","Yes",$connection,$cateringId):insertToFoodMenu("BBQ","No",$connection,$cateringId);

    $priceQuery = "INSERT INTO price VALUES (NULL, $noOfPeople,$price,$cateringId)";
    $connection->query($priceQuery);
}

function insertToFoodMenu($category,$items,$connection,$cateringId){
    $foodMenuQuery = "INSERT INTO menu VALUES (NULL, '$category',$cateringId,'$items')";
    $connection->query($foodMenuQuery);
}

function uploadLogo(){
    $target_dir = "uploads/";
    $target_file = $target_dir . $_POST["cateringName"]."_".generateRandomString()."_logo.jpg";
    if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
        $logoName = $target_file;
    } else {
        $logoName = "Not Available.";
    }
    return $logoName;
}

function fetchAllPendingUsers(){
    $pendingUsers = "SELECT *FROM users where enabled = 0";
    $connection = getConnection();
    $result = $connection->query($pendingUsers);
    $data = array();
    $index = 0;
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $data[$index++] = $row;
        }
    }
    return $data;
}

function activateUsers(){
    $id = $_GET["id"];
    $activateQuery = "UPDATE users set enabled = 1 where id = $id";
    $connection = getConnection();
    $connection->query($activateQuery);
    return 0;
}


function cateringList(){
    $cateringList = "SELECT *FROM catering";
    $connection = getConnection();
    $result = $connection->query($cateringList);
    $data = array();
    $index = 0;
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $data[$index++] = $row;
        }
    }
    return $data;
}

function getCateringInfo($id){
    $data = array();
    $contactInfo = getCateringContactInfo($id);
    $venueInfo = getVenueInfo($id);
    $facilityInfo = getFacilityInfo($id);
    $menuInfo = getMenuInfo($id);
    $priceInfo = getPriceInfo($id);
    $data["contact"] = $contactInfo;
    $data["venue"] = $venueInfo;
    $data["facility"] = $facilityInfo;
    $data["menu"] = $menuInfo;
    $data["price"] =$priceInfo;
    return $data;
}

function getCateringContactInfo($id){
    $contactInfo = "SELECT *FROM catering where id = $id";
    $connection = getConnection();
    $result = $connection->query($contactInfo);
    return $result->fetch_assoc();
}

function getVenueInfo($id){
    $venueInfo = "SELECT *FROM venue where catering_id = $id";
    $connection = getConnection();
    $result = $connection->query($venueInfo);
    return $result->fetch_assoc();
}

function getFacilityInfo($id){
    $facilityInfo = "SELECT *FROM facility where catering_id=$id";
    $connection = getConnection();
    $result = $connection->query($facilityInfo);
    if($result->num_rows > 0){
        $data = array();
        $i=0;
        while ($row = $result->fetch_assoc()){
            $data[$i++] = $row;
        }
        return $data;
    }
    return array();
}

function getMenuInfo($id){
    $menuInfo = "SELECT *FROM menu where catering_id=$id";
    $connection = getConnection();
    $result = $connection->query($menuInfo);
    if($result->num_rows > 0){
        $data = array();
        $i=0;
        while ($row = $result->fetch_assoc()){
            $data[$i++] = $row;
        }
        return $data;
    }
    return array();
}

function getPriceInfo($id){
    $priceInfo = "SELECT *FROM price where catering_id=$id";
    $connection = getConnection();
    $result = $connection->query($priceInfo);
    return $result->fetch_assoc();
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>