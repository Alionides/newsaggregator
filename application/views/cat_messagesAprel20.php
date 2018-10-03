<?php

    foreach ($results2 as $new){
    
   // echo $new['site_url'];
    $totalsiteid=$new->site_id+1;
    $tex = $new->site_desc;
   $text = substr($tex,0, 300);
    
    ?>
    



<article itemscope="" itemtype="http://schema.org/Article" class="story-container digg-story-el hentry entry story-1wnAqWO col-1   story-col-0" data-content-id="1wnAqWO" data-contenturl="http://digg.com/video/footage-from-the-millions-march-in-nyc" data-position="1" data-diggs="3" data-tweets="29" data-fb-shares="0" data-digg-score="32">




<div class="story-image story-image-thumb">
<a data-position="1" data-content-id="1wnAqWO" class="story-link" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid; ?>" target="_self">
    <img class="story-image-img" src="<?php echo $new->site_img_url;?>" width="312" height="170" alt="">
</a>
</div>




<div class="story-content">
<header class="story-header">


<!--<div itemprop="alternativeHeadline" class="story-kicker" style="color: #F60021;">
LIVE
</div>-->



<h2 itemprop="headline" class="story-title entry-title">
<a class="story-title-link story-link" rel="bookmark" itemprop="url" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid; ?>" target="_self">

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



<p itemprop="description" class="story-description entry-content"><?php echo $text;?></p>



</div>

<!--<ul class="story-actions">
<li class="story-action story-action-digg btn-story-action-container"><a class="target digg-1wnAqWO" href="http://digg.com/#">Surf</a></li>
<li class="story-action story-action-save btn-story-action-container"><a class="target save-1wnAqWO" href="http://digg.com/#">Save</a></li>
<li class="story-action story-action-share"><a class="target share-facebook" href="https://www.facebook.com/dialog/feed?redirect_uri=http%3A%2F%2Fdigg.com%2Ffbshare&link=http%3A%2F%2Fon.digg.com%2F1wnAqWO&display=popup&app_id=123277257693179">Facebook</a></li>
<li class="story-action story-action-share"><a class="target share-twitter" href="https://twitter.com/intent/tweet?url=http%3A%2F%2Fon.digg.com%2F1wnAqWO&text=Footage+From+The+Millions+March+In+NYC&via=Digg">Twitter</a></li>
</ul>-->




</article>
    
    
    
    
    
    
    
    
    
<?php

    }
    
?>
    
  