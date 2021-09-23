<fieldset>
    <div class="form-group">
        <label for="checkup_date">Check up Date</label>
          <input type="date" name="check_up_date" value="<?php echo htmlspecialchars($edit ? $customer['check_up_date'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Check up Date" class="form-control" required="required" id = "check_up_date" >
    </div> 

    <div class="form-group">
        <label for="cause">Cause</label>
        <input type="text" name="cause" value="<?php echo htmlspecialchars($edit ? $customer['cause'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Cause" class="form-control" required="required" id="cause">
    </div> 
    <div class="form-group">
        <label for="weight">Weight</label>
        <input type="number" name="weight" value="<?php echo htmlspecialchars($edit ? $customer['weight'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Weight" class="form-control" required="required" id="weight">
    </div>
    <div class="form-group">
        <label for="bp">Bp</label>
        <input type="number" name="bp" value="<?php echo htmlspecialchars($edit ? $customer['bp'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Bp" class="form-control" required="required" id="bp">
    </div>
    <div class="form-group">
        <label for="pulse">Pulse</label>
        <input type="number" name="pulse" value="<?php echo htmlspecialchars($edit ? $customer['pulse'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Pulse" class="form-control" required="required" id="pulse">
    </div> 
    <div class="form-group">
        <label for="sugar">Sugar</label>
        <input type="number" name="sugar" value="<?php echo htmlspecialchars($edit ? $customer['sugar'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Sugar" class="form-control" required="required" id="sugar">
    </div> 
    <div class="form-group">
        <label for="doctor_name">Doctor Name</label>
        <input type="text" name="doctor_name" value="<?php echo htmlspecialchars($edit ? $customer['doctor_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Doctor Name" class="form-control" required="required" id="doctor_name">
    </div> 
    
    <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="number" name="mobile" value="<?php echo htmlspecialchars($edit ? $customer['mobile'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Mobile" class="form-control" required="required" id="mobile">
    </div>
    <div class="form-group">
        <label for="test">Test</label>
        <input type="text" name="test" value="<?php echo htmlspecialchars($edit ? $customer['test'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Test" class="form-control" required="required" id="test">
    </div>
    <div class="form-group">
        <label for="image">File</label>
        <input type="file" name="image" value="<?php echo htmlspecialchars($edit ? $customer['image'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="File" class="form-control" required="required" id="image">
    </div>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Register <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>
