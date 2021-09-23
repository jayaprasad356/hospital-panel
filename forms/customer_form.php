<fieldset>
    <div class="form-group">
        <label for="f_name">Patient No</label>
          <input type="text" name="p_no" value="<?php echo htmlspecialchars($edit ? $customer['p_no'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Patient No" class="form-control" required="required" id = "p_no" >
    </div> 

    <div class="form-group">
        <label for="date">Register Date</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($edit ? $customer['date'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Register Date" class="form-control" required="required" id="date">
    </div> 
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($edit ? $customer['name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Name" class="form-control" required="required" id="name">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" value="<?php echo htmlspecialchars($edit ? $customer['age'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Age" class="form-control" required="required" id="age">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" value="<?php echo htmlspecialchars($edit ? $customer['dob'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Date of Birth" class="form-control" required="required" id="dob">
    </div> 
    <div class="form-group">
        <label>Gender * </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" <?php echo ($edit &&$customer['gender'] =='male') ? "checked": "" ; ?> required="required"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" <?php echo ($edit && $customer['gender'] =='female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="number" name="mobile" value="<?php echo htmlspecialchars($edit ? $customer['mobile'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Mobile" class="form-control" required="required" id="mobile">
    </div>
    <div class="form-group">
        <label for="blood">Blood</label>
        <input type="text" name="blood" value="<?php echo htmlspecialchars($edit ? $customer['blood'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Blood" class="form-control" required="required" id="blood">
    </div>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
