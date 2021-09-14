<header id="header">
  <nav>
    <div class="nav-wrapper">

      <a class="brand-logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/images/logo.png" alt="logo" height="36px" /></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right">
        <li><a class='dropdown-trigger notifactionBall' href='#' data-target='notifactions'><i
          class="material-icons">notifications_none</i><span class="count"></span></a>
          <div id='notifactions' class='dropdown-content'>
            <div class="link_title">Notifactions</div>
            <ul>
              <li>
                <div class="row">
                  <div class="col s3"><span class="profile" style="background-image: url(<?php echo base_url(); ?>public/images/user-img.jpg);"></span></div>
                  <div class="col s9">
                    <span class="msg"><strong class="name">Jhon Doe</strong> Added a role.</span>
                    <span class="info"><small>21.3.2020 - 12:30</small></span>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col s3"><span class="profile" style="background-image: url(<?php echo base_url(); ?>public/images/user-img.jpg);"></span></div>
                  <div class="col s9">
                    <span class="msg"><strong class="name">Goysse Kaycee</strong> just sent a new comment!</span>
                    <span class="info"><small>15.3.2020 - 11:34</small></span>
                  </div>
                </div>
              </li>
            </ul>
            <a class="seeallBtn black-text" href="#">See All</a>
          </div>
        </li>
        <li><a class='dropdown-trigger' href='#' data-target='accountDrop'>Admin
          <span class="profile" style="background-image: url(<?php echo base_url(); ?>public/images/user-img.jpg);"></span></a>
          <ul id='accountDrop' class='dropdown-content'>
            <li><a href="<?php echo base_url('admin/settings/account'); ?>">Manage Account</a></li>
            <li><a href="#">Change Password</a></li>
            <li><a href="<?php echo base_url('auth/logout'); ?>">Sign out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>