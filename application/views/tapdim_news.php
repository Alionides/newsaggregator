<html >
    <head>
<link href="<?php echo base_url();?>styles/styletapdim.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <div class="loader1"></div>
 <?php
 foreach ($results as $row)
{
     
     echo " <div id='headdiv'   align='center'>
        
         <ul><li id='logo'><a href='http://surf.az/site/tapdim_news/'><img id='' src='http://i.imgur.com/4yyJam4.png' /></a></li>
   <div id='buttonsdiv'><li><a href='http://surf.az/site/surf_interests'  /><img src='https://dabuttonfactory.com/b.png?t=INTERESTS&f=Calibri&ts=24&tc=ffffff&it=png&c=4&bgt=unicolored&bgc=ff8c00&hp=20&vp=11'></img></a></li>      
 <li><a href='http://surf.az/site/tapdim/$row[site_id]'  /><img src='https://dabuttonfactory.com/b.png?t=SURF&f=Calibri&ts=24&tc=ffffff&it=png&c=4&bgt=unicolored&bgc=009bfc&hp=49&vp=11'></img></a></li></div></ul></div>";

     
   //echo $row['site_url'];
 
}
?>

<div id="wrapper">
	<div id="columns" class="row">
      <h1>All your interests in one feed</h1>
      
        <?php
        if(!$results2){
         echo "<img style='text-align:center;' src='http://vk.me/images/error404.png'/>";
}else{
    foreach ($results2 as $new){
    
   // echo $new['site_url'];
    $totalsiteid=$new->site_id+1;
    $tex = $new->site_desc;
   $text = substr($tex,0, 300);
    echo "<div class='pin'>
            <a href='http://surf.az/site/tapdim/$totalsiteid'><div id='divimg'><img id='image' src='$new->site_img_url' class='img-responsive' /></div></a> 
          <h3 id='h3title'>$new->site_title</h3>
         <p id='ptext'> $text</p>
        </div>";
    
}
}
?>
      <div id="page"><h3 id="paging"><?php echo $links; ?></h3></div>
     </div>

    </div>

    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>