<?php $cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2); ?>  
<?php $sub_tab = $this->uri->segment(3)==''?'': $this->uri->segment(3); ?>
<div class="sidenav" id="mobile-demo">
<div class="aside">
  <div class="link_title">Main Links</div>
  <ul class="menuLinks collapsible">
    <li id="dashboard"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="material-icons">home</i> Dashboard</a></li>
    <li id="users"><a href="<?php echo base_url('admin/users'); ?>"><i class="material-icons">person_outline</i> Users</a></li>
    <li id="roles"><a href="<?php echo base_url('admin/roles'); ?>"><i class="material-icons">people_outline</i> Roles</a></li>
    <li id="rules"><a href="<?php echo base_url('admin/rules'); ?>"><i class="material-icons">school</i> Rules</a></li>
    <li id="categories"><a href="<?php echo base_url('admin/categories'); ?>"><i class="material-icons">dashboard</i> Categories</a></li>    
    <li id="areas"><a href="<?php echo base_url('admin/areas'); ?>"><i class="material-icons">pie_chart</i> Areas</a></li>
  
    <li id="subjects"><a href="<?php echo base_url('admin/subjects'); ?>"><i class="material-icons">subject</i> Subjects</a></li>
    <li id="topics"><a href="<?php echo base_url('admin/topics'); ?>"><i class="material-icons">touch_app</i> Topics</a></li>
  
    <li id="settings">
      <a class="collapsible-header" href="JavaScript:Void(0);"><i class="material-icons">settings</i> Settings</a>
      <div class="collapsible-body">
        <ul>
          <li id="account"><a href="<?php echo base_url('admin/settings/account') ?>">Account Setting</a></li>
          <li><a href="#">Change Password</a></li>
          <li><a href="<?php echo base_url('auth/logout'); ?>">Sign out</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>
</div>