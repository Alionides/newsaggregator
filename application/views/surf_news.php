

<div class="container-fluid">
   


  <div class="masonry-container">
  <div id="columsofsurf" class="row">

   <!-- <div class="col s12 m4 l3 item">
     <div class="card hoverable">
      <div class="card-image waves-effect waves-block waves-light"> -->
		<?php
		/* $banner1 = '<a href="http://mado.az" target="_blank"><img src="http://surf.az/images/newbanner.png" />';
		$banner2 = '<a href="http://mado.az" target="_blank"><img src="http://surf.az/images/newbanner2.png" />';
		$banner3 = '<a href="http://mado.az" target="_blank"><img src="http://surf.az/images/newbanner3.png" />';
		$banners = array($banner1, $banner2, $banner3);
		shuffle($banners);
		echo $banners[0];  */
		?>

		<!-- </div>
	   </div>
	  </div> -->

		     <div class="col s12 m4 l3 item">

		    	<div class="card hoverable">
		          <div class="card-image waves-effect waves-block waves-light">
		            
		            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- responsivead -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4906688125295563"
     data-ad-slot="8048452091"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


		          </div>
		         
		        </div>
		    </div> 











    
    	<?php
        if(!$results2){
         		echo "<img style='text-align:center;' src='http://vk.me/images/error404.png'/>";
		}else{
    		foreach ($results2 as $new){
		    $totalsiteid=$new->site_id+1;
		    $tex = $new->site_desc;
		   $text = mb_substr($tex,0, 300);
    
    	?>
    			<a  itemprop="url" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid.'/'.$new->slug; ?>">
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
    

<!-- ////////////////////////////////////////////// -->

<?php
        if($reklams){
         		echo "";
		}else{
    		foreach ($reklams as $new){
		    $totalsiteid=$new->site_id+1;
		    $tex = $new->site_desc;
		   $text = mb_substr($tex,0, 300);
    
    	?>
    			<a  itemprop="url" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid.'/'.$new->slug; ?>">
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
  
 