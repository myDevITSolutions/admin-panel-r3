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
    <h4>Rule Add</h4>      
    <?php $attributes = array('class' => 'form'); ?>
    <?php echo form_open_multipart(base_url('admin/rules/add_rule'), $attributes); ?>
    <div class="row">
      <div class="input-field col s12">
        <input id="rulename" name="rule_name" type="text" class="validate">
        <label for="rulename">Rule Name</label>
      </div>
      <div class="input-field col s6">
        <select name="rule_type">
          <option value="" disabled selected>Choose Type</option>
          <option value="1">Sequence rule</option>
          <option value="2">Focus rule</option>
        </select>
        <label>Select Rule Type</label>
      </div>

      <div class="input-field col s6">
        <select name="category_id">
          <option value="" disabled selected>Choose category</option>
          <?php if(!empty($categories)){  ?>
            <?php foreach ($categories as $category) { ?>
              <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
            <?php } }?>
          </select>
          <label>Select Category</label>
        </div>
        <div class="input-field col s6">
          <select name="area_id">
            <option value="" disabled selected>Choose area</option>
            <?php if(!empty($areas)){  ?>
              <?php foreach ($areas as $area) { ?>
                <option value="<?php echo $area->area_id; ?>"><?php echo $area->area_name; ?></option>
              <?php } }?>
            </select>
            <label>Select Area</label>
          </div>
          
          <div class="input-field col s6">
            <select name="subject_id">
              <option value="" disabled selected>Choose subject</option>
              <?php if(!empty($subjects)){  ?>
                <?php foreach ($subjects as $subject) { ?>
                  <option value="<?php echo $subject->subject_id; ?>"><?php echo $subject->subject_name; ?></option>
                <?php } }?>

              </select>
              <label>Select Subject</label>
            </div>
            <div class="input-field col s6">
              <select name="topic_id">
                <option value="" disabled selected>Choose topic</option>
                <?php if(!empty($topics)){  ?>
                  <?php foreach ($topics as $topic) { ?>
                    <option value="<?php echo $topic->topic_id; ?>"><?php echo $topic->topic_name; ?></option>
                  <?php } }?>            
                </select>
                <label>Select Topic</label>
              </div>
              <div class="input-field col s6">
                <select name="topic_id">
                  <option value="" disabled selected>Choose sub topic</option>
                  <option value="1">Charcoal</option>
                  <option value="2">Lorem ipsum</option>            
                </select>
                <label>Select Sub Topic</label>
              </div>

              <div class="file-field field input-field col s12">
                <span class="fileBtn"><label class="waves-effect waves-light black btn white-text" for="files"><i class="material-icons left">attach_file</i>Upload File</label></span>
                <input type="file" id="files" name="rule_graphic[]" multiple="multiple" />
              </div>
              <div class="button-field col s12 right-align">
                <button class="waves-effect waves-light btn" name="add" value="1" type="submit"><i class="material-icons left">add</i>Add</button>
              </div>
            </div>
            <?php echo form_close(); ?>              
          </div>
        </div>
      </div>

<script>
//$(M.toast({html: 'I am a toast!'}));
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
      filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"imgBox\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<span class=\"remove\">&times;</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".imgBox").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>

