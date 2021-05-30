<!-- ALL DELIVERY STATUS OPTION WITH IF CONDITION -->

<option>-NO INFO-</option>

<option value="NOT_IN" <?php if($d_status=="NOT_IN") echo 'selected="selected"'; ?>>RUNNING SHIPMENT/ NOT_IN</option>

<option value="OFFICE_IN" <?php if($d_status=="OFFICE_IN") echo 'selected="selected"'; ?>>OFFICE_IN</option>

<option value="HOLD" <?php if($d_status=="HOLD") echo 'selected="selected"'; ?>>HOLD</option>

<option value="RUNNING_DELI" <?php if($d_status=="RUNNING_DELI") echo 'selected="selected"'; ?>>RUNNING_DELI</option>

<option value="DELIVERED" <?php if($d_status=="DELIVERED") echo 'selected="selected"'; ?>>DELIVERED</option>

<option value="FAILED" <?php if($d_status=="FAILED") echo 'selected="selected"'; ?>>FAILED</option>

<option value="EXTRA" <?php if($d_status=="EXTRA") echo 'selected="selected"'; ?>>EXTRA</option>

<option value="LOT" <?php if($d_status=="LOT") echo 'selected="selected"'; ?>>LOT</option>

<!-- ALL DELIVERY STATUS OPTION WITH IF CONDITION -->