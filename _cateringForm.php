<div class="row">
    <h2>Basic Details</h2>
    <div class="col-md-8">
        <div class="form-group">
            <label for="cateringName">Name of Catering</label>
            <input type="text" value="<?php echo $contact['catering_name'] ?>" name="cateringName" id="cateringName" placeholder="Catering Name" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="establishDate">Establish Date</label>
            <input type="text" value="<?php echo $contact['established_date'] ?>" name="establishDate" id="establishDate" placeholder="Establish Date" class="form-control"/>
        </div>
        <div class="row">
            <div class="form-group col-xs-6">
                <label for="pan">PAN #</label>
                <input type="text" value="<?php echo $contact['pan_no'] ?>" name="pan" id="pan" placeholder="PAN #" class="form-control"/>
            </div>
            <div class="form-group col-xs-6">
                <label for="vat">VAT #</label>
                <input type="text" value="<?php echo $contact['vat_no'] ?>" name="vat" id="vat" placeholder="VAT #" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <img src="http://www.shunvmall.com/data/out/193/47806048-random-image.png" height="110px"/>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control"/>
        </div>
    </div>
</div>
<h2>Contact Info</h2>
<div class="row">
    <div class="form-group col-xs-6">
        <label for="firstName">First Name</label>
        <input type="text" value="<?php echo $contact['first_name'] ?>" name="firstName" id="firstName" placeholder="First Name" class="form-control"/>
    </div>
    <div class="form-group col-xs-6">
        <label for="lastName">Last Name</label>
        <input type="text" value="<?php echo $contact['last_name'] ?>" name="lastName" id="lastName" placeholder="Last Name" class="form-control"/>
    </div>
</div>
<div class="form-group">
    <label for="designation">Designation</label>
    <input type="text" value="<?php echo $contact['designation'] ?>" name="designation" id="designation" placeholder="Designation" class="form-control"/>
</div>
<div class="form-group">
    <label for="phoneNo1">Contact No </label>
    <input type="text" value="<?php echo $contact['phone_no1'] ?>" name="phoneNo1" id="phoneNo1" placeholder="Phone" class="form-control"/>
</div>
<div class="form-group">
    <label for="phoneNo2">Contact No2</label>
    <input type="text" value="<?php echo $contact['phone_no2'] ?>" name="phoneNo2" id="phoneNo2" placeholder="Phone" class="form-control"/>
</div>
<div class="form-group">
    <label for="emailId">Email ID</label>
    <input type="email" value="<?php echo $contact['email_id'] ?>" name="emailId" id="emailId" placeholder="Email" class="form-control"/>
</div>
<div class="form-group">
    <label for="website">Website</label>
    <input type="text" value="<?php echo $contact['website'] ?>" name="website" id="website" placeholder="Website" class="form-control"/>
</div>
<div class="form-group">
    <label for="zone">Zone</label>
    <select name="zone" id="zone" class="form-control">
        <?php
        foreach ($zones as $zone) {
            echo '<option value="'.$zone.'">'.$zone.'</option>';
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="district">Districts</label>
    <select name="district" id="district" class="form-control">
        <?php
        foreach ($districts as $district) {
            echo '<option value="'.ucfirst($district).'">'.ucfirst($district).'</option>';
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="area">Area</label>
    <input type="text" value="<?php echo $contact['area'] ?>" name="area" id="area" placeholder="Area" class="form-control"/>
</div>
<div class="form-group">
    <label for="street">Street/Tole</label>
    <input type="text" value="<?php echo $contact['street'] ?>" name="street" id="street" placeholder="Street/Tole" class="form-control"/>
</div>
<div class="form-group">
    <label for="nearestLandmark">Nearest Landmark</label>
    <input type="text" value="<?php echo $contact['nearest_landmark'] ?>" name="nearestLandmark" id="nearestLandmark" placeholder="Nearest Landmark" class="form-control"/>
</div>
<div class="row">
    <div class="form-group col-xs-6">
        <label for="building">Building</label>
        <input type="text" value="<?php echo $contact['building'] ?>" name="building" id="building" placeholder="Building" class="form-control"/>
    </div>
    <div class="form-group col-xs-6">
        <label for="floor">Floor</label>
        <input type="text" value="<?php echo $contact['floor'] ?>" name="floor" id="floor" placeholder="Floor" class="form-control"/>
    </div>
</div>
<div class="form-group">
    <input type="button" class="btn btn-default" value="Next" onclick="nextVenueForm()"/>
</div>