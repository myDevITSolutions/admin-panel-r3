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
      <h1>Rules</h1>
    </div>      
  </div>
</div>
<div class="contentBox">
  <div class="box whiteBox">
    <h4>Rule View</h4>      
    
    <div class="row">
      <div col s12>
        <b>Rule name</b>: <?php echo $rule->rule_name; ?>
      </div>
      <div col s12>
        <b>Category</b>: <?php echo $rule->category_name; ?>
      </div>
      <div col s12>
        <b>Area</b>: <?php echo $rule->area_name; ?>
      </div>
      <div col s12>
        <b>Subject</b>: <?php echo $rule->subject_name; ?>
      </div>
      <div col s12>
        <b>Topic</b>: <?php echo $rule->topic_name; ?>
      </div>
      
      <div col s12>
        <b>Rule Graphic</b><br>
       <?php 
        if(!empty($graphics)){
          foreach ($graphics as $graphic) { ?>
            <img src="<?php echo base_url('files/rule_graphics/').$graphic->graphic_name; ?>" width="150">                    
        <?php  } } ?> 
      </div>
      
            
                      
    </div>
  </div>
</div>