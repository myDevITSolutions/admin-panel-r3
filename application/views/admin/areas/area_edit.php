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
        <h1>Areas</h1>
      </div>
      <div class="col right">
        <button data-target="addRole_modal" class="modal-trigger waves-effect waves-light btn"><i class="material-icons left">add</i>Add Area</button>
      </div>
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Edit Area</h4>
      <?php $attributes = array('calss' => 'form'); ?>
        <?php echo form_open(base_url('admin/areas/edit_area/'.$area->area_id), $attributes); ?>
        <div class="input-field col s12">
          <input id="name" name="area_name" type="text" value="<?php echo $area->area_name; ?>" class="validate">
          <label for="name">Area Name</label>
        </div>             
        <div class="button-field col s12 right-align">
          <button class="waves-effect waves-light btn" type="submit" name="edit" value="1">Save Changes</button>
        </div>
      <?php echo form_close(); ?>    
    </div>
  </div>
</div>
