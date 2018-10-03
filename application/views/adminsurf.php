
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
  
  <script src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
	google.load("jquery", "1.3.2");
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
                      
     
                    
		var num_messages = <?=$num_messages?>;
		var loaded_messages = 0;
			$("#more_button").click(function(){
				loaded_messages += 16;
				$.get("http://surf.az/site/get_admin/" + loaded_messages, function(data){
					$("#columsofsurf").append(data);
 
				});
 
				if(loaded_messages >= num_messages - 16)
				{
					$("#more_button").hide();
					//alert('hide');
				}
                                
			})
		})
	</script>
  
</head>

<body>       
  <div class="container-fluid">
      <a target="_blank" href="http://surf.az"><h2 class="text-center">SURF WEB LIKE A KING </h2></a>
      
      <?php echo "<p class='bg-danger'>".validation_errors('ERROR')."</p>"; ?>

      <form class="form-vertical" role="form" action='<?php echo base_url(); ?>site/inserturl' method="post">
        <div class="form-group">
          <label for="email">Enter Url:</label>
          <input type="input" name="title" class="form-control" id="email" placeholder="Enter title">
        </div>
        
        
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br><br>
      

      <a href="<?php echo base_url(); ?>site/adminshowusernews" class="btn btn-primary" role="button"> USER NEWS </a>
      <br>

       <form class="form-vertical" role="form" action='<?php echo base_url(); ?>site/insertownnews' method="post">
        <div class="form-group">
          <label for="email">Title:</label>
          <input type="input" name="title" class="form-control" id="email" placeholder="title">
          <label for="email">Img Url:</label>
          <input type="input" name="imgurl" class="form-control" id="email" placeholder="url">
          
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
            <option value="10">Шоу-Бизнес</option>
            <option value="11">Здоровье</option>
            <option value="21">Ислам</option>
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

          <label for="sel1">Language</label>
          <select name="lang" class="form-control" id="lang">
            <option value="0">Aze</option>
            <option value="1">Rus</option>
          </select>

          <label for="sel1">Status</label>
          <select name="status" class="form-control" id="status">
           <option value="1">Active</option>
           <option value="0">Deactive</option>
          </select>
         
        
    <label for="email">Text:</label>
    
   <textarea id="edit" name="text" placeholder="text">
     
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
          $('#edit').editable({inlineMode: false, theme: 'dark'})
      });
  </script>
    
    
    
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
 <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
  
 



<div class="table-responsive">          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Title</th>  
            <th>Preview</th>  
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="columsofsurf">
		  
            <?php
                foreach($results as $row){
                    $product_i = $row->site_id;
            ?> 
			       
          <tr>
		
            <td><?php echo $row->site_title; ?></td>      
            <td><a href="<?php echo base_url(); ?>site/tapdim_news" class="btn btn-info" target="_blank">Preview</a></td>
              <td><a href="<?php echo base_url(); ?>site/editsurf/<?php echo $product_i; ?>" class="btn btn-info" >Edit</a></td>
               <td><a href="<?php echo base_url(); ?>site/deletesurf/<?php echo $product_i; ?>" class="btn btn-danger" >Delete</a></td>
			  
          </tr>
         
          <?php
          }
          ?>
		   
		  
        </tbody>
		
		
		
      </table>
	  <div id="more_button">
	       <img id="imgload" src="<?php echo base_url();?>images/loadmore.png" />
	      </div>
      </div>




</body>
</html>