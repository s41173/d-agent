<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"> Material - Update </h4>
        </div>
        
 <div class="modal-body"> 
 
 <!-- error div -->
 <div class="alert alert-success success"> </div>
 <div class="alert alert-warning warning"> </div>
 <div class="alert alert-error error"> </div>

 <!-- form edit -->
 <form id="edit_form_non" data-parsley-validate class="form-horizontal form-label-left" method="POST" 
 action="<?php echo $form_action_update; ?>" enctype="multipart/form-data">
     
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Name </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input id="tname_update" class="form-control col-md-7 col-xs-12" type="text" name="tname" placeholder="Material Name">
        <input type="hidden" id="tid_update" name="tid_update">
      </div>
    </div>
     
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Model </label>
      <div class="col-md-9 col-sm-6 col-xs-12">
        <?php $js = "class='select2_single form-control' id='cmodel_update' tabindex='-1' style='width:150px;' "; 
        echo form_dropdown('cmodel', $model, isset($default['model']) ? $default['model'] : '', $js); ?>
      </div>
    </div>
    
     <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Material </label>
      <div class="col-md-9 col-sm-6 col-xs-12">
       <?php $js = "class='select2_single form-control' id='cmaterial_update' tabindex='-1' style='width:250px;' "; 
       echo form_dropdown('cmaterial', $material, isset($default['material']) ? $default['material'] : '', $js); ?>
      </div>
    </div>
     
     <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Color </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
       <?php $js = "class='select2_single form-control' id='ccolor_update' tabindex='-1' style='width:250px;' "; 
       echo form_dropdown('ccolor', $color, isset($default['color']) ? $default['color'] : '', $js); ?>
      </div>
    </div>
    
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Type </label>
      <div class="col-md-5 col-sm-6 col-xs-12">
       <select name="ctype" id="ctype_update" class="select2_single form-control" style="width:150px;">
           <option value="SINGLE"> SINGLE </option>
           <option value="DOUBLE"> DOUBLE </option>
           <option value="TRIPLE"> TRIPLE </option>
       </select>
      </div>
    </div>
     
    <div class="form-group">  
      <label class="control-label col-md-3 col-sm-3 col-xs-12"> Glass </label>  
      <div class="col-md-6 col-sm-12 col-xs-12 form-group">
          <input type="checkbox" name="cglass" class="" id="cglass_update" value="1">
      </div>
   </div>
    
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Price / M </label>
      <div class="col-md-3 col-sm-6 col-xs-12">
       <input type="number" id="tprice_update" name="tprice" class="form-control" value="0">
      </div>
    </div>
 

      <div class="ln_solid"></div>
      <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 btn-group">
          <button type="submit" class="btn btn-primary" id="button">Save</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
      </div>
  </form> 
  <!-- form edit -->
  
  </div>
 </div>
</div>