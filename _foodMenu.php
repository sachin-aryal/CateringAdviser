<div class="form-group">
    <label for="vegSnacks">Veg Snacks</label>
    <input type="text" value="<?php echo $vegSnacks ?>" name="vegSnacks" id="vegSnacks" placeholder="Plain Rice, Pakora" class="form-control"/>
</div>
<div class="form-group">
    <label for="nonVegSnacks">Non-Veg Snacks</label>
    <input type="text" value="<?php echo $nonVegSnacks ?>" name="nonVegSnacks" id="nonVegSnacks" placeholder="Chili Chicken, Chicken Fry" class="form-control"/>
</div>
<div class="form-group">
    <label for="vegMainCourse">Veg Main Course</label>
    <input type="text" value="<?php echo $mainCourseVeg ?>" name="vegMainCourse" id="vegMainCourse" placeholder="Veg Main Course" class="form-control"/>
</div>
<div class="form-group">
    <label for="nonVegMainCourse">Non-Veg Main Course</label>
    <input type="text" value="<?php echo $mainCourseNonVeg ?>" name="nonVegMainCourse" id="nonVegMainCourse" placeholder="Non-Veg Main Course" class="form-control"/>
</div>
<div class="form-group">
    <label for="salad">Salad</label>
    <input type="text" value="<?php echo $salad ?>" name="salad" id="salad" placeholder="Salad" class="form-control"/>
</div>
<div class="form-group">
    <label for="pickles">Pickles</label>
    <input type="text" value="<?php echo $pickles ?>" name="pickles" id="pickles" placeholder="Pickles" class="form-control"/>
</div>
<div class="form-group">
    <label for="softDrinks">Soft Drinks</label>
    <input type="text" value="<?php echo $softDrinks ?>" name="softDrinks" id="softDrinks" placeholder="Soft Drinks" class="form-control"/>
</div>
<div class="form-group">
    <label for="hardDrinks">Hard Drinks</label>
    <input type="text" value="<?php echo $hardDrinks ?>" name="hardDrinks" id="hardDrinks" placeholder="Hard Drinks" class="form-control"/>
</div>
<div class="form-group">
    <label for="hotDrinks">Hot Drinks</label>
    <input type="text" value="<?php echo $hotDrinks ?>" name="hotDrinks" id="hotDrinks" placeholder="Hot Drinks" class="form-control"/>
</div>
<div class="form-group">
    <label for="soup">Soup</label>
    <input type="text" value="<?php echo $soup ?>" name="soup" id="soup" placeholder="Soup" class="form-control"/>
</div>
<div class="checkbox">
    <label><input type="checkbox" <?php echo $bbq == "Yes"?"checked":"" ?> name="bbq" id="bbq" value="BBQ">BBQ</label>
</div>
<div class="row">
    <div class="col-md-4">
        <label for="noOfPeople">No Of People</label>
        <input type="number" value="<?php echo $price["no_of_people"] ?>" name="noOfPeople" id="noOfPeople" placeholder="No Of People" class="form-control"/>
    </div>
    <div class="col-md-4">
        <label for="price">Price</label>
        <input type="text" value="<?php echo $price["price"] ?>" name="price" id="price" placeholder="Rs 1400 Per Head" class="form-control"/>
    </div>
</div>
<div class="form-group">
    <input type="button" class="btn btn-default" value="Previous" onclick="previousVenueForm()"/>
</div>