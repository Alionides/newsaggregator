<footer class="page-footer light-blue darken-2" style="padding-top:0 !important">
          <div class="footer-copyright">
            <div class="container">
            © 2015 - <?=date('Y') ?> 


            <span class="left">
              <a href="http://barama.az" target="_blank"><img style="" src="http://surf.az/images/baramaaz.png" alt="Barama İnnovasiya və Sahibkarlıq Mərkəzi"></a>  
              </span>

              <span class="right">


              <a href="https://www.facebook.com/shikhiyevagency" target="_blank"><img style="width:120px;" src="http://surf.az/images/SHIKHIYEVWEBSTUDIO.png" alt="Site by Shikhiyev Agency"></a>  


              </span>
            
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

$('a[href="#search"]').on('click', function(event) {                    
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
  });            
  $('#search, #search button.close').on('click keyup', function(event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
      $(this).removeClass('open');
    }
  });   
      

      $('.modal-trigger').click(function(){
        $('#nav-mobile').toggle();
        });

       

       $(".button-collapse").sideNav();
    })

  </script>



<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45474345 = new Ya.Metrika({
                    id:45474345,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45474345" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



  
<!-- built with love by amateurs! -->

 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57560648-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>
  </html>