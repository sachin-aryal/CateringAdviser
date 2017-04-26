<div class="row">
    <h2>Venue Details</h2>
    <div class="form-group col-md-4">
        <label for="openingTime">Opening Time</label>
        <input type="text" value="<?php echo $venue['opening_time'] ?>" name="openingTime" id="openingTime" placeholder="Opening Time" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="closingTime">Closing Time</label>
        <input type="text" value="<?php echo $venue['closing_time'] ?>" name="closingTime" id="closingTime" placeholder="Closing Time" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="musicEnd">Music End</label>
        <input type="text" value="<?php echo $venue['music_end'] ?>" name="musicEnd" id="musicEnd" placeholder="Music End" class="form-control"/>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="indoorSize">Indoor Size</label>
        <input type="text" value="<?php echo $venue['indoor_size'] ?>" name="indoorSize" id="indoorSize" placeholder="Indoor Size" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="iMaxCapacity">Max Pax Capacity</label>
        <input type="text" value="<?php echo $venue['i_max_capacity'] ?>" name="iMaxCapacity" id="iMaxCapacity" placeholder="Max Pax Capacity" class="form-control"/>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="outdoorSize">Outdoor Size</label>
        <input type="text" value="<?php echo $venue['outdoor_size'] ?>" name="outdoorSize" id="outdoorSize" placeholder="Outdoor Size" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="oMaxCapacity">Max Pax Capacity</label>
        <input type="text" value="<?php echo $venue['o_max_capacity'] ?>" name="oMaxCapacity" id="oMaxCapacity" placeholder="Max Pax Capacity" class="form-control"/>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="venueSize">Venue Size</label>
        <input type="text" value="<?php echo $venue['venue_size'] ?>" name="venueSize" id="venueSize" placeholder="Venue Size" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="noOfHall">No of Hall</label>
        <input type="number" value="<?php echo $venue['no_of_halls'] ?>" name="noOfHall" id="noOfHall" placeholder="No of Hall" class="form-control"/>
    </div>
</div>
<div class="row">
    <div class="checkbox col-md-4">
        <label><input type="checkbox" name="facility[]" value="Parking">Parking</label>
    </div>
    <div class="form-group col-md-4">
        <label for="parkingSize">Parking Size</label>
        <input type="text" value="<?php echo $venue['parking_size'] ?>" name="parkingSize" id="parkingSize" placeholder="Parking Size" class="form-control"/>
    </div>
</div>
<br>
<div class="row">
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Stage">Stage</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Photographer">Photographer</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Changing Room">Changing Room</label>
    </div>
</div>
<div class="row">
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="DJ">DJ</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Florist">Florist</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Store Room">Store Room</label>
    </div>
</div>
<div class="row">
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Dance Area">Dance Area</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Decoration">Decoration</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Music / Sound System">Music / Sound System</label>
    </div>
</div>
<div class="row">
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Heater">Heater</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Tattoo">Tattoo</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Throne / Sofa">Throne / Sofa</label>
    </div>
</div>
<div class="row">
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="AC">AC</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Fan">Fan</label>
    </div>
    <div class="checkbox col-md-2">
        <label><input type="checkbox" name="facility[]" value="Dinner / Snack">Dinner / Snack</label>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="noOfServers">No of Servers</label>
        <input type="number" value="<?php echo $venue['no_of_servers'] ?>" name="noOfServers" id="noOfServers" placeholder="No of Servers" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="noOfBar">No of Bar</label>
        <input type="number" value="<?php echo $venue['no_of_bars'] ?>" name="noOfBar" id="noOfBar" placeholder="No of Bar" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="noOfHelpers">No of Helpers</label>
        <input type="number" value="<?php echo $venue['no_of_helpers'] ?>" name="noOfHelpers" id="noOfHelpers" placeholder="No of Helpers" class="form-control"/>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="noOfCooks">No of Cooks</label>
        <input type="number" value="<?php echo $venue['no_of_cooks'] ?>" name="noOfCooks" id="noOfCooks" placeholder="No of Cooks" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="noOfCleaners">No of Cleaners</label>
        <input type="number" value="<?php echo $venue['no_of_cleaners'] ?>" name="noOfCleaners" id="noOfCleaners" placeholder="No of Cleaners" class="form-control"/>
    </div>
    <div class="form-group col-md-4">
        <label for="noOfOthers">No of Others</label>
        <input type="number" value="<?php echo $venue['no_of_others'] ?>" name="noOfOthers" id="noOfOthers" placeholder="No of Others" class="form-control"/>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <label for="noOfGuards">No of Guards</label>
        <input type="number" value="<?php echo $venue['no_of_guards'] ?>" name="noOfGuards" id="noOfGuards" placeholder="No of Guards" class="form-control"/>
    </div>
</div>
<div class="form-group">
    <input type="button" class="btn btn-default" value="Previous" onclick="previousCateringForm()"/>
    <input type="button" class="btn btn-default" value="Next" onclick="nextFoodMenu()"/>
</div>
