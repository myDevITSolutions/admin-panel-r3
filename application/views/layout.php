<!DOCTYPE html>
<html lang="en">
  <head>
    <title>R3 <?php echo (isset($title)) ? '-'.$title : ''; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/materialize.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css" media="all" />
    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/plugins/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/script.js"></script>
    <style type="text/css">
      .flash-msg{
        display: block;
        z-index: 5;
        width: 50%;
        margin-top: 5%;
        margin-left: 30%;
      }
      .form-errors{
        width: 40%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 3%;
      }
    </style>
  </head>
  <body>   warning 
    <?php include 'includes/header.php'; ?>    
    <div class="mainWraper">      
      <?php include 'includes/sidebar.php'; ?>
      <!-- Flash messages -->
      <?php if($this->session->flashdata('success')): ?>
      <div class="card-panel green white-text flash-msg">
        <?=$this->session->flashdata('success')?>        
      </div>
      <?php endif; ?>
      <?php if($this->session->flashdata('warning')): ?>
      <div class="card-panel red white-text flash-msg">
        <?=$this->session->flashdata('warning')?>
      </div>
      <?php endif; ?>

      <?php if(validation_errors()): ?>
      <div class="card-panel orange darken-1 white-text form-errors">
        <span><?php echo validation_errors(); ?></span>
      </div>
      <?php endif; ?>
    
      <!-- Flash messages ends --> 
      <?php $this->load->view($view);  ?>
    </div>
    <footer id="footer">
      <div class="copyright center-align">Copyright @ 2017. All rights reserved R3</div>
    </footer>

    <script>          
      $( document ).ready(function(){   
        //active cuurent menu
        $("#<?= $cur_tab; ?>").addClass('open active');
        <?php if ($sub_tab != '') { ?>$("#<?= $sub_tab; ?>").addClass('active');<?php } ?>
      });

      //hide alert after some seconds            
        $(".flash-msg").fadeTo(2000, 2000).slideUp(500, function(){
          $(".flash-msg").slideUp(500);
        });
    </script>
  </body>
</html>