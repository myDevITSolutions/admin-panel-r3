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
        <h1>Rule Categories</h1>
      </div>
      
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Edit Category</h4>
        <?php $attributes = array('calss' => 'form'); ?>
          <?php echo form_open(base_url('admin/categories/edit_category/'.$category->category_id), $attributes); ?>
          <div class="input-field col s12">
            <input id="name" name="category_name" type="text" value="<?php echo $category->category_name; ?>" class="validate">
            <label for="name">Category name</label>
          </div>      
          <div class="button-field col s12 right-align">
            <button class="waves-effect waves-light btn" type="submit" name="edit" value="1">Save Changes</button>
          </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

