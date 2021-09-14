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
      <h4>Add User</h4>
      <div class="row">
        <?php $attributes = array('class' => 'form'); ?>
        <?php echo form_open(base_url('admin/users/add_user'), $attributes); ?>
        <div class="col s12 center-align">
          <?php echo validation_errors(); ?>
        </div>
        <div class="input-field col s6">
          <input id="name" name="userfname" type="text" class="validate">
          <label for="name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="userlname" name="userlname" type="text" class="validate">
          <label for="userlname">Last Name</label>
        </div>
        <div class="input-field col s4">
          <select name="user_gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Other</option>
          </select>
          <label>Select Gender</label>          
        </div>
        <div class="input-field col s4">
          <input id="user_dob" name="user_dob" type="text" class="datepicker">
          <label for="user_dob">Date of birth</label>          
        </div>

        <div class="input-field col s4">         
          <select name="user_country">
            <option value="">Choose country</option>
            <?php $countries =  get_countries(); ?>
            <?php foreach ($countries as $key => $value) { ?>
              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
          </select>
          <label>Select Country</label> 
        </div>
        <div class="input-field col s6">
          <input id="user_email" name="user_email" type="email" class="validate">
          <label for="user_email">Email</label>
        </div>
        <div class="input-field col s6">
          <input id="user_pwd" name="user_pwd" type="password" class="validate">
          <label for="user_pwd">Password</label>
        </div>
        <div class="input-field col s6">
          <select name="user_role">
            <option value="" disabled selected>Choose role</option>
            <?php if(!empty($roles)){  ?>
            <?php foreach ($roles as $role) { ?>
            <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
            <?php } } ?>
          </select>
          <label>Select Role</label>
        </div>            
        <div class="button-field col s12 right-align">
          <button class="waves-effect waves-light btn" type="submit" name="add" value="1"><i class="material-icons left">add</i>Add</button>
        </div>
        <?php echo form_close(); ?>
      </div>   
    </div>
  </div>
</div>
