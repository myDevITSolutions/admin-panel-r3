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
        <h1>Roles</h1>
      </div>      
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Role Edit</h4>      
        <?php $attributes = array('class' => 'form'); ?>
          <?php echo form_open(base_url('admin/roles/edit_role/'.$role->role_id), $attributes); ?>
          <div class="input-field col s12">
            <input id="name" name="role_name" value="<?php echo $role->role_name; ?>" type="text" class="validate">
            <label for="name">Role Name</label>
          </div>
          <div class="input-field col s12">
            <textarea id="textarea1" name="role_desc" class="materialize-textarea"><?php echo $role->role_desc; ?></textarea>
            <label for="textarea1">Role Description</label>
          </div>      
          <div class="button-field col s12 right-align">
            <button class="waves-effect waves-light btn" type="submit" name="edit" value="1">Save Changes</button>
          </div>
        <?php echo form_close(); ?>              
    </div>
  </div>
</div>

