<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css" media="all" />
    <title>R3 - Admin Login</title>
  </head>
  <body>
    <div class="adminLogin valign-wrapper">
      
      <div class="formBox">
        <div class="row">
        
      
        <div class="logo center-align"><img src="<?php echo base_url(); ?>public/images/logo.png" alt="logo" height="40px" /></div>
        <div class="col s12 center-align">
          <?php echo validation_errors(); ?>
          <?php 
            if($this->session->flashdata('warning')){
              echo $this->session->flashdata('warning');
            } 
            ?>
        </div>
        <?php $attributes = array('calss' => 'form'); ?>
        <?php echo form_open(base_url('auth/login'), $attributes); ?>
        <div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
        <div class="checkbox-field col s12">
          <label><input type="checkbox" class="filled-in"  /> <span>Remember me</span></label>
        </div>
        <div class="button-field col s12 center-align">
          <button class="btn waves-effect waves-light" type="submit" name="login" value="1">Submit <i class="material-icons right">send</i></button>
        </div>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>public/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
          
          $('.myElements').each(element, new SimpleBar());
          
      });
    </script>
  </body>
</html>