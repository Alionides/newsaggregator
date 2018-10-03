<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
      <title>Surf.az - 
      <?php foreach ($results as $row)
      { 
      echo $row['site_title'];
      }
      ?>    
      </title>
      <meta property="og:type" content="website">
      <meta property="og:title" content="Surf.az - 
      <?php foreach ($results as $row)
      { 
      echo $row['site_title'];
      }
      ?>" />
      <meta property="og:image" content="<?php foreach ($results as $row)
      { 
        echo $row['site_img_url']; 
      }
          ?>" />
      <meta name="application-name" content="Surf.az">
      <meta name="keywords" content="Surf.az Azərbaycanın ən son xəbərləri. Bu günün ən vacib dünya xəbərləri və aktual hadisələri.Surf.az новости Азербайджана, Грузии, Казахстана, Туркменистана, Узбекистана, Ирана, Турции">
      <meta property="og:description" content="Surf.az - <?php foreach ($results as $row)
      { 
      echo strip_tags($row['site_desc']); 
      }
      ?> 
      " />
      <link rel="icon" href="http://surf.az/images/surffavicon.png" type="image/x-icon">
      <style type="text/css">

    .modal111{

      display: none;
    }

    .hidebtn{visibility: hidden;}
    .showbtn{ visibility: visible;}

    </style>

    <style type="text/css">
.fb-blue-box .d-header{background:#3a5897;}
.fb-blue-box .d-title{background:url(fb-dialog-bg.png) no-repeat 0 100%;text-align:left;color:#fff;font-size:18px!important;line-height:1.3em!important;padding-bottom:20px;}
.fb-blue-box .d-title .d2-facebook-lnk{padding:12px 0px 10px 22px;display:inline-block;}
.fb-blue-box .d-social-widjets{padding-bottom:0px;height:90px;margin-top:15px;padding-left:25px;overflow:visible;}
.d-close{position:absolute;width:22px;height:22px;padding:10px;background:url(http://video.az/assets/desktop/sfbpl/i.png) no-repeat 10px -422px;right:18px;top:21px;cursor:pointer;}
.d-auth-block{display:none;}
.d-title{font-size:26px;line-height:1;font-weight:normal;text-align:center;padding:0 0 30px;}
.d-social-widjets{overflow:hidden;padding:0 0 38px;}
.fb-auth{float:right;border:1px solid #bebebe;width:300px;height:218px;padding:2px 1px 1px 1px;}
.dialog-social{position:fixed;display:none;background:#fff;z-index:10000010;width:445px;-moz-transform:translate(-220px,-290px);-o-transform:translate(-220px,-290px);-ms-transform:translate(-220px,-290px);-webkit-transform:translate(-220px,-290px);transform:translate(-220px,-290px);font:12px/1.2 Helvetica,Arial,sans-serif;}
.dialog-social-center{left:50%;top:50%;box-shadow:0 0 10px rgba(0,0,0,0.5);}
.dialog-social-bg{position:fixed;display:none;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,.3);z-index:450;}
.dialog-social-title{font-size:18px;line-height:1.3em;}
.dialog-social-lnk{padding:12px 0 10px 22px;display:inline-block;}
.dialog-social-widgets{padding-bottom:0;height:90px;overflow:visible;margin-top:15px;}
.dialog-social-auth{padding:12px 12px 20px 12px;text-align:center;}
.dialog-social-auth-link{border-bottom:1px dashed #000;text-decoration:none;font-size:12px;color:#000;}
.dialog-social-fb .dialog-social-header{background:#3a5897;}
.dialog-social-fb .dialog-social-widgets{padding-left:25px;}
.dialog-social-fb .dialog-social-auth{background:#dededd;}
.dialog-social-fb .dialog-social-title{background:url(http://video.az/assets/desktop/sfbpl/fb-dialog-bg.png) no-repeat 0 100%;text-align:left;color:#fff;padding-bottom:20px;}
.dialog-social-fb .d-close{top:7px;background:url(http://video.az/assets/desktop/sfbpl/i.png) no-repeat -22px 0;padding:0;width:42px;height:42px;right:8px;z-index:1;}
.dialog-social-message-block-text{border-top:solid 1px #9daccb;padding:22px 66px 22px 22px;}











#popupwindow {
display:none;
background:rgba(0,0,0,0.6); /*Set Window Background Color*/
width:100%;
height:100%;
position:fixed;
top:0;
left:0;
z-index:99999;
}
#backgroundsetting {
/*width:455px;
height:255px;
position:relative;
background:#ffffff; 
top:20%;
left:2%;
margin:0px auto;*/
}
#imagepopup {
cursor:pointer;
background:url(../images/close.png) no-repeat; /*Close Icon Url*/
height:40px;
width:40px;
margin-top:-248px;
margin-left:423px;
position:absolute;
}
</style>



<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js' type='text/javascript'></script>
<!-- Jquery Code -->
<script type='text/javascript'>
jQuery.cookie = function (key, value, options) {
if (arguments.length > 1 && String(value) !== "[object Object]") {
options = jQuery.extend({}, options);
if (value === null || value === undefined) {
options.expires = -1;
}
if (typeof options.expires === 'number') {
var days = options.expires, t = options.expires = new Date();
t.setDate(t.getDate() + days);
}
value = String(value);
return (document.cookie = [
encodeURIComponent(key), '=',
options.raw ? value : encodeURIComponent(value),
options.expires ? '; expires=' + options.expires.toUTCString() : '',
options.path ? '; path=' + options.path : '',
options.domain ? '; domain=' + options.domain : '',
options.secure ? '; secure' : ''
].join(''));
}
options = value || {};
var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
</script>
<script type='text/javascript'>
jQuery(document).ready(function($){
if($.cookie('popup_user_login') != 'yes'){
$('#popupwindow').delay(1000).fadeIn('medium');
/*You can change Popup window appearing time according to your wish. Note: 1sec = 1000*/
$('#imagepopup,body, #fan-exit').click(function(){
$('#popupwindow').stop().fadeOut('medium');
});
}
$.cookie('popup_user_login', 'yes', { path: '/', expires: 1 });/*By default, the Facebook Popup like box only first time appear when user visits your page. If you would like the facebook like box to popup every time when the page loads, then remove this line of code*/
});
</script>
<script type="text/javascript" async src="https://relap.io/api/v6/head.js?token=IXcOjJ8bRLlEHBkc"></script>
    </head>

    <body>
<div id='popupwindow'>
<div id='backgroundsetting'>






<div style="display: block;" class="dialog-social dialog-social-time dialog-social-center js-dialog dialog-social-fb" id="js-dialog-social-overlay"><div class="d-close" title="Закрыть"></div>
<div class="js-form-block">
 
<div style="display: block;" class="js-block js-block-fb">
<div class="dialog-social-header">
<div class="dialog-social-title">
<a class="dialog-social-lnk" href="https://www.facebook.com/surfaznews" target="_blank"><img src="http://video.az/assets/desktop/sfbpl/fb-dialog-logo.png" alt="facebook"></a>
<div class="dialog-social-message-block-text js-title js-title-default" style="">
Нажмите «Нравится», чтобы читать нас в Facebook
</div>
<div class="dialog-social-message-block-text js-title js-title-after-like" style="display:none;">
Вы великолепны!
</div>
</div>
</div>
<div class="dialog-social-widgets">
<div fb-iframe-plugin-query="action=like&amp;app_id=385333364990301&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsurfaznews&amp;layout=standard&amp;locale=ru_RU&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;width=400" fb-xfbml-state="rendered" class="fb-like fb_iframe_widget" data-event-listener-id="js-dialog-social-overlay" data-event-like="Subscribe" data-ga-skip-trigger="1" data-event-dislike="Unsubscribe" data-ga-category="FacebookGroupOverlayNEW" data-ga-action="Subscribe" data-href="https://www.facebook.com/surfaznews" data-width="400" data-layout="standard" data-action="like" data-show-faces="false" data-share="false" style="overflow:hidden!important"><span style="vertical-align: bottom; width: 400px; height: 28px;"><iframe class="" src="https://www.facebook.com/v2.0/plugins/like.php?action=like&amp;app_id=385333364990301&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df38bc151797c182%26domain%3Dsurf.az%26origin%3Dhttp%253A%252F%252Fsurf.az%252Ff252408d6963d2%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fsurfaznews&amp;layout=standard&amp;locale=ru_RU&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;width=400" style="border: medium none; visibility: visible; width: 400px; height: 28px;" title="fb:like Facebook Social Plugin" scrolling="no" allowfullscreen="true" allowtransparency="true" name="f470fa434ab912" frameborder="0" height="1000px" width="400px"></iframe></span></div>
</div>
</div>
<div class="dialog-social-auth">
<a href="#" class="js-social-overlay-dont-show-me dialog-social-auth-link">Спасибо, мне уже нравится Surf.az!</a>
</div>
</div>
<div class="js-message-block" style="display:none;">
<div class="dialog-social-header">
<div class="dialog-social-title dialog-social-message-block-title">
<a class="dialog-social-lnk" href="https://www.facebook.com/surfaznews" target="_blank"><img src="http://video.az/assets/desktop/sfbpl/fb-dialog-logo.png" alt="facebook"></a>
<div class="dialog-social-message-block-text">Вы великолепны!</div>
</div>
</div>
</div>
</div>








<span style="margin-left:180px;margin-top:-43px; font-family:Times New Roman; font-size:12px; color:#8F8F8F; position:absolute;">Нажмите «Нравится», чтобы читать нас в Фейсбуке.</span>
<div id='imagepopup'>
</div>
</div>
</div>

<!-- Fb like finished -->






      <div id="fb-root"></div>
<script>
// (function(d, s, id) {
//   var js, fjs = d.getElementsByTagName(s)[0];
//   if (d.getElementById(id)) return;
//   js = d.createElement(s); js.id = id;
//   js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=860255567353100";
//   fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));

</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=385333364990301";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


      <div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper light-blue darken-2">
      &nbsp; &nbsp; &nbsp;<a href="http://surf.az" class="brand-logo"><img src="/images/logo.png"</a>
      <a href="#" data-activates="mobile-demo" class="right button-collapse">
        <i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="chip" href="http://az.surf.az">az</a></li>
        <li><a class="chip" href="http://surf.az">ru</a></li>

        <li><a href="http://surf.az/site/surf_cat/1">Новости</a></li>
        <li><a href="http://surf.az/site/surf_cat/2">Бизнес</a></li>
        <li><a href="http://surf.az/site/surf_cat/3">Политика</a></li>
        <li><a href="http://surf.az/site/surf_cat/10">Шоу-бизнес </a></li>
        <li><a href="http://surf.az/site/surf_cat/6">Веб</a></li>
        <li><a href="http://surf.az/site/surf_cat/7">Технологии</a></li>
        <li><a href="http://surf.az/site/surf_cat/8">Спорт</a></li>
        <li><a href="http://surf.az/site/surf_cat/12">Авто</a></li>
        <li><a href="http://surf.az/site/surf_cat/15">Интересное</a></li>


        <li>
          <a href="#search">
        <label for="search"><i class="material-icons">search</i></label>
        </a>
        <div id="search"> 
          <span class="close">X</span>
          <form action="http://surf.az/site/newsearch" method="POST">
            <input type="search" name="search" required placeholder="Поиск">
          </form>
        </div>
        </li>

              <li> <a class="modal-trigger" href="#modal1"><i class="material-icons">menu</i></a> </li>
      </ul>


      <nav id="nav-mobile" class="modal111 light-blue darken-2">
      <ul  class="right hide-on-med-and-down">
            <li><a href="http://surf.az/site/surf_cat/4">Общество</a></li>
            <li><a href="http://surf.az/site/surf_cat/9">Для женщин</a></li>
            <li><a href="http://surf.az/site/surf_cat/5">Культура</a></li>
            <li><a href="http://surf.az/site/surf_cat/21">Ислам</a></li>
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
            <li><a class="chip" href="http://az.surf.az">az</a></li>
            <li><a class="chip" href="http://surf.az">ru</a></li>

            <li><a href="http://surf.az/site/surf_cat/1">Новости</a></li>
            <li><a href="http://surf.az/site/surf_cat/2">Бизнес</a></li>
            <li><a href="http://surf.az/site/surf_cat/3">Политика</a></li>
            <li><a href="http://surf.az/site/surf_cat/4">Общество</a></li>
            <li><a href="http://surf.az/site/surf_cat/5">Культура</a></li>
            <li><a href="http://surf.az/site/surf_cat/6">Веб</a></li>
            <li><a href="http://surf.az/site/surf_cat/7">Технологии</a></li>
            <li><a href="http://surf.az/site/surf_cat/8">Спорт</a></li>
            <li><a href="http://surf.az/site/surf_cat/9">Для женщин</a></li>
            <li><a href="http://surf.az/site/surf_cat/10">Развлечения</a></li>
            <li><a href="http://surf.az/site/surf_cat/11">Здоровье</a></li>
            <li><a href="http://surf.az/site/surf_cat/21">Ислам</a></li>
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
<div class="row">
  <div class="col s12 m8 l9"> 

    <?php
 if(!$results){
     
     echo "<img style='text-align:center;' src='http://vk.me/images/error404.png'/>";
 }
  else
    {  
     foreach ($results as $row)
       { }

      if($row['site_type']==0) {
       


      ?>

        <iframe id='book' frameborder='0'  noresize='noresize' style='margin-top:1px;position: relative; background: transparent; width: 75%; height:1200px;' src="<?= $row['site_url'] ?>" /></iframe>
      
      <?php 
          }

          else

          { 
            

        ?>

 
           <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img alt="<?= $row['site_title'] ?>" class="activator" src="<?= $row['site_img_url'] ?>">
            </div>
          </div>
 

          <div class="card ">
            <div class="card-content">
              <div class="chip">
                <?= $row['date'] ?>
              </div>
            </br>
              <span itemprop='headline' class="card-title"><?= $row['site_title'] ?></span>

              
        
              <div class="contenttext"><p itemprop='description'><?= $row['site_desc'] ?></p></div>
<!--               <div class="fb-share-button" data-href="http://surf.az/site/tapdim/<?= $row['site_id']+1 ?>" data-layout="button_count"></div>
 -->              <div class="fb-share-button" data-href="http://surf.az/site/tapdim/<?= $row['site_id']+1 ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="http://surf.az/site/tapdim/<?= $row['site_id']+1 ?>src=sdkpreparse">Share</a></div>
            <div class='fb-comments' data-width="100%" data-href="http://surf.az/site/tapdim/<?= $row['site_id']+1 ?>" data-numposts='5'></div>


            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="autorelaxed"
                 data-ad-client="ca-pub-4906688125295563"
                 data-ad-slot="2032050495"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>           
          </div>

   
          <div class="container center">
            <span class="center">Похожие новости</span>
            </div>

            <div class="row">
            
            <?php foreach ($similarnews as $key) {
              $totalsiteid=$key->site_id+1;
              $tex = $key->site_desc;
              $text = mb_substr($tex,0, 300);
              
             ?>
          <a  itemprop="url" href="<?php echo base_url();?>site/tapdim/<?php echo $totalsiteid.'/'.$key->slug; ?>">
            <div class="col s12 m6 l4 ">
              <div class="card hoverable small">
                <div class="card-image">
                 <img alt="<?= $key->site_title ?>" class="activator" src="<?= $key->site_img_url ?>">
                      </div>
                      <div class="card-content">
                        
                        <h3 class="title truncate" >
                        <?= $key->site_title ?>
                        </h3>


                      </div>                   
                    </div>
                  </div>
                  <?php } ?>
              </div></a>
        

        <?php
          }
         }
          ?>

   </div>

      
      <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
                  <div class="card">
                      <!-- <div class="card-image">
                        <img src="http://materializecss.com/images/sample-1.jpg">
                        </div> -->

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
                   
                    <div class="card">
                      <div class="card-image">
                        <a href="http://ucuzal.az" target="_blank"><img src="http://www.surf.az/images/ucuzalbanner300x250.png"></a>
                        </div>
                          
                    </div>
                    <div class="card">
                      <div class="card-image">
                        <a href="http://cevahir.az" target="_blank"><img src="http://www.surf.az/images/cevahirjewelleryreklam.png"></a>
                        </div>
                          
                    </div> 


                      <div class="card">
                      <div class="card-image">
                       <script id="n2Cf4CDgdvELJUVF">if (window.relap) window.relap.ar('n2Cf4CDgdvELJUVF');</script>
                        </div>
                       </div>

       </div>

      

</div>
</div>
