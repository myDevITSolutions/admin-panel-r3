<!--
<div class="row">
	<h2>Dashboard</h2>
	<h3>Hello, <?php echo $this->session->userdata('userfname'); ?></h3>
	<a href="<?php echo base_url('auth/logout'); ?>">Logout</a>
	<br>
	<a href="<?php echo base_url('admin/roles'); ?>">Roles</a>
</div>
-->

<div id="mainColumn">
  <!--
  <div class="breadcrumbs nav-wrapper">
    <div class="col s12">
      <?php get_breadcrumb(); ?>
    </div>
  </div>
-->
  <div class="topTitle">
    <h1>Dashboard</h1>
  </div>
  <div class="contentBox">
    <div class="dashboardCounting row">
      <div class="col xl3 s6">
        <div class="box whiteBox">
          <h4>Total Users</h4>
          <i class="material-icons red-text text-accent-3">person</i>
          <div class="count red-text text-accent-3"><?php echo $users_count; ?></div>
        </div>
      </div>
      <div class="col xl3 s6">
        <div class="box whiteBox">
          <h4>Total Roles</h4>
          <i class="material-icons  light-blue-text text-darken-1">group_add</i>
          <div class="count  light-blue-text text-darken-1"><?php echo $roles_count; ?></div>
        </div>
      </div>
      <div class="col xl3 s6">
        <div class="box whiteBox">
          <h4>Total Rules</h4>
          <i class="material-icons deep-purple-text text-lighten-1">school</i>
          <div class="count deep-purple-text text-lighten-1"><?php echo $rules_count; ?></div>
        </div>
      </div>
      <div class="col xl3 s6">
        <div class="box whiteBox">
          <h4>Total Categories</h4>
          <i class="material-icons light-green-text">dashboard</i>
          <div class="count light-green-text"><?php echo $categories_count; ?></div>
        </div>
      </div>
      <div class="col xl3 s6">
        <div class="box whiteBox">
          <h4>Total Areas</h4>
          <i class="material-icons light-green-text">pie_chart</i>
          <div class="count light-green-text"><?php echo $areas_count; ?></div>
        </div>
      </div>
      <div class="col xl3 s6">
        <div class="box whiteBox">
          <h4>Total Topics</h4>
          <i class="material-icons deep-purple-text">touch_app</i>
          <div class="count deep-purple-text"><?php echo $topics_count; ?></div>
        </div>
      </div>
    </div>
  </div>
</div>