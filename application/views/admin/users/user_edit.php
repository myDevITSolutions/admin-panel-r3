<div id="mainColumn">
  <!--
  <div class="breadcrumbs nav-wrapper">
    <div class="col s12">
      <?php get_breadcrumb(); ?>
    </div>
  </div>
-->
  <div class="topTitle">
    <div class="row">
      <div class="col left">
        <h1>Users</h1>
      </div>      
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Edit User</h4>
      <div class="row">
        <?php $attributes = array('class' => 'form'); ?>
        <?php echo form_open(base_url('admin/users/edit_user/'.$user->user_id), $attributes); ?>
        <div class="col s12 center-align">
          <?php echo validation_errors(); ?>
        </div>
        <div class="input-field col s6">
          <input id="name" name="userfname" type="text" value="<?php echo $user->userfname;?>" class="validate">
          <label for="name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="userlname" name="userlname" type="text" value="<?php echo $user->userlname;?>" class="validate">
          <label for="userlname">Last Name</label>
        </div>
        <div class="input-field col s4">
          <select name="user_gender">
            <option value="M" <?php echo ($user->user_gender == 'M') ? 'selected' : ''; ?>>Male</option>
            <option value="F" <?php echo ($user->user_gender == 'F') ? 'selected' : ''; ?>>Female</option>
            <option value="O" <?php echo ($user->user_gender == 'O') ? 'selected' : ''; ?>>Other</option>
          </select>
          <label>Select Gender</label>          
        </div>
        <div class="input-field col s4">
          <input id="user_dob" name="user_dob" type="text" value="<?php echo $user->user_dob; ?>" class="datepicker">
          <label for="user_dob">Date of birth</label>          
        </div>
        <div class="input-field col s4">         
          <select name="user_country">
            <option value="">Choose country</option>
            <?php $countries =  get_countries(); ?>
            <?php foreach ($countries as $key => $value) { ?>
            <option value="<?php echo $key; ?>" <?php echo ($key == $user->user_country)? 'selected' : ''; ?>><?php echo $value; ?></option>
            <?php } ?>
          </select>
          <label>Select Country</label> 
        </div>
        <!--
        <div class="input-field col s12">
          <input id="user_email" name="user_email" type="text" class="validate">
          <label for="user_email">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="user_pwd" name="user_pwd" type="text" class="validate">
          <label for="user_pwd">Password</label>
        </div>
      -->
        <div class="input-field col s6">
          <select name="user_role">
            <option value="" disabled selected>Choose role</option>
            <?php if(!empty($roles)){  ?>
              <?php foreach ($roles as $role) { ?>
              <option value="<?php echo $role->role_id; ?>" <?php echo ($role->role_id == $user->role_id) ? 'selected' :''; ?> ><?php echo $role->role_name; ?></option>
            <?php } } ?>
          </select>
          <label>Select Role</label>
        </div>            
        <div class="button-field col s12 right-align">
          <button class="waves-effect waves-light btn" type="submit" name="edit" value="1">Save Changes</button>
        </div>
        <?php echo form_close(); ?>
      </div>   
    </div>

    <div class="box whiteBox" style="margin-top: 10px;">
      <h4>Change password</h4>
      <div class="row">
        <?php $attributes = array('class' => 'form'); ?>
        <?php echo form_open(base_url('admin/users/change_password/'.$user->user_id), $attributes); ?>
        <div class="col s12 center-align">
          <?php echo validation_errors(); ?>
        </div>

        <div class="input-field col s12">
          <input id="user_pwd" name="user_pwd" type="password" class="validate">
          <label for="user_pwd">Password</label>
        </div>
        <div class="input-field col s12">
          <input id="cpass" name="cpass" type="password" class="validate">
          <label for="cpass">Confirm password</label>
        </div>
        <!--
        <div class="input-field col s12">
          <input id="user_email" name="user_email" type="text" class="validate">
          <label for="user_email">Email</label>
        </div>
        
      -->
                
        <div class="button-field col s12 right-align">
          <button class="waves-effect waves-light btn" type="submit" name="change" value="1">Save Changes</button>
        </div>  
        <?php echo form_close(); ?>
      </div>   
    </div>
  </div>


</div>
