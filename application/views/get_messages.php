<article itemscope="" itemtype="http://schema.org/Article" class="story-container digg-story-el hentry entry story-1wnAqWO col-1   story-col-0" data-content-id="1wnAqWO" data-contenturl="http://digg.com/video/footage-from-the-millions-march-in-nyc" data-position="1" data-diggs="3" data-tweets="29" data-fb-shares="0" data-digg-score="32">
 
<a href="http://cevahir.az" target="_blank"> <img src="http://www.surf.az/images/cevahirjewelleryreklam.png" width="300" height=""></a>
</article>
    
    <article itemscope="" itemtype="http://schema.org/Article" class="story-container digg-story-el hentry entry story-1wnAqWO col-1   story-col-0" data-content-id="1wnAqWO" data-contenturl="http://digg.com/video/footage-from-the-millions-march-in-nyc" data-position="1" data-diggs="3" data-tweets="29" data-fb-shares="0" data-digg-score="32">
 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- surfad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-4906688125295563"
     data-ad-slot="9128563694"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</article>

<article itemscope="" itemtype="http://schema.org/Article" class="story-container digg-story-el hentry entry story-1wnAqWO col-1   story-col-0" data-content-id="1wnAqWO" data-contenturl="http://digg.com/video/footage-from-the-millions-march-in-nyc" data-position="1" data-diggs="3" data-tweets="29" data-fb-shares="0" data-digg-score="32">
 
<a href="http://ucuzal.az" target="_blank"> <img src="http://www.surf.az/images/ucuzalbanner300x250.png" width="300" height=""></a>
</article>
    
    
<?php
        
    foreach ($results2 as $new){
    
   // echo $new['site_url'];
    $totalsiteid=$new->site_id+1;
    $tex = $new->site_desc;
   $text = substr($tex,0, 300);
    
    ?>
    



<article id="bannersurfid" itemscope="" itemtype="http://schema.org/Article" class="story-container digg-story-el hentry entry story-1wnAqWO col-1   story-col-0" data-content-id="1wnAqWO" data-contenturl="http://digg.com/video/footage-from-the-millions-march-in-nyc" data-position="1" data-diggs="3" data-tweets="29" data-fb-shares="0" data-digg-score="32">




<div class="story-image story-image-thumb">
<a itemprop="url" data-position="1" data-content-id="1wnAqWO" class="story-link" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid.'/'.$new->slug; ?>" target="_blank">
    <img class="story-image-img" src="<?php echo $new->site_img_url;?>" width="312" height="" alt="<?php echo $new->site_title;?>">
</a>
</div>




<div class="story-content">
<header class="story-header">


<!--<div itemprop="alternativeHeadline" class="story-kicker" style="color: #F60021;">
LIVE
</div>-->



<h2 itemprop="headline" class="story-title entry-title">
<a class="story-title-link story-link" rel="bookmark" itemprop="url" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid.'/'.$new->slug; ?>" target="_blank">

<?php echo $new->site_title;?>

</a>
</h2>

<div class="story-meta">


<!--<div class="story-score ">
<!--<div class="story-score-diggscore diggscore-1wnAqWO">32</div>
<div class="story-score-details">
<div class="arrow"></div>
<ul class="story-score-details-list">
<li class="story-score-detail story-score-diggs"><span class="label">Diggs:</span> <span class="count diggs-1wnAqWO">3</span></li>
<li class="story-score-detail story-score-twitter"><span class="label">Tweets:</span> <span class="count tweets-1wnAqWO">29</span></li>
<li class="story-score-detail story-score-facebook"><span class="label">Facebook Shares:</span> <span class="count fb_shares-1wnAqWO">0</span></li>
</ul>
</div>
</div>-->












<!--<span class="story-meta-item story-tag first-tag">
<a itemprop="keywords" rel="tag" class="story-meta-item-link story-tag-link" href="http://digg.com/tag/news">News</a>
</span>



<span class="story-meta-item story-tag ">
<a itemprop="keywords" rel="tag" class="story-meta-item-link story-tag-link" href="http://digg.com/video">Video</a>
</span>-->







</div>
</header>



<p itemprop="description" class="story-description entry-content"><?php echo strip_tags($text,'<p>');?></p>



</div>






</article>
    
    
    
    
    
    
    
    
    
<?php

    }
    
?>