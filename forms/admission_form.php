<fieldset>
    <div class="form-group">
        <label for="room_no">Room no</label>
          <input type="text" name="room_no" value="<?php echo htmlspecialchars($edit ? $customer['room_no'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Room No" class="form-control" required="required" id = "room_no" >
    </div> 

    <div class="form-group">
        <label for="attender_name">Attender Name</label>
        <input type="text" name="attender_name" value="<?php echo htmlspecialchars($edit ? $customer['attender_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Attender Name" class="form-control" required="required" id="attender_name">
    </div> 
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($edit ? $customer['address'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Address" class="form-control" required="required" id="address">
    </div>
    <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="number" name="mobile" value="<?php echo htmlspecialchars($edit ? $customer['mobile'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Mobile Number" class="form-control" required="required" id="mobile">
    </div>
    <div class="form-group">
        <label for="admission_date">Admission Date</label>
        <input type="date" name="admission_date" value="<?php echo htmlspecialchars($edit ? $customer['admission_date'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Admission Date" class="form-control" required="required" id="admission_date">
    </div> 
    <div class="form-group">
        <label for="discharge_date">Discharge Date</label>
        <input type="date" name="discharge_date" value="<?php echo htmlspecialchars($edit ? $customer['discharge_date'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Discharge Date" class="form-control" required="required" id="discharge_date">
    </div> 
    <div class="form-group">
        <label for="doctor_name">Doctor Name</label>
        <input type="text" name="doctor_name" value="<?php echo htmlspecialchars($edit ? $customer['doctor_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Doctor Name" class="form-control" required="required" id="doctor_name">
    </div> 
    
    <div class="form-group">
        <label for="prescriptions">Prescriptions</label>
        <input type="text" name="prescriptions" value="<?php echo htmlspecialchars($edit ? $customer['prescriptions'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Prescriptions" class="form-control" required="required" id="prescriptions">
    </div>
    
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
