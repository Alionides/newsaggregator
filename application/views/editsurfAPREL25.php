<!DOCTYPE html>
<html>
<head>
  <title>SURF ADMIN PANEL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  
  
  
  <link href="<?php echo base_url();?>styles/froala/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>styles/froala/froala_editor.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>styles/froala/froala_style.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>styles/froala/dark.css" rel="stylesheet" type="text/css">
  
  
  
</head>

<body>       
  <div class="container-fluid">
      <h2 class="text-center">SURF WEB LIKE A KING EDIT PAGE</h2>
      <a href="<?php echo base_url(); ?>site/adminsurf" class="btn btn-success">Back to Admin</a>
      <?php echo "<p class='bg-danger'>".validation_errors('ERROR')."</p>"; ?>

      
      <br><br>
      <?php foreach ($data_ids as $val): ?>
       <form class="form-vertical" role="form" action='<?php echo base_url(); ?>site/editsurf/<?php echo $val->site_id; ?>' method="post">
        <div class="form-group">
          <label for="email">Title:</label>
          <input type="input" name="title" class="form-control" id="email" value="<?php echo $val->site_title; ?>">
          <label for="email">Img Url:</label>
          <input type="input" name="imgurl" class="form-control" id="email" value="<?php echo $val->site_img_url; ?>">
          
          <label for="sel1">Select Category</label>
          <select name="interest" class="form-control" id="sel1">
            <option value="1">Новости</option>
            <option value="2">Бизнес</option>
            <option value="3">Политика</option>
            <option value="4">Общество</option>
            <option value="5">Культура</option>
            <option value="6">Веб</option>
            <option value="7">Наука и технологии</option>
            <option value="8">Спорт</option>
            <option value="9">Для женщин</option>
            <option value="10">Развлечения</option>
            <option value="11">Здоровье</option>
            <option value="12">Авто</option>
            <option value="13">Путешествия</option>
            <option value="14">Гастрономия</option>
            <option value="15">Интересное</option>
            <option value="16">Фото</option>
            <option value="17">Дизайн</option>
            <option value="18">Природа</option>
            <option value="19">Реклама</option>
            <option value="20">Видео</option>
          </select>
         
        
          <label for="sel1">Select Category</label>
          <select name="status" class="form-control" id="sel1">
            <option value="0">Deactive</option>
            <option value="1">Active</option>
            
          </select>
          
          
          
          
    <label for="email">Text:</label>
    <textarea id="edit" name="text" value="">
     <?php echo $val->site_desc; ?>
    </textarea>
  
    <!--  <section id="editor" >
          
      <div id='edit'  style="margin-top: 30px;">
          <input type="input" name="text" class="form-control" id="email" placeholder="url">
           </div>
          
      </section>
    -->
      
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
        
        
        
        <?php endforeach; ?>
        
        
  </div>

    <script src="<?php echo base_url();?>styles/froala/jquery-1.11.1.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/froala_editor.min.js"></script>
  <!--[if lt IE 9]>
    <script src="../../js/froala_editor_ie8.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url();?>styles/froala/tables.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/lists.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/colors.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/media_manager.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/font_family.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/font_size.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/block_styles.min.js"></script>
  <script src="<?php echo base_url();?>styles/froala/video.min.js"></script>

  <script>
      $(function(){
          $('#edit').editable({inlineMode: false, defaultTag: 'DIV', theme: 'dark'})
      });
  </script>
    
    
    
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
 <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
  
 








</body>
</html>