<div id="mainColumn">
  <p><?php if(isset($error)){ print_r($error); } ?></p>
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
        <h1>Rules</h1>
      </div>
      <div class="col right">
        <a href="<?php echo base_url('admin/rules/add_rule'); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add Rule</a>
      </div>
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Rule List</h4>
      <table id="dataTable" class="drTable" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Rule Name</th>
            <th>Category</th>
            <th>Area</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($rules)) { $sn = 1; ?>
          <?php foreach ($rules as $rule) { ?>            
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $rule->rule_name; ?></td>            
            <td><?php echo $rule->category_name; ?></td>
            <td><?php echo $rule->area_name; ?></td>
            <!--
            <td><img src="<?php echo base_url('files/rule_graphics/').$rule->rule_graphic; ?>" width="60"></td>
          -->
            <td><span class="badge green accent-4">Active</span></td>
            <td>
              <span class="actionBtn">
              <a href="#" class="btn-floating btn-small waves-effect waves-light light-green accent-4"><i class="material-icons">edit</i></a>
              <a href="<?php echo base_url('admin/rules/view_rule/'.$rule->rule_id); ?>"class="btn-floating btn-small waves-effect waves-light"><i class="material-icons">visibility</i></a>
               <a href="#" class="btn-floating btn-small waves-effect waves-light grey"><i class="material-icons">print</i></a>
               <a href="#" class="btn-floating btn-small waves-effect waves-light blue"><i class="material-icons">archive</i></a>
              <a href="<?php echo base_url('admin/rules/delete_rule/'.$rule->rule_id); ?>" class="btn-floating btn-small waves-effect waves-light red" onclick="return confirm('Are you sure?')"><i class="material-icons">delete</i></a>

              </span>
            </td>
          </tr>
          <?php $sn++; } } ?>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  