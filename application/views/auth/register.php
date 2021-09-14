<!DOCTYPE html>
<html lang="en">
  <head>
    <title>R3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <a href="<?php echo base_url(); ?>"><h1 align="center">R3</h1></a>
      </div>
      <div class="row">
        <div class="col s12">
          <h3>
          Register</h1>
        </div>
        <?php echo validation_errors(); ?>	  	
        <div class="row">
          <?php $attributes = array('calss' => 'col s12', 'id' => 'register-form'); ?>
          <?php echo form_open(base_url('auth/register'), $attributes); ?>				  
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Placeholder" id="userfname" type="text" class="validate">
              <label for="userfname">First Name</label>
            </div>
            <div class="input-field col s6">
              <input id="last_name" type="text" class="validate">
              <label for="last_name">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>