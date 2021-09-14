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
      <div class="col right">
        <button data-target="addRole_modal" class="modal-trigger waves-effect waves-light btn"><i class="material-icons left">add</i>Add Topic</button>
      </div>
    </div>
  </div>
  <div class="contentBox">
    <div class="box whiteBox">
      <h4>Topic List</h4>
      <table id="dataTable" class="drTable" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Topic Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($topics)) { $sn = 1 ?>
          <?php foreach ($topics as $topic) { ?>                  
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $topic->topic_name; ?></td>            
            <td><span class="actionBtn">
              <a href="<?php echo base_url('admin/topics/edit_topic/'.$topic->topic_id); ?>" class="btn-floating btn-small waves-effect waves-light light-green accent-4"><i class="material-icons">edit</i></a>
              <a href="<?php echo base_url('admin/topics/delete_topic/'.$topic->topic_id); ?>" class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">delete</i></a>
              </span>
            </td>
          </tr>
          <?php $sn++; }} ?>          
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="addRole_modal" class="modal">
  <div class="modal-content">
      <a href="JavaScript:Void(0);" class="modal-close waves-effect waves-green btn-flat">&times;</a>
    <h4>Add Topic</h4>
    <?php $attributes = array('class' => 'form'); ?>
      <?php echo form_open(base_url('admin/topics/add_topic'), $attributes); ?>
      <div class="input-field col s12">
        <input id="name" name="topic_name" type="text" class="validate">
        <label for="name">Topic Name</label>
      </div>
            
      <div class="button-field col s12 right-align">
        <button class="waves-effect waves-light btn" type="submit" name="add" value="1"><i class="material-icons left">add</i>Add</button>
      </div>
  <?php echo form_close(); ?>
  </div>  
</div>