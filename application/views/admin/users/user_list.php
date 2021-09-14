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
      <div class="col right">
        <a href="<?php echo base_url('admin/users/add_user'); ?>" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Add User</a>
      </div>
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>User List</h4>
      <table id="dataTable" class="drTable" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($users)) { $sn = 1 ?>
          <?php foreach ($users as $user) { ?>                  
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $user->userfname.' '.$user->userlname; ?></td>
            <td><?php echo $user->user_email; ?></td>
            <td><?php echo $user->role_name; ?></td>           
            <td><span class="actionBtn">
              <a href="<?php echo base_url('admin/users/edit_user/'.$user->user_id); ?>" class="btn-floating btn-small waves-effect waves-light light-green accent-4"><i class="material-icons">edit</i></a>
              <a href="<?php echo base_url('admin/users/delete_user/'.$user->user_id); ?>" class="btn-floating btn-small waves-effect waves-light red" onClick="return confirm('Are you sure?'); "><i class="material-icons">delete</i></a>
              </span>
            </td>
          </tr>
          <?php $sn++; }} ?>          
        </tbody>
      </table>
    </div>
  </div>
</div>

