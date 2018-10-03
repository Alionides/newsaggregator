
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>materialize/css/materialize.min.css"  media="screen,projection"/>

<!--       <link rel="stylesheet" href="<?php //echo base_url();?>libs/bootstrap/css/bootstrap.min.css" />
 -->	
  <link rel="stylesheet" href="<?php echo base_url();?>libs/animate/animate.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/main.css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/media.css" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Surf.az</title>
      <style type="text/css">

    .modal111{

      display: none;
    }

    .hidebtn{visibility: hidden;}
    .showbtn{ visibility: visible;}

    </style>
    </head>

    <body>
      <div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper light-blue darken-2">
      &nbsp; &nbsp; &nbsp;<a href="#" class="brand-logo"><img src="/images/logo.png"</a>
      <a href="#" data-activates="mobile-demo" class="right button-collapse">
        <i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="http://surf.az/site/surf_cat/1">Новости</a></li>
        <li><a href="http://surf.az/site/surf_cat/2">Бизнес</a></li>
        <li><a href="http://surf.az/site/surf_cat/3">Политика</a></li>
        <li><a href="http://surf.az/site/surf_cat/5">Культура</a></li>
        <li><a href="http://surf.az/site/surf_cat/6">Веб</a></li>
        <li><a href="http://surf.az/site/surf_cat/7">Наука и технологии</a></li>
        <li><a href="http://surf.az/site/surf_cat/8">Спорт</a></li>
        <li><a href="http://surf.az/site/surf_cat/12">Авто</a></li>
        <li><a href="http://surf.az/site/surf_cat/15">Интересное</a></li>


        <li><form action="http://surf.az/site/search" method="POST">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
        </li>

              <li> <a class="modal-trigger" href="#modal1"><i class="material-icons">menu</i></a> </li>
      </ul>


      <nav id="nav-mobile" class="modal111 light-blue darken-2">
      <ul  class="right hide-on-med-and-down">
            <li><a href="http://surf.az/site/surf_cat/4">Общество</a></li>
            <li><a href="http://surf.az/site/surf_cat/9">Для женщин</a></li>
            <li><a href="http://surf.az/site/surf_cat/10">Развлечения</a></li>
            <li><a href="http://surf.az/site/surf_cat/11">Здоровье</a></li>
            <li><a href="http://surf.az/site/surf_cat/13">Путешествия</a></li>
            <li><a href="http://surf.az/site/surf_cat/14">Гастрономия</a></li>
            <li><a href="http://surf.az/site/surf_cat/16">Фото</a></li>
            <li><a href="http://surf.az/site/surf_cat/17">Дизайн</a></li>
            <li><a href="http://surf.az/site/surf_cat/18">Природа</a></li>
            <li><a href="http://surf.az/site/surf_cat/19">Реклама</a></li>
            <li><a href="http://surf.az/site/surf_cat/20">Видео</a></li>
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
      </ul>
  </nav>


      <ul class="side-nav" id="mobile-demo">
        <li><a href="http://surf.az/site/surf_cat/1">Новости</a></li>
            <li><a href="http://surf.az/site/surf_cat/2">Бизнес</a></li>
            <li><a href="http://surf.az/site/surf_cat/3">Политика</a></li>
            <li><a href="http://surf.az/site/surf_cat/4">Общество</a></li>
            <li><a href="http://surf.az/site/surf_cat/5">Культура</a></li>
            <li><a href="http://surf.az/site/surf_cat/6">Веб</a></li>
            <li><a href="http://surf.az/site/surf_cat/7">Наука и технологии</a></li>
            <li><a href="http://surf.az/site/surf_cat/8">Спорт</a></li>
            <li><a href="http://surf.az/site/surf_cat/9">Для женщин</a></li>
            <li><a href="http://surf.az/site/surf_cat/10">Развлечения</a></li>
            <li><a href="http://surf.az/site/surf_cat/11">Здоровье</a></li>
            <li><a href="http://surf.az/site/surf_cat/12">Авто</a></li>
            <li><a href="http://surf.az/site/surf_cat/13">Путешествия</a></li>
            <li><a href="http://surf.az/site/surf_cat/14">Гастрономия</a></li>
            <li><a href="http://surf.az/site/surf_cat/15">Интересное</a></li>
            <li><a href="http://surf.az/site/surf_cat/16">Фото</a></li>
            <li><a href="http://surf.az/site/surf_cat/17">Дизайн</a></li>
            <li><a href="http://surf.az/site/surf_cat/18">Природа</a></li>
            <li><a href="http://surf.az/site/surf_cat/19">Реклама</a></li>
            <li><a href="http://surf.az/site/surf_cat/20">Видео</a></li>
      </ul>
    </div>
  </nav>
</div>




  





<div class="container-fluid">
   
  <div class="masonry-container">
  <div id="columsofsurf" class="row">
    
    	<?php
        if(!$results2){
         		echo "<img style='text-align:center;' src='http://vk.me/images/error404.png'/>";
		}else{
    		foreach ($results2 as $new){
		    $totalsiteid=$new->site_id+1;
		    $tex = $new->site_desc;
		   $text = mb_substr($tex,0, 300);
    
    	?>
    			<a  itemprop="url" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid.'/'.$new->slug; ?>" target="_blank">
		        <div class="col s12 m4 l3 item">

		    	<div class="card hoverable">
		          <div class="card-image waves-effect waves-block waves-light">
		            
		            <img  src="<?php echo $new->site_img_url;?>"  alt="<?php echo $new->site_title;?>">
		            <!-- <span class="card-title">
		            	<?php //echo mb_substr($new->site_title,0,120); ?>
		            </span> -->
		          </div>
		          <div class="card-content">
		          	<h3 class="title" >
		            	<?php echo mb_substr($new->site_title,0,120); ?>
		            </h3>

		             <p class="text-content">
		            	<?php echo strip_tags($text,'<p>');?>
		            </p>
		          </div>
		         
		        </div></div> </a>

		    	
			    
			<?php

			    }
			    }
			?>
    












  </div> 

</div>


</div>

<ul class="pagination center ">
   <?php echo $links; ?>
</ul>
  
  <footer class="page-footer light-blue darken-2" style="padding-top:0 !important">
          <div class="footer-copyright">
            <div class="container">
            © 2015 - <?=date('Y') ?> 

            <span class="right"> surf.az </span>
            <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
            </div>
          </div>
        </footer>    


      <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>materialize/js/materialize.min.js"></script>




    
	<script src="<?php echo base_url();?>libs/modernizr/modernizr.js"></script>
	<script src="<?php echo base_url();?>libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>libs/waypoints/waypoints.min.js"></script>
	<script src="<?php echo base_url();?>libs/plugins-scroll/plugins-scroll.js"></script>
	<script src="<?php echo base_url();?>libs/animate/animate-css.js"></script>

	<script src="<?php echo base_url();?>libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url();?>libs/imagefill/jquery-imagefill.js"></script>
	<script src="<?php echo base_url();?>libs/masonry/masonry.pkgd.min.js"></script>
	<script src="<?php echo base_url();?>js/common.js"></script>

<script type="text/javascript">
  
    
    $(document).ready(function(){

      

      $('.modal-trigger').click(function(){
        $('#nav-mobile').toggle();
        });

       

       $(".button-collapse").sideNav();
    })

  </script>
  <script type="text/javascript">
    $(document).ready(function(){
                      
                      
        //               $.get("http://surf.az/site/get_banners/" , function(data){
          
                                        
                                        
        // //$("#columsofsurf #bannersurfid:nth-child(4n)").after(data);
        // $("#columsofsurf #bannersurfid:nth-child(3)").after(data);

 
        // });
                      
                    
       

  </script>

    </body>
  </html>