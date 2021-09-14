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
        <h1>Subjects</h1>
      </div>      
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Edit Subjects</h4>
      <?php $attributes = array('class' => 'form'); ?>
        <?php echo form_open(base_url('admin/subjects/edit_subject/'.$subject->subject_id), $attributes); ?>
        <div class="input-field col s12">
          <input id="name" name="subject_name" type="text" value="<?php echo $subject->subject_name; ?>" class="validate">
          <label for="name">Subject Name</label>
        </div>             
        <div class="button-field col s12 right-align">
          <button class="waves-effect waves-light btn" type="submit" name="edit" value="1">Save Changes</button>
        </div>
      <?php echo form_close(); ?>    
    </div>
  </div>
</div>
