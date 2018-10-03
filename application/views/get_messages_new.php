<a href="http://cevahir.az" target="_blank">
    <div class="col s12 m6 l3 item"> 
        <div class="card hoverable ">
                  <div class="card-image waves-effect waves-block waves-light">
 <img src="http://www.surf.az/images/cevahirjewelleryreklam.png" >
</div></div>

</div>
</a>
    
    <div class="col s12 m6 l3 item">
        <div class="card hoverable ">
        <div class="card-image waves-effect waves-block waves-light">

 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- surfad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-4906688125295563"
     data-ad-slot="9128563694"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div></div>
</div>


<a href="http://ucuzal.az" target="_blank">
<div class="col s12 m6 l3 item"> 
    <div class="card hoverable ">
        <div class="card-image waves-effect waves-block waves-light">
 <img src="http://www.surf.az/images/ucuzalbanner300x250.png" width="300" height="">
 </div></div>
</div>   
</a>

    

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
                <div class="col s12 m6 l3 item">

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