<div id="mainColumn">
	 <div class="topTitle">
    <div class="row">
      <div class="col left">
        <h1>Settings</h1>
      </div>      
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Account</h4>
      <?php $attributes = array('class' => 'form'); ?>
        <?php echo form_open(base_url('admin/settings/edit_account/'.$user->user_id), $attributes); ?>
        <div class="row">
	        <div class="input-field col s12">
	          <input id="userfname" name="userfname" type="text" value="<?php echo $user->userfname; ?>" class="validate">
	          <label for="userfname">First Name</label>
	        </div>
	        <div class="input-field col s12">
	          <input id="userlname" name="userlname" type="text" value="<?php echo $user->userlname; ?>" class="validate">
	          <label for="userlname">Last Name</label>
	        </div>             
	        <div class="button-field col s12 right-align">
	          <button class="waves-effect waves-light btn" type="submit" name="save" value="1">Save Changes</button>
	        </div>
	      </div>
      <?php echo form_close(); ?>    
    </div>
  </div>
</div>