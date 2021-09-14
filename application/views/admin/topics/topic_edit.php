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
        <h1>Topics</h1>
      </div>      
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Edit Topic</h4>
      <?php $attributes = array('class' => 'form'); ?>
        <?php echo form_open(base_url('admin/topics/edit_topic/'.$topic->topic_id), $attributes); ?>
        <div class="input-field col s12">
          <input id="name" name="topic_name" type="text" value="<?php echo $topic->topic_name; ?>" class="validate">
          <label for="name">Topic Name</label>
        </div>             
        <div class="button-field col s12 right-align">
          <button class="waves-effect waves-light btn" type="submit" name="edit" value="1">Save Changes</button>
        </div>
      <?php echo form_close(); ?>    
    </div>
  </div>
</div>
