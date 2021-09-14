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
      <h4>Area List</h4>
      <table id="dataTable" class="drTable" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Area Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($areas)) { $sn = 1 ?>
          <?php foreach ($areas as $area) { ?>                  
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $area->area_name; ?></td>            
            <td><span class="actionBtn">
              <a href="<?php echo base_url('admin/areas/edit_area/'.$area->area_id); ?>" class="btn-floating btn-small waves-effect waves-light light-green accent-4"><i class="material-icons">edit</i></a>
              <a href="<?php echo base_url('admin/areas/delete_area/'.$area->area_id); ?>" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
              </span>
            </td>
          </tr>
          <?php $sn++; }} ?>          
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="addRole_modal" class="modal">
  <div class="modal-content">
      <a href="JavaScript:Void(0);" class="modal-close waves-effect waves-green btn-flat">&times;</a>
    <h4>Add Area</h4>
    <?php $attributes = array('calss' => 'form'); ?>
      <?php echo form_open(base_url('admin/areas/add_area'), $attributes); ?>
      <div class="input-field col s12">
        <input id="name" name="area_name" type="text" class="validate">
        <label for="name">Area Name</label>
      </div>
            
      <div class="button-field col s12 right-align">
        <button class="waves-effect waves-light btn" type="submit" name="add" value="1"><i class="material-icons left">add</i>Add</button>
      </div>
  <?php echo form_close(); ?>
  </div>  
</div>