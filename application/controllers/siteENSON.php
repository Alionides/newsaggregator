<?php 

class Site extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_get');
    $this->load->model('User_model');
		$this->load->library('form_validation');
	}

    
    public function index(){
     $this->surf_news();
}

/*  umumi bazani update elemek ucun

public function ghjk(){

     $this->load->helper('text');
    $this->load->model("model_get");

    // Get title and id form database
    // Assuming that $results includes row ID and title
    $results = $this->model_get->getalltitles();

    // Set $data array but leave it empty for now.
    $data = array();

    // Get key and value
    foreach ($results as $key => $value)
    {
        // Clean the slug
        $cleanslug = convert_accented_characters($value['site_title']);

        // Add cleaned title and id to new data array.
        // By using the key value, we create a new array for each row
        // in the already existsing data array that we created earlier.
        // This also gives us the correct formatted array for update_batch()
        // function later.
        
        $data[$key]['slug']    = url_title($cleanslug,'-',TRUE);
        $data[$key]['site_id'] = $value['site_id'];
    }

    // Print out array for debug
    print_r($data);

    // Update database
    $this->model_get->updateall($data);             

}   */



function sitemap()
    {
         $this->load->model("model_get");            
         $data["sitemaps"] = $this->model_get->getsitemap(); 
         // $data = "";//select urls from DB to Array
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }


public function newcronsurf(){
    $this->load->helper('url');
    $this->load->helper('text');
    $this->load->helper('form');
    $this->load->library('rssparser');
    
   
   
  $urls = array(
    
      
      array('http://www.adme.ru/rss/',15,'adme.ru'),
      array('http://www.1news.az/rss.php?sec_id=',1,'1news.az'),
      //array('http://www.forbes.ru/newrss.xml',2),
      array('http://vesti.az/rss',1,'vesti.az'),
      array('http://www.biznesinfo.az/rss/ru/news',2,'biznesinfo.az'),
      array('http://www.biznesinfo.az/rss/az/news',2,'biznesinfo.az'),
      //array('https://news.mail.ru/rss/azerbaijan/',1),
      array('http://www.azadliq.org/api/epiqq',3,'azadliq.org'),
      array('http://feeds.feedburner.com/siliconrus/DLFF',6,'siliconrus.com'),
      //array('http://haqqin.az/rss.xml',1),
      array('http://rss.salamnews.org/ru/',1,'salamnews.org'),
      array('http://rss.salamnews.org/az/',1,'salamnews.org'),
      //array('http://news.day.az/rss/all.rss',1),
      array('http://news.milli.az/rss/',1,'milli.az'),  
      //array('http://feeds.feedburner.com/Terraoko-Languages',18),
      array('http://naked-science.ru/feedrss.xml',7,'naked-science.ru'),
      array('http://24gadget.ru/rss.xml',7,'24gadget.ru'),
      array('http://www.ictnews.az/rss/',7,'ictnews.az'),
      //array('http://geektimes.ru/rss/',7),
      //array('http://megamozg.ru/rss/',6,'megamozg.ru'),
      array('http://k.img.com.ua/rss/ru/health.xml',11,'korrespondent.net'),
      array('http://www.auto.az/news/rss/ru/',12,'auto.az'),
      array('http://technimum.com/rss',7,'technimum.com'),
      array('http://www.infocity.az/?feed=rss2',7,'infocity.az'),
      array('http://www.cluber.com.ua/feed/',9,'cluber.com'),
      array('http://anspress.com/rss/index.php?lng=ru',1,'anspress.com'),
      array('http://sportbox.az/rss',8,'sportbox.az'),
      array('http://www.nkj.ru/rss/',7,'nkj.ru'), 
      array('http://news.day.az/rss/lady/gurmaniya.rss',14,'day.az'), 
      array('http://news.day.az/rss/lady/all.rss',9,'day.az'),       
      array('http://ru.oxu.az/society/feed',4,'oxu.az'),  
      array('http://ikt.news/rss.xml',7,'ikt.news'),
      array('http://www.namigbay.com/feed/',19,'namigbay.com'),  
      array('https://mushfiqshirali.wordpress.com/feed/',19,'mushfiqshirali.wordpress.com'),


   array('http://haqqin.az/rss.xml',1,'haqqin.az'),

   

   array('http://www.vice.com/ru/travel/rss',13,'vice.com'),
   array('http://www.vice.com/ru/fashion/rss',9,'vice.com'),
   array('http://www.vice.com/ru/tech/rss',7,'vice.com'),
   array('http://www.vice.com/ru/food/rss',14,'vice.com'),
   
   //array('http://baku.ws/uploads/sitemap2.xml',1),



      

        ); 
   
    
    
   
    /* $urls = array(
    'http://news.rambler.ru/rss/Azerbaijan/' );   */
    
   //Build a list of urls
 
$randIndex = rand(0, count($urls)-1);

//$cronurl=$urls[$randIndex];

$cronurl=$urls[$randIndex][0];
$croncat=$urls[$randIndex][1];
$source='<br>'.'источник: '.'<a href="http://'.$urls[$randIndex][2].'" target="_blank">'.$urls[$randIndex][2].'</a>';






    // Get 1 items from arstechnica
    $rss = $this->rssparser->set_feed_url($cronurl)->set_cache_life(30)->getFeed(1);

    foreach ($rss as $item)
    {
        //echo $item['link'];
        //echo $item['description'];
    }              
         
    $data['title'] = $item['link'];
    
$ch = curl_init();

$url = $item['link'];


// ancaq kontent goturen kod
include('simple_html_dom.php');
 
// get DOM from URL or file
$html = file_get_html($url);


if($cronurl=='http://www.adme.ru/rss/'){
foreach($html->find('article.js-article-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
}elseif($cronurl=='http://www.1news.az/rss.php?sec_id='){
  foreach($html->find('div#content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
  foreach($html->find('h4#artc_title') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.forbes.ru/newrss.xml') {
foreach($html->find('div.news p') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://vesti.az/rss') {
foreach($html->find('div#art_text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
  foreach($html->find('h1.page_head') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.biznesinfo.az/rss/ru/news') {
foreach($html->find('td.black-13') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
  foreach($html->find('h1.titleB') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.biznesinfo.az/rss/az/news') {
foreach($html->find('td.black-13') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
  foreach($html->find('h1.titleB') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='https://news.mail.ru/rss/azerbaijan/') {
foreach($html->find('div.s-text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://www.azadliq.org/api/epiqq') {
foreach($html->find('div.zoomMe') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://feeds.feedburner.com/siliconrus/DLFF') {
foreach($html->find('div.b-article article') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://haqqin.az/rss.xml') {
foreach($html->find('div.article-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://rss.salamnews.org/ru/') {
foreach($html->find('td.nrt-body1') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
}elseif ($cronurl=='http://rss.salamnews.org/az/') {
foreach($html->find('td.nrt-body1') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
}elseif ($cronurl=='http://news.day.az/rss/all.rss') {
foreach($html->find('div.content span') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://news.milli.az/rss/') {
foreach($html->find('div.article_text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
}elseif ($cronurl=='http://feeds.feedburner.com/Terraoko-Languages') {
foreach($html->find('div.postentry p') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
}elseif ($cronurl=='http://naked-science.ru/feedrss.xml') {
foreach($html->find('div.entry-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('h1.entry-title') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://24gadget.ru/rss.xml') {
foreach($html->find('div.full-text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('h1') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.ictnews.az/rss/') {
foreach($html->find('div#news') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><iframe>").$source;
}elseif ($cronurl=='http://geektimes.ru/rss/') {
foreach($html->find('div.content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
}elseif ($cronurl=='http://megamozg.ru/rss/') {
foreach($html->find('div.content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
}elseif ($cronurl=='http://k.img.com.ua/rss/ru/health.xml') {
foreach($html->find('div.post-item__text p') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
}elseif ($cronurl=='http://www.auto.az/news/rss/ru/') {
foreach($html->find('div.art_content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('div.art_content span') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://technimum.com/rss') {
foreach($html->find('div.topic-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('h1.topic-title') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.infocity.az/?feed=rss2') {
foreach($html->find('div.entry') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('h2.posttitle') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.cluber.com.ua/feed/') {
foreach($html->find('div.post-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
}elseif ($cronurl=='http://anspress.com/rss/index.php?lng=ru') {
foreach($html->find('div.article-body') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
}elseif ($cronurl=='http://sportbox.az/rss') {
foreach($html->find('div#news_contents') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
}elseif ($cronurl=='http://www.nkj.ru/rss/') {
foreach($html->find('main') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://armud.az/rss.xml') {
foreach($html->find('div.box5') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://baku.ws/uploads/sitemap2.xml') {
foreach($html->find('section.news_i_text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
}elseif ($cronurl=='http://news.day.az/rss/lady/gurmaniya.rss') {
foreach($html->find('div.post_content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
  foreach($html->find('div.post_title h1') as $e)
    $page_title = strip_tags($e->innertext,'<h1>');
}elseif ($cronurl=='http://news.day.az/rss/lady/all.rss') {
foreach($html->find('div.post_content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
  foreach($html->find('div.post_title h1') as $e)
    $page_title = strip_tags($e->innertext,'<h1>');
}elseif ($cronurl=='http://ru.oxu.az/society/feed') {
foreach($html->find('div.news-inner') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
  foreach($html->find('div.news-inner h1') as $e)
    $page_title = strip_tags($e->innertext,'<h1>');
}elseif ($cronurl=='http://ikt.news/rss.xml') {
foreach($html->find('div.entry-summary') as $e)
    $newtextdata=strip_tags($e->innertext,"<p>").$source;
  foreach($html->find('h2.entry-title') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.namigbay.com/feed/') {
foreach($html->find('div.entry-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
  foreach($html->find('h1.entry-title') as $e)
    $page_title = strip_tags($e->innertext,'<h1>');
}elseif ($cronurl=='https://mushfiqshirali.wordpress.com/feed/') {
foreach($html->find('div.entry-content') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
  foreach($html->find('h1.entry-title') as $e)
    $page_title = strip_tags($e->innertext,'<h1>');
}elseif ($cronurl=='http://haqqin.az/rss.xml') {
foreach($html->find('div.article-content p') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img>").$source;
  foreach($html->find('div.article h1') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.vice.com/ru/travel/rss') {
foreach($html->find('div.rich-text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('div.article-title-container h1') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.vice.com/ru/fashion/rss') {
foreach($html->find('div.rich-text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('div.article-title-container h1') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.vice.com/ru/tech/rss') {
foreach($html->find('div.rich-text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('div.article-title-container h1') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}elseif ($cronurl=='http://www.vice.com/ru/food/rss') {
foreach($html->find('div.rich-text') as $e)
    $newtextdata=strip_tags($e->innertext,"<p><img><iframe>").$source;
  foreach($html->find('div.article-title-container h1') as $e)
    $page_title = strip_tags($e->innertext,'<p>');
}


// ancaq kontent goturen kod bitdi



curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$titles = array();
//preg_match_all("/<title>(.*)<\/title>/im", $output, &$titles, PREG_PATTERN_ORDER);
// sonuncu bu idi preg_match_all("/<title>(.*)<\/title>/iU", $output, $titles, PREG_PATTERN_ORDER);
preg_match_all("/<title[^>]*>(.*?)<\/title>/is", $output, $titles, PREG_PATTERN_ORDER);

if(!isset($page_title)){
$page_title = $titles[1][0];
}



$images = array();
//preg_match_all("/<img *src= *['\"](.*)['\"](.*)\/*>/iU", $output, &$images, PREG_PATTERN_ORDER);
//sonuncu bu idi preg_match_all("/<img *src= *['\"](.*)['\"](.*)\/*>/iU", $output, $images, PREG_PATTERN_ORDER);
preg_match_all("/([-a-z0-9_\/:.]+\.(jpg|jpeg|png))/i", $output, $images, PREG_PATTERN_ORDER);


$images_found = $images[1];

// Assuming the above tags are at www.example.com



$tags = get_meta_tags($url);
//$yoxla = $tags['description'];
if(empty($tags['description'])){
  $html = file_get_contents($url);
 
    @libxml_use_internal_errors(true);
    $dom = new DomDocument();
    //$dom->loadHTML($html);    
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));   
    $xpath = new DOMXPath($dom);
    $query = '//*/meta[starts-with(@property, \'og:\')]';
    $result = $xpath->query($query);
 
    foreach ($result as $meta) {
        $property = $meta->getAttribute('property');
        $content = $meta->getAttribute('content');
 
        // replace og
        $property = str_replace('og:', '', $property);
        $list[$property] = $content;
    }  
    
    $desc = $list[$property];
    
}
else{
    $desc=$tags['description'];
}

 





// Notice how the keys are all lowercase now, and
// how . was replaced by _ in the key.
//echo $tags['author'];       // name
//echo $tags['keywords'];     // php documentation
//echo $tags['description'];  // a php manual
//echo $tags['geo_position']; // 49.33;-86.59


// sehifenin title kodu                      echo "Page title was: {$page_title}\n";


foreach ($images_found as $image_src)
// sehifenin butun shekilleri  echo "Image: <img src='{$image_src}\n'/>";
    $k = 0;
$area = 0;
$largest_image;
for ($i = 0; $i <= sizeof($images_found); $i++) {
    if (@$images_found[$i]) {
        if (@getimagesize(@$images_found[$i])) {
            list($width, $height, $type, $attr) = getimagesize(@$images_found[$i]);
            // calculate current image area
            $latest_area = $width * $height;
            // if current image area is greater than previous
            if ($latest_area > $area) {
                $area = $latest_area;
                $largest_image = $images_found[$i];
                $k++;
            }
        }
    }
}



//echo "<img src='$largest_image' width='312' height='170'/>";
//echo "</br><h2>{$page_title}\n </h2></br>";
//echo $tags['description'];








                 
    //$data['img']=$largest_image; 

list($width, $height, $type, $attr) = getimagesize($largest_image);

$ratio=$width/$height;

if($ratio<=1.2)
{
$data['img']='http://surf.az/images/surfazdefaultimg.png';
}
else{
   $data['img']=$largest_image;
}

                $data['md5url']=md5($url);
                $data['sitecat']=$croncat;

                $data['basliq']=$page_title;
                $cleanslug = convert_accented_characters($page_title);

                $data['slug'] = url_title($cleanslug,'-',TRUE);
               // $data['text']=$desc;
                $data['text']=$newtextdata;
  
                $this->load->model("model_get");
                     $this->model_get->insertnewsurfcron($data);
                 //$this->load->view("inserturl",$data);
                 $this->adminsurf();
                 
    
}


public function cronsurf(){
    $this->load->helper('url');
    $this->load->helper('text');
    $this->load->helper('form');
    $this->load->library('rssparser');
    
   
   
  $urls = array(
     

      array('http://feeds.feedburner.com/trend/Hbvo',1),             
      array('http://www.forbes.ru/newrss.xml',2),
      array('http://www.vesti.ru/vesti.rss',1),
      array('http://www.1news.az/rss.php?sec_id=',1),
      array('http://www.biznesinfo.az/rss/ru/news',2),
      array('http://www.biznesinfo.az/rss/az/news',2),
      array('http://www.azadliq.org/api/epiqq',3),
      array('https://news.mail.ru/rss/azerbaijan/',1),
      array('http://feeds.feedburner.com/siliconrus/DLFF',6),
      array('http://feeds.feedburner.com/tass/LfRh',1),
      array('http://www.adme.ru/rss/',15),
      array('http://success-secrets.ru/feed/',15),
      array('http://bakupost.az/rss.php',1),
      array('http://sportbox.az/rss',8),
      array('http://news.day.az/rss/all.rss',1),
      array('http://tjournal.ru/rss',6),
      array('http://k.img.com.ua/rss/ru/all_news2.0.xml',1),
      array('http://feeds.feedburner.com/Terraoko-Languages',18),
      array('http://naked-science.ru/feedrss.xml',7),
      array('http://24gadget.ru/rss.xml',7),
      array('http://censor.net.ua/includes/news_ru.xml',1),
      array('http://feeds.feedburner.com/sostav/SpuW',19),
      array('http://www.towave.ru/rss',6),
      array('http://feeds.feedburner.com/snob/JJAy',1),
      array('http://www.amerikaninsesi.org/api/epiqq',3),
      array('http://www.dp.ru/rss/',1),
      array('http://geektimes.ru/rss/',7),
      array('http://www.likeni.ru/rss/news/',6),
      array('http://rss.salamnews.org/ru/',1),
      array('http://rss.salamnews.org/az/',1),
      array('http://redroid.ru/feed/',7),
      array('http://feeds.feedburner.com/www-zr-ru',12),
      array('http://feeds.feedburner.com/spletnik/TaEi',10),
      array('http://www.nkj.ru/rss/',7),
      array('http://www.ictnews.az/rss/',7),
      array('http://avtoklub.az/feed/',12), 
      array('http://www.geo.ru/rss',13),
      array('http://megamozg.ru/rss/',6),
      array('http://anspress.com/rss/index.php?lng=ru',1),
      array('http://feeds.feedburner.com/positime',15),
      array('http://lifenews.ru/xml/feed.xml',1),
      array('http://androidinsider.ru/feed',7),  //desc hamisini taniyan bundan sonraki saytlari taniyacaq
      array('http://lenta.ru/rss',1),
      array('http://feeds.feedburner.com/Qadinaz-QadnlarnSevimliSayt',9),
      array('http://feeds.feedburner.com/qadin/YGlu',9),
      array('http://www.motorpage.ru/rss.xml',12),
      array('http://k.img.com.ua/rss/ru/web.xml',6), 
      array('http://k.img.com.ua/rss/ru/auto.xml',12), 
      array('http://k.img.com.ua/rss/ru/fooddrinks.xml',14), 
      array('http://k.img.com.ua/rss/ru/interiors.xml',17), 
      array('http://k.img.com.ua/rss/ru/health.xml',11), 
      array('http://k.img.com.ua/rss/ru/gadgets.xml',7),
      array('http://k.img.com.ua/rss/ru/fashion.xml',9),
      array('http://k.img.com.ua/rss/ru/technews.xml',7),
      array('http://k.img.com.ua/rss/ru/science.xml',7),
      array('http://k.img.com.ua/rss/ru/space.xml',7),
      array('http://k.img.com.ua/rss/ru/travel.xml',13),
      array('http://macradar.ru/feed/',7),
      array('http://keddr.com/feed/',7),
      array('http://revolverlab.com/rss/index/',7),
      array('http://hi-news.ru/feed',7),
      array('http://avtoklub.az/feed/',12), 
      array('http://ruposters.ru/rss',1), 
      array('http://feeds.feedburner.com/4tololo/erFC',15), 
      array('http://intermedia.az/feed/',1), 
      array('http://www.millixeber.com/rss.php',1), 



      




     /* array('http://ria.ru/export/rss2/politics/index.xml',3),
      array('http://ria.ru/export/rss2/society/index.xml',4),
      array('http://sport.ria.ru/export/rss2/sport/index.xml',8),
      array('http://ria.ru/export/rss2/science/index.xml',7),
      array('http://ria.ru/export/rss2/tourism/index.xml',13),
      array('http://ria.ru/export/rss2/culture/index.xml',5),
      array('http://ria.ru/export/rss2/photolents/index.xml',16),
      array('http://ria.ru/export/rss2/video/index.xml',20),
      array('http://ria.ru/export/rss2/world/index.xml',1), */


      array('http://www.adme.ru/rss/',15),
      array('http://success-secrets.ru/feed/',15),
      array('http://www.psychologies.ru/rss/',11),
      array('http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbc.ru/mainnews.rss',1),
      array('http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/autonews.ru/mainnews.rss',12),
      //array('http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbc.ru/business.rss',2),
      //array('http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/cnews.ru/mainnews.rss',1),
      //array('http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbc.ru/society.rss',4),
      array('http://www.adme.ru/rss/',15),
      array('http://azertag.az/rss',1),
      array('http://news.milli.az/rss/',1),
      array('http://report.az/ru/rss/',1),
      array('http://apasport.az/rss',8),
      array('http://azerisport.com/rss.php',8),
      array('http://obozrevatel.com/rss.xml',1),
      array('http://www.segodnya.ua/xml/rss.html',1),
      array('http://www.sports.ru/rss/all_news.xml',8),
      array('http://www.ictnews.az/rss/index.php?lang=3',7),
      array('http://feeds.feedburner.com/Bakuws-',1),
      array('http://www.bbc.co.uk/azeri/components?batch%5Baudio-video%5D%5Bopts%5D%5Bstrapline_link%5D=%2Fazeri%2Ftopics%2Fvideo&batch%5Baudio-video%5D%5Bopts%5D%5Bloading_strategy%5D=include_content&batch%5Baudio-video%5D%5Bopts%5D%5Basset_id%5D=front_page&batch%5Baudio-video%5D%5Bid%5D=comp-audio-video&batch%5Bmost-popular%5D%5Bopts%5D%5Bloading_strategy%5D=include_content&batch%5Bmost-popular%5D%5Bopts%5D%5Bdevice_groups%5D%5B%5D=group3&batch%5Bmost-popular%5D%5Bopts%5D%5Bdevice_groups%5D%5B%5D=group4&batch%5Bmost-popular%5D%5Bid%5D=comp-most-popular&batch%5Bmost-popular%5D%5Btemplate%5D=%2Fcomponent%2Fmost-popular&batch%5Bfollow-us%5D%5Bopts%5D%5Bloading_strategy%5D=include_content&batch%5Bfollow-us%5D%5Bid%5D=comp-follow-us&batch%5Bfollow-us%5D%5Btemplate%5D=%2Fcomponent%2Ffollow-us/index.xml',1),
      array('http://www.bbc.co.uk/azeri/azerbaijan',3),
      array('http://www.iphones.ru/feed',7),
      array('http://www.vestikavkaza.ru/newrss.php',1),
      array('http://www.cluber.com.ua/feed/',9),
      array('http://technimum.com/rss',7),
      array('http://www.aif.ru/rss/health.php',11),
      array('http://www.aif.ru/rss/politics.php',3),
      array('http://www.aif.ru/rss/sport.php',8),
      array('http://pol-z.ru/feed/',12),
      array('http://ru.uefa.com/rssfeed/news/rss.xml',8),
      array('http://www.woman.ru/rss/',9),
      array('http://lady.tochka.net/rss/moda/',9),
      array('http://lady.tochka.net/rss/sex/',9),
      array('http://lady.tochka.net/rss/children/',9),
      array('http://lady.tochka.net/rss/business-lady/',9),
      array('http://glamurchik.tochka.net/rss/all/',9),
      array('http://afisha.tochka.net/rss/novosti-afishi/',9),
      array('http://lady.tochka.net/rss/zdorovie/',11),
      array('http://lady.tochka.net/rss/gurman/',14),
      array('http://travel.tochka.net/rss/all/',13),
      array('http://nightlife.tochka.net/rss/',10),
      array('http://feeds.feedburner.com/-Designogolikru',17),
      array('http://advertnews.livejournal.com/data/rss',19),
      array('http://adindex.ru/news/news.rss',19),
      array('http://www.qol.az/new/rss_goster.php',8),
      array('http://azxeber.com/rss',1),
      array('http://vesti.az/rss',1),
      array('http://islamazeri.az/rss/',1),
      array('http://wsemir.com/rss.xml',1),
      array('http://www.xezerxeber.com/rss',1),
      array('http://www.infocity.az/?feed=rss2',7),
      array('http://rss.sia.az/az',1),
      array('http://rss.sia.az/ru',1),
      array('http://interfax.az/rss_ru.xml',1),
      array('http://interfax.az/rss_az.xml',1),
      array('http://kayzen.az/rss/new/',15),
      array('http://www.auto.az/news/rss/az/',12),
      array('http://www.auto.az/news/rss/ru/',12),
      array('http://editor.az/rss',1), 






      











      
      
      
     
      
      
      
      
      
        ); 
   
    
    
   
    /* $urls = array(
    'http://news.rambler.ru/rss/Azerbaijan/' );   */
    
   //Build a list of urls
 
$randIndex = rand(0, count($urls)-1);

//$cronurl=$urls[$randIndex];

$cronurl=$urls[$randIndex][0];
$croncat=$urls[$randIndex][1];


    // Get 1 items from arstechnica
    $rss = $this->rssparser->set_feed_url($cronurl)->set_cache_life(30)->getFeed(1);

    foreach ($rss as $item)
    {
        //echo $item['link'];
        //echo $item['description'];
    }              
         
    $data['title'] = $item['link'];
    
$ch = curl_init();

$url = $item['link'];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$titles = array();
//preg_match_all("/<title>(.*)<\/title>/im", $output, &$titles, PREG_PATTERN_ORDER);
// sonuncu bu idi preg_match_all("/<title>(.*)<\/title>/iU", $output, $titles, PREG_PATTERN_ORDER);
preg_match_all("/<title[^>]*>(.*?)<\/title>/is", $output, $titles, PREG_PATTERN_ORDER);

$page_title = $titles[1][0];



$images = array();
//preg_match_all("/<img *src= *['\"](.*)['\"](.*)\/*>/iU", $output, &$images, PREG_PATTERN_ORDER);
//sonuncu bu idi preg_match_all("/<img *src= *['\"](.*)['\"](.*)\/*>/iU", $output, $images, PREG_PATTERN_ORDER);
preg_match_all("/([-a-z0-9_\/:.]+\.(jpg|jpeg|png))/i", $output, $images, PREG_PATTERN_ORDER);


$images_found = $images[1];

// Assuming the above tags are at www.example.com



$tags = get_meta_tags($url);
//$yoxla = $tags['description'];
if(empty($tags['description'])){
  $html = file_get_contents($url);
 
    @libxml_use_internal_errors(true);
    $dom = new DomDocument();
    //$dom->loadHTML($html);    
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));   
    $xpath = new DOMXPath($dom);
    $query = '//*/meta[starts-with(@property, \'og:\')]';
    $result = $xpath->query($query);
 
    foreach ($result as $meta) {
        $property = $meta->getAttribute('property');
        $content = $meta->getAttribute('content');
 
        // replace og
        $property = str_replace('og:', '', $property);
        $list[$property] = $content;
    }  
    
    $desc = $list[$property];
    
}
else{
    $desc=$tags['description'];
}

 





// Notice how the keys are all lowercase now, and
// how . was replaced by _ in the key.
//echo $tags['author'];       // name
//echo $tags['keywords'];     // php documentation
//echo $tags['description'];  // a php manual
//echo $tags['geo_position']; // 49.33;-86.59


// sehifenin title kodu                      echo "Page title was: {$page_title}\n";


foreach ($images_found as $image_src)
// sehifenin butun shekilleri  echo "Image: <img src='{$image_src}\n'/>";
    $k = 0;
$area = 0;
$largest_image;
for ($i = 0; $i <= sizeof($images_found); $i++) {
    if (@$images_found[$i]) {
        if (@getimagesize(@$images_found[$i])) {
            list($width, $height, $type, $attr) = getimagesize(@$images_found[$i]);
            // calculate current image area
            $latest_area = $width * $height;
            // if current image area is greater than previous
            if ($latest_area > $area) {
                $area = $latest_area;
                $largest_image = $images_found[$i];
                $k++;
            }
        }
    }
}



//echo "<img src='$largest_image' width='312' height='170'/>";
//echo "</br><h2>{$page_title}\n </h2></br>";
//echo $tags['description'];








                 
		//$data['img']=$largest_image; 

list($width, $height, $type, $attr) = getimagesize($largest_image);

$ratio=$width/$height;

if($ratio<=1.2)
{
$data['img']='http://surf.az/images/surfazdefaultimg.png';
}
else{
   $data['img']=$largest_image;
}

                $data['md5url']=md5($url);
                $data['sitecat']=$croncat;

                $data['basliq']=$page_title;
                $cleanslug = convert_accented_characters($page_title);

                $data['slug'] = url_title($cleanslug,'-',TRUE);
                $data['text']=$desc;
	
                $this->load->model("model_get");
                     $this->model_get->insertsurfcron($data);
                 //$this->load->view("inserturl",$data);
                 $this->adminsurf();
                 
    
}







    //////////////////////////////////////////////SURF.AZ BASLADI//////////////////////////////////////////////   



              public function surf(){
                  
                  $this->load->view("surfindex");
                  
                  
              }
   
    
                    
              public function tapdim($last_id = FALSE)
       {
              
    
        $this->load->model("model_get");
        $this->load->model("users_model");

    $data["results"] = $this->model_get->getSites($last_id);
    foreach ($data["results"] as $key) {
      # code... 
     //echo $key['user_id'];
    }
    
    // $userid = $data["results"]["user_id"];
     $data["userdatas"] = $this->users_model->getuserdata($key['user_id']);
     $data["totalvote"] = $this->users_model->totalvote($last_id);

     if($data["totalvote"] > 0){

      $data["color"]="#55CA03";

     }else{
      $data["color"]="#F00";
     }
   
    //$this->model_get->getSites($last_id);
    
        
//Stumbleupon example

//@$do = $_REQUEST['do'];

  /*$urls = array(
'http://www.jobsearch.az',
'http://www.boss.az',
'http://www.mashable.com',
'http://www.trend.az',
'http://www.1net.az',
'http://www.technimum.com',
'http://www.apa.az',
'http://www.forbes.com',
'http://www.businessinsider.com',
'http://www.day.az',
'http://www.qafqazinfo.az',
'http://www.bizimyol.info',
'http://www.sia.az',
'http://www.haqqin.az',
'http://www.axar.az',
'http://www.publika.az',
'http://www.lent.az',
'http://www.navigator.az',
'http://www.video.az',
'http://www.aznews.az',
'http://www.modern.az'
        );
  */
 
  
 
   //Build a list of urls
 
//$randIndex = rand(0, count($urls)-1);
//if( (!isset($_SESSION['home'])) && (!isset($_SESSION['away'])) )
//if( (isset($do)) or (!isset($do)) ){ //Just so we can reload a site when the stumble button is pressed
//$max = count($urls); //Count the number of url's we have in our list
//$max = count($data["results"]); //Count the number of url's we have in our list
  
//$stumble = rand(0,$max-1); //Randomly select a url from the list
//////////////////////require("taskbar.php"); //Load the bar at the top of the page and keep it there
//echo "I picked $urls[$stumble]"; //Just an example to show what was picked.


//}

//$data["stumble"] = $stumble;

              
                  $this->load->view("tapdim",$data);
    
    
    
    
       }
   
       
        public function tapdim_surf($last_id = FALSE)
       {
              
    
        $this->load->model("model_get");
    $data["results"] = $this->model_get->getSites($last_id);
    
   
    //$this->model_get->getSites($last_id);
    
        
//Stumbleupon example

//@$do = $_REQUEST['do'];

  /*$urls = array(
'http://www.jobsearch.az',
'http://www.boss.az',
'http://www.mashable.com',
'http://www.trend.az',
'http://www.1net.az',
'http://www.technimum.com',
'http://www.apa.az',
'http://www.forbes.com',
'http://www.businessinsider.com',
'http://www.day.az',
'http://www.qafqazinfo.az',
'http://www.bizimyol.info',
'http://www.sia.az',
'http://www.haqqin.az',
'http://www.axar.az',
'http://www.publika.az',
'http://www.lent.az',
'http://www.navigator.az',
'http://www.video.az',
'http://www.aznews.az',
'http://www.modern.az'
        );
  */
 
  
 
   //Build a list of urls
 
//$randIndex = rand(0, count($urls)-1);
//if( (!isset($_SESSION['home'])) && (!isset($_SESSION['away'])) )
//if( (isset($do)) or (!isset($do)) ){ //Just so we can reload a site when the stumble button is pressed
//$max = count($urls); //Count the number of url's we have in our list
//$max = count($data["results"]); //Count the number of url's we have in our list
  
//$stumble = rand(0,$max-1); //Randomly select a url from the list
//////////////////////require("taskbar.php"); //Load the bar at the top of the page and keep it there
//echo "I picked $urls[$stumble]"; //Just an example to show what was picked.


//}

//$data["stumble"] = $stumble;

              
                  $this->load->view("tapdim_surf",$data);
    
    
    
    
       }
       
       
       
       
       
     /*  public function tapdim_news($last_id = FALSE){
           $this->load->model("model_get");
           $data["results"] = $this->model_get->getSites($last_id);
           $data["news"] = $this->model_get->getAllSites($last_id);
           
           
           
           $this->load->view("tapdim_news",$data);
           
       }*/
       
       
       
       public function tapdim_news(){
           
             $this->load->helper("url");
             $this->load->library("pagination");
             $this->load->model("model_get");
             $last_id = FALSE;
             
           $data["results"] = $this->model_get->getSites($last_id);
         //  $data["news"] = $this->model_get->getAllSites($last_id);
           
           
           
            $config = array();
        $config["base_url"] = base_url() . "site/tapdim_news";
        $config["total_rows"] = $this->model_get->record_count();
        $counts=$this->model_get->record_count();
        $config["per_page"] = 15;
        //$config["use_page_numbers"]=TRUE;
        $config["uri_segment"] = 3;
        $config['next_tag_open'] = '<div class="label label-primary">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="label label-primary">';
        $config['prev_tag_close'] = '</div>';
        $config['first_tag_open'] = '<div class="label label-primary">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="label label-primary">';
        $config['last_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="label label-primary">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<b class="label label-primary">';
        $config['cur_tag_close'] = '</b>';
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data["results2"] =  $this->model_get->fetch_countries($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 

           
           $this->load->view("tapdim_news",$data);
           
       }
       
      /*
        1st edition
        public function surf_news(){
           
             $this->load->helper("url");
             $this->load->library("pagination");
             $this->load->model("model_get");
             $last_id = FALSE;
             
           $data["results"] = $this->model_get->getSites($last_id);
         //  $data["news"] = $this->model_get->getAllSites($last_id);
           
           
           
            $config = array();
        $config["base_url"] = base_url() . "site/surf_news";
        $config["total_rows"] = $this->model_get->record_count();
        $counts=$this->model_get->record_count();
        $config["per_page"] = 15;
        //$config["use_page_numbers"]=TRUE;
        $config["uri_segment"] = 3;
        $config['next_tag_open'] = '<div class="last">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="last">';
        $config['prev_tag_close'] = '</div>';
        $config['first_tag_open'] = '<div class="last">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="last">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<b class="last">';
        $config['cur_tag_close'] = '</b>';
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data["results2"] =  $this->model_get->fetch_countriessurf($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 

           
           $this->load->view("surf_news",$data);
           
       }
       
       
       
       */
       
       
       
       
       
       /*   2nd edition
       public function surf_news(){
           
             $this->load->helper("url");
             $this->load->library("pagination");
             $this->load->model("model_get");
             $last_id = FALSE;
             
           $data["results"] = $this->model_get->getSites($last_id);
         //  $data["news"] = $this->model_get->getAllSites($last_id);
           
           
           
            $config = array();
        $config["base_url"] = base_url() . "site/surf_news";
        $config["total_rows"] = $this->model_get->record_count();
        $counts=$this->model_get->record_count();
        $config["per_page"] = 15;
        //$config["use_page_numbers"]=TRUE;
        $config["uri_segment"] = 3;
        $config['next_tag_open'] = '<div class="last">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="last">';
        $config['prev_tag_close'] = '</div>';
        $config['first_tag_open'] = '<div class="last">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="last">';
        $config['last_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="last">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<b class="last">';
        $config['cur_tag_close'] = '</b>';
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data["results2"] =  $this->model_get->fetch_countriessurf($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data["bignews"] = $this->model_get->fetch_bignews();
 

           
           $this->load->view("surf_news",$data);
           
       }
       
       
       */
       


        public function surf_news(){          
             $this->load->helper("url");
             $this->load->model("model_get");
             $last_id = FALSE;
             
             
        $data["results"] = $this->model_get->getSites($last_id);
        $data["results2"] =  $this->model_get->fetch_countriessurfajax();
        $data['num_messages'] = $this->model_get->num_messages();       
        $data["bignews"] = $this->model_get->fetch_bignews();       
        $this->load->view("surf_news",$data);
           
       }


        public function newsurfaz(){          
             $this->load->helper("url");
             $this->load->model("model_get");
             $last_id = FALSE;
             
             
        $data["results"] = $this->model_get->getSites($last_id);
        $data["results2"] =  $this->model_get->fetch_countriessurfajax();
        $data['num_messages'] = $this->model_get->num_messages();       
        $data["bignews"] = $this->model_get->fetch_bignews();       
        $this->load->view("newsurfaz",$data);
           
       }



       // asagidaki kod ajax uzerinden butun xeberleri fetch edir
       
       function get_messages($offset)
	{
		$this->load->model("model_get");
		$data['results2'] = $this->model_get->fetch_countriessurfajax($offset);
		$this->load->view('get_messages', $data);
	}

  function get_messages_new($offset)
  {
    $this->load->model("model_get");
    $data['results2'] = $this->model_get->fetch_countriessurfajax($offset);
    $this->load->view('get_messages_new', $data);
  }
       
       
       function get_banners()
	{

		$this->load->view('get_banners');
	}
       
       

       function search(){
        $this->load->helper("url");
        $this->load->model("model_get");    
        $match = $this->input->post('search');

        $data["results2"] =  $this->model_get->get_search($match);
        $data['num_messages'] = $this->model_get->num_search_messages($match);   
        $data['search_val'] = $this->input->post('search');
        $this->load->view("search",$data);


       }
       
        function search_messages($match,$offset)
  {
    $this->load->model("model_get");
    $data["results2"] =  $this->model_get->get_search($match,$offset);
    $this->load->view('search_messages', $data);
  }
       
       /*
       
       public function surf_cat($cat){
           
             $this->load->helper("url");
             $this->load->library("pagination");
             $this->load->model("model_get");
             $last_id=false;
             
           $data["results"] = $this->model_get->getSites($last_id);
         //  $data["news"] = $this->model_get->getAllSites($last_id);
           
           
           
            $config = array();
        $config["base_url"] = base_url() . "site/surf_cat/$cat";
        $config["total_rows"] = $this->model_get->record_count_cat($cat);
       
        $config["per_page"] = 15;
        $config["uri_segment"] = 4;
        $config['next_tag_open'] = '<div class="label label-primary">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="label label-primary">';
        $config['prev_tag_close'] = '</div>';
        $config['first_tag_open'] = '<div class="label label-primary">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="label label-primary">';
        $config['last_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="label label-primary">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<b class="label label-primary">';
        $config['cur_tag_close'] = '</b>';
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["results2"] =  $this->model_get->fetch_countries_cat($config["per_page"], $page,$cat);
        $data["links"] = $this->pagination->create_links();
 

           
           $this->load->view("surf_cat",$data);
           
       }
       */
       
        public function surf_cat($cat){
           
             $this->load->helper("url");
             $this->load->model("model_get");
             $last_id=false;
             
       $data["results"] = $this->model_get->getSites($last_id);                   
       $data['num_messages'] = $this->model_get->record_count_cat($cat);
       
       $data["num_cat"]=$cat;
       
       $data["results2"] =  $this->model_get->fetch_countries_catajax($cat);
       
 

           
           $this->load->view("surf_cat",$data);
           
       }
       
       
        function cat_messages($cat,$offset)
	{
		$this->load->model("model_get");
		$data['results2'] = $this->model_get->fetch_countries_catajax($cat,$offset);
		$this->load->view('cat_messages', $data);
	}
       
       
       
       public function profiles($id){
           $this->load->model("users_model");

           if(!$id){
            $id=1;
           }
          
          $data['results']=$this->users_model->getuserdata($id);
          if(!$data['results']){

            redirect('site/surf_news');
          }
        

          $data['results2']=$this->users_model->getusernews($id);
          $data['num_messages'] = $this->users_model->user_num_messages($id);

          $data["num_cat"]=$id;
           
           $this->load->helper('url');
           $this->load->helper('form');
          $this->load->library('form_validation');
             
             
        $this->load->view("profiles",$data);
           
       }
       
       
       function getprofilesnews($offset,$userid)
  {
    //$this->load->model("model_get");
    //$data['results2'] = $this->model_get->fetch_adminajax($offset);

   // $userid = $this->session->userdata('user_id');

    $this->load->model("users_model");
    $data['results2'] = $this->users_model->fetchusernews($offset,$userid);
    $this->load->view('getprofilesnews', $data);
  }
       
       
       public function surf_interests(){
           
             
             $this->load->model("model_get");
             $last_id=false;
             
           $data["results"] = $this->model_get->getSites($last_id);
         
           
           
           
           

           
           $this->load->view("surf_interests",$data);
           
       }
      
       
       
       
 public function welcome()
 {
  $data['title']= 'Welcome';
  $this->load->view('surfindex');
  
 }
 public function login()
 {
  $email=$this->input->post('email');
  $password=md5($this->input->post('pass'));
  
  $this->load->model("user_model");
  
  $result=$this->user_model->login($email,$password);
  if($result) $this->adminsurf();//$this->tapdim();
  else        $this->welcome();
 }
 public function thank()
 {
  $data['title']= 'Thank';
  $this->load->view('header_view',$data);
  $this->load->view('thank_view.php', $data);
  $this->load->view('footer_view',$data);
 }
 public function registration()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

  if($this->form_validation->run() == FALSE)
  {
   //$this->tapdim();
      $this->load->view("surfindex");
  }
  else
  {
       $this->load->model("user_model");
   $this->user_model->add_user();
   //$this->thank();
   $this->tapdim();
   
  }
 }
 public function logout()
 {
  $newdata = array(
  'admin_id'   =>'',
  'admin_name'  =>'',
  'admin_email'     => '',
  'admin_logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
  $this->index();
 }
       
       public function adminsurf(){
           
           
           if($this->session->userdata('admin_name')=="")
  {
     $this->welcome();   }
        else
        {
           
           
           
           $this->load->model("model_get");
          $data['results']=$this->model_get->getAllSitesAdminsurf();
          $data['num_messages'] = $this->model_get->num_messages();
           
           $this->load->helper('url');
           $this->load->helper('form');
             $this->load->library('form_validation');
              //$this->load->model("");              
               //$data["results"] = $this->->getDatas();
             
           
             
		$this->load->view("adminsurf",$data);
           
           }
           
       }

function get_admin($offset)
  {
    $this->load->model("model_get");
    $data['results2'] = $this->model_get->fetch_adminajax($offset);
    $this->load->view('get_admin', $data);
  }


       public function adminshowusernews(){
           
           
           if($this->session->userdata('admin_name')=="")
  {
     $this->welcome();   }
        else
        {
           
           
           
           $this->load->model("model_get");
          $data['results']=$this->model_get->getallusernews();
          $data['num_messages'] = $this->model_get->num_messages();
           
           $this->load->helper('url');
           $this->load->helper('form');
             $this->load->library('form_validation');
              //$this->load->model("");              
               //$data["results"] = $this->->getDatas();
             
           
             
    $this->load->view("adminshowusernews",$data);
           
           }
           
       }
       
       
	   function get_adminusernews($offset)
	{
		$this->load->model("model_get");
		$data['results2'] = $this->model_get->fetch_adminajaxusernews($offset);
		$this->load->view('get_adminusernews', $data);
	}
	   
	   
	   
	   
	   
       
       
       public function inserturl()
	{     $this->load->helper('url');
        $this->load->helper('text');
              $this->load->helper('form');
	       $this->load->library('form_validation');
          $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[250]|xss_clean');
                 
                 if ($this->form_validation->run() == FALSE)
		{
			
                     $this->adminsurf();
		}
                else{
                 $data['title'] = $this->input->post('title');
                 
                 
                 
                 
$ch = curl_init();
$url = $data['title'];
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$titles = array();
//preg_match_all("/<title>(.*)<\/title>/im", $output, &$titles, PREG_PATTERN_ORDER);
// sonuncu  preg_match_all("/<title>(.*)<\/title>/im", $output, $titles, PREG_PATTERN_ORDER);
preg_match_all("/<title[^>]*>(.*?)<\/title>/is", $output, $titles, PREG_PATTERN_ORDER);



$images = array();
//preg_match_all("/<img *src= *['\"](.*)['\"](.*)\/*>/iU", $output, &$images, PREG_PATTERN_ORDER);
// sonuncu bu idi  preg_match_all("/<img *src= *['\"](.*)['\"](.*)\/*>/iU", $output, $images, PREG_PATTERN_ORDER);
preg_match_all("/([-a-z0-9_\/:.]+\.(jpg|jpeg|png))/i", $output, $images, PREG_PATTERN_ORDER);


$page_title = $titles[1][0];
$images_found = $images[1];

// Assuming the above tags are at www.example.com

$tags = get_meta_tags($url);
//$yoxla = $tags['description'];
if(empty($tags['description'])){
  $html = file_get_contents($url);
 
    @libxml_use_internal_errors(true);
    $dom = new DomDocument();
    //$dom->loadHTML($html);    
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));   
    $xpath = new DOMXPath($dom);
    $query = '//*/meta[starts-with(@property, \'og:\')]';
    $result = $xpath->query($query);
 
    foreach ($result as $meta) {
        $property = $meta->getAttribute('property');
        $content = $meta->getAttribute('content');
 
        // replace og
        $property = str_replace('og:', '', $property);
        $list[$property] = $content;
    }  
    
    $desc = $list[$property];
    
}
else{
    $desc=$tags['description'];
}

 
   


//$tags = get_meta_tags($url);

// Notice how the keys are all lowercase now, and
// how . was replaced by _ in the key.
//echo $tags['author'];       // name
//echo $tags['keywords'];     // php documentation
//echo $tags['description'];  // a php manual
//echo $tags['geo_position']; // 49.33;-86.59


// sehifenin title kodu                      echo "Page title was: {$page_title}\n";
foreach ($images_found as $image_src)
// sehifenin butun shekilleri  echo "Image: <img src='{$image_src}\n'/>";
    $k = 0;
$area = 0;
$largest_image;
for ($i = 0; $i <= sizeof($images_found); $i++) {
    if (@$images_found[$i]) {
        if (@getimagesize(@$images_found[$i])) {
            list($width, $height, $type, $attr) = getimagesize(@$images_found[$i]);
            // calculate current image area
            $latest_area = $width * $height;
            // if current image area is greater than previous
            if ($latest_area > $area) {
                $area = $latest_area;
                $largest_image = $images_found[$i];
                $k++;
            }
        }
    }
}

//echo "<img src='$largest_image' width='312' height='170'/>";
//echo "</br><h2>{$page_title}\n </h2></br>";
//echo $tags['description'];
//
//$desc=$tags['description'];
  //$desc = $list[$property];
                 
		//$data['img']=$largest_image;

list($width, $height, $type, $attr) = getimagesize($largest_image);

$ratio=$width/$height;
if($ratio<=1.2)
{
$data['img']='http://surf.az/images/surfazdefaultimg.png';
}
else{
   $data['img']=$largest_image;
}


                $data['md5url']=md5($url);
                $data['basliq']=$page_title;
                $cleanslug = convert_accented_characters($page_title);

                 $data['slug'] = url_title($cleanslug,'-',TRUE);
                $data['text']=$desc;
                
	
                $this->load->model("model_get");
                     $this->model_get->insertsurf($data);
                 //$this->load->view("inserturl",$data);
                 $this->adminsurf();
                
                 
                }
	}
       
       
       
       
       
       
       
       
        
        
        public function insertownnews()
	{     $this->load->helper('url');
        $this->load->helper('text');
              $this->load->helper('form');
	       $this->load->library('form_validation');
          $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[150]|xss_clean');
           $this->form_validation->set_rules('imgurl', 'Imgurl', 'trim|required|min_length[5]|xss_clean');
           $this->form_validation->set_rules('text', 'Text', 'trim|required|min_length[5]|xss_clean');
                 if ($this->form_validation->run() == FALSE)
		{
			
                     $this->adminsurf();
		}
                else{

                  $cleantitle=htmlspecialchars($this->input->post('title'), ENT_QUOTES);
                 //$data['title'] = $this->input->post('title');

                 $data['title'] = $cleantitle;
                 $slug=$data['title'];
                 $cleanslug = convert_accented_characters($slug);
                 $data['slug'] = url_title($cleanslug,'-',TRUE);
                 $data['imgurl'] = $this->input->post('imgurl');
                 $data['text'] = $this->input->post('text');
                 
                 $data['interest'] = $this->input->post('interest');
                 $data['type']=1;
                 
                 
                 $this->load->model("model_get");
                 $this->model_get->insertsurfnewsmodel($data);
                 
                 $this->adminsurf();
                
                 
                }
	}
        
        
        function editsurf($link_id) {
            
            if(($this->session->userdata('admin_name')==""))
  {
     $this->welcome();   }
        else
        {
            
            
            
            $this->load->model("model_get");
            $data_id['data_ids'] = $this->model_get->getidDatas($link_id);
            $this->load->helper('url');
             $this->load->helper('form');
	       $this->load->library('form_validation');
           $this->form_validation->set_rules('title', 'Title', '');
           $this->form_validation->set_rules('imgurl', 'Imgurl', '');
           $this->form_validation->set_rules('text', 'Text', '');
                 
                 if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('editsurf', $data_id); 
                     
		}
		else
		{
			if (isset($_POST) && !empty($_POST))
		{		
			$data['site_title'] = $this->input->post('title');
                 $data['site_img_url'] = $this->input->post('imgurl');
                 $data['site_desc'] = $this->input->post('text');
                 
                 $data['site_cat'] = $this->input->post('interest');
                 $data['site_status'] = $this->input->post('status');
                 //$data['type']=1;
				
			
                    
                     $this->model_get->editDatas($link_id,$data);                    
                     $this->adminsurf();
                                                                                
                        }                   
		} 
                
                }
                
                
                
                
                
                
	}
       
      function deletesurf($id){
           if(($this->session->userdata('admin_name')==""))
  {
     $this->welcome();   }
        else
        {
            
         
          $this->load->model("model_get");
          if($id){             
          $this->model_get->deletesurfnews($id);
          redirect('site/adminsurf');
                    }
                    
               }     

       }
       
       
       
    //////////////////////////////////////////////SURF.AZ BITDI//////////////////////////////////////////////   
       
       

	////////////////////////////////////USERLER BASLADI//////////////////////////////////////////////


       public function userwelcome()
 {
  $data['title']= 'Welcome';
  $this->load->view('usersurfindex');
  
 }

       public function userlogin()
 {
  $email=$this->input->post('email');
  $password=md5($this->input->post('pass'));
  
  $this->load->model("users_model");
  
  $result=$this->users_model->login($email,$password);
  if($result) $this->profile();
  else        $this->userwelcome();
 }
 
 public function userregistration()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

  if($this->form_validation->run() == FALSE)
  {
   //$this->tapdim();
      $this->load->view("surfindex");
  }
  else
  {
       $this->load->model("users_model");
   $this->user_model->add_user();
   //$this->thank();
   $this->tapdim();
   
  }
 }
 public function userlogout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata);
  $this->session->sess_destroy();
  $this->userwelcome();
 }
      

public function profile(){

if(!$this->session->userdata('user_id'))
  {
     //$this->userwelcome();   
    $this->fblogin();
  }
  else
  { 

          $id=$this->session->userdata('user_id');
           
          $this->load->model("users_model");
          $data['results']=$this->users_model->getuserdata($id);

          /*  foreach ($data['results'] as $row) {

          }
          $userid = $row->id;  */


           
           
           
           
           /*$this->load->model("model_get");
          $data['results']=$this->model_get->getAllSitesAdminsurf();
          $data['num_messages'] = $this->model_get->num_messages();*/

          $data['results']=$this->users_model->getusernews($id);
          $data['num_messages'] = $this->users_model->user_num_messages($id);

          $data['username'] = $this->session->userdata('user_name');
          $data['fbid'] = $this->session->userdata('fbid');

           
           $this->load->helper('url');
           $this->load->helper('form');
             $this->load->library('form_validation');
              //$this->load->model("");              
               //$data["results"] = $this->->getDatas();
             
           
    $this->load->view("header",$data);        
    $this->load->view("profile",$data);
           
           }
           
       }

function getusernews($offset)
  {
    //$this->load->model("model_get");
    //$data['results2'] = $this->model_get->fetch_adminajax($offset);

    $userid = $this->session->userdata('user_id');

    $this->load->model("users_model");
    $data['results2'] = $this->users_model->fetchusernews($offset,$userid);
    $this->load->view('getusernews', $data);
  }

////////////////////User News Begin///////////////////////

       public function insertusernews()
  {     $this->load->helper('url');
        $this->load->helper('text');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[150]|xss_clean');
        //$this->form_validation->set_rules('imgurl', 'Imgurl', 'trim|required|min_length[5]|xss_clean');
        $this->form_validation->set_rules('text', 'Text', 'trim|required|min_length[5]|xss_clean');

        //fayl upload kodu
    $config['upload_path'] = './imagenews/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = '2048';
    $config['max_width']  = '2048';
    $config['max_height']  = '2048';
        $this->load->library('upload', $config);


if ($this->form_validation->run() === FALSE)
    {
      
          $this->profile();
    }
else {


      if (!$this->upload->do_upload())
    {
      //$fileerror = 'Şəkil Yüklənmədi';

        //  $this->profile($fileerror);
echo $this->upload->display_errors();

$this->profile();

//$this->load->view('profile'); 
                   
    }
      else {
                 //$data['title'] = $this->input->post('title');


        $data = array('upload_data' => $this->upload->data());
             if($data['upload_data']['image_width']>661 || $data['upload_data']['image_height']>500)
                 {
                 $config['image_library'] = 'gd2';
        $config['source_image'] = './imagenews/'.$data['upload_data']['file_name']; 
        $config['x_axis'] = '0';
        $config['y_axis'] = '0';
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 661;//$data['upload_data']['image_width'];
        $config['height'] = 500;//$data['upload_data']['image_height'];
$this->load->library('image_lib', $config); 

$this->image_lib->initialize($config); 

if ( ! $this->image_lib->crop())
{
    echo $this->image_lib->display_errors();
}
             }
             
else{
     $config['image_library'] = 'gd2';
        $config['source_image'] = './imagenews/'.$data['upload_data']['file_name']; 
        $config['x_axis'] = '0';
        $config['y_axis'] = '0';
        $config['maintain_ratio'] = FALSE;
        $config['width']  = 500;//$data['upload_data']['image_width'];
        $config['height'] = 384;//$data['upload_data']['image_height'];
$this->load->library('image_lib', $config); 

$this->image_lib->initialize($config); 

if ( ! $this->image_lib->crop())
{
    echo $this->image_lib->display_errors();
}
}


$config1['source_image'] = './imagenews/'.$data['upload_data']['file_name']; 
$config1['wm_text'] = 'SURF.AZ';
$config1['wm_type'] = 'text';
$config1['wm_font_path'] = './system/fonts/Calibri_Bold.ttf';
$config1['wm_font_size']  = '18';
$config1['wm_font_color'] = 'ffffff';
$config1['wm_vrt_alignment'] = 'bottom';
$config1['wm_hor_alignment'] = 'right';
$config1['wm_padding'] = '-10';

$this->image_lib->initialize($config1); 

$this->image_lib->watermark();

                 $cleantitle=htmlspecialchars($this->input->post('title'), ENT_QUOTES);

                 $data['title'] = $cleantitle;
                 $slug=$data['title'];
                 $cleanslug = convert_accented_characters($slug);
                 $data['slug'] = url_title($cleanslug,'-',TRUE);
                // $data['imgurl'] = $this->input->post('imgurl');
                 $data['imgurl'] = 'http://surf.az/imagenews/'.$data['upload_data']['file_name'];
                 $data['text'] = $this->input->post('text');              
                 $data['interest'] = $this->input->post('interest');
                 $data['type']=1;
                 $data['user_id']=$this->session->userdata('user_id');
                 $data['username']=$this->session->userdata('user_name');
                 
                 
                 $this->load->model("users_model");
                 $this->users_model->insertusernewsmodel($data);
                 
                 $this->profile();               
                 
                }
            }
  }

  function editusernews($link_id = FALSE) 
  {
            
            if(($this->session->userdata('user_name')==""))
            {
               $this->profile();   
            }
        else
            {
            
            
            
           $this->load->model("model_get");
           $data_id['data_ids'] = $this->model_get->getidDatas($link_id);



////////////////////////////////////////////////////////
                foreach ($data_id['data_ids'] as $row) {

          }
          $userid = $row->user_id;  

///////////////////////////////////////////

                   if($this->session->userdata('user_id')!=$userid)
                   {

                      $this->profile(); 
                   }

               else{

           $this->load->helper('url');
           $this->load->helper('text');
           $this->load->helper('form');
           $this->load->library('form_validation');
           $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[150]|xss_clean');
           //$this->form_validation->set_rules('imgurl', 'Imgurl', 'trim|required|min_length[5]|xss_clean');
           $this->form_validation->set_rules('text', 'Text', 'trim|required|min_length[5]|xss_clean');
           $data_id['username'] = $this->session->userdata('user_name');   
           $data_id['fbid'] = $this->session->userdata('fbid'); 







      if ($this->form_validation->run() == FALSE)
    { 

      $this->load->view("header",$data_id);
      $this->load->view('editusernews', $data_id); 
                     
    }
    else
    {
      if (isset($_POST) && !empty($_POST))
         {   

  //fayl upload kodu
    $config['upload_path'] = './imagenews/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = '2048';
    $config['max_width']  = '2048';
    $config['max_height']  = '2048';
    $this->load->library('upload', $config);


   
if (!$this->upload->do_upload())
    {
       $data['site_img_url'] = $this->input->post('hiddenimg');
                   
    }
      else {
                 //$data['title'] = $this->input->post('title');

        $this->load->library('upload', $config);

        $data = array('upload_data' => $this->upload->data());

        $pizza  = $this->input->post('hiddenimg');
        $pieces = explode("http://surf.az/", $pizza);
//echo $pieces[0]; // piece1
//echo $pieces[1]; // piece2   

        unlink("./".$pieces[1]); 
        $data2['site_img_url'] = 'http://surf.az/imagenews/'.$data['upload_data']['file_name'];

      /*  $image_data=$this->upload->data();

        $newsimg = $image_data['file_name'];
             
        $data['site_img_url'] = $newsimg;*/


        
        if($data['upload_data']['image_width']>661 || $data['upload_data']['image_height']>500)
                 {
                 $config['image_library'] = 'gd2';
        $config['source_image'] = './imagenews/'.$data['upload_data']['file_name']; 
        $config['x_axis'] = '0';
        $config['y_axis'] = '0';
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 661;//$data['upload_data']['image_width'];
        $config['height'] = 500;//$data['upload_data']['image_height'];
$this->load->library('image_lib', $config); 

$this->image_lib->initialize($config); 

if ( ! $this->image_lib->crop())
{
    echo $this->image_lib->display_errors();
}

   }            
else
   {
     $config['image_library'] = 'gd2';
        $config['source_image'] = './imagenews/'.$data['upload_data']['file_name']; 
        $config['x_axis'] = '0';
        $config['y_axis'] = '0';
        $config['maintain_ratio'] = FALSE;
        $config['width']  = 500;//$data['upload_data']['image_width'];
        $config['height'] = 384;//$data['upload_data']['image_height'];
$this->load->library('image_lib', $config); 

$this->image_lib->initialize($config); 

if ( ! $this->image_lib->crop())
{
    echo $this->image_lib->display_errors();
}

}



$config1['source_image'] = './imagenews/'.$data['upload_data']['file_name']; 
$config1['wm_text'] = 'SURF.AZ';
$config1['wm_type'] = 'text';
$config1['wm_font_path'] = './system/fonts/Calibri_Bold.ttf';
$config1['wm_font_size']  = '18';
$config1['wm_font_color'] = 'ffffff';
$config1['wm_vrt_alignment'] = 'bottom';
$config1['wm_hor_alignment'] = 'right';
$config1['wm_padding'] = '-10';

$this->image_lib->initialize($config1); 
$this->image_lib->watermark();




}







                 $data2['site_title'] = $this->input->post('title');
               //  $data['site_img_url'] = $this->input->post('imgurl');
                 $data2['site_desc'] = $this->input->post('text');
                 
                 $data2['site_cat'] = $this->input->post('interest');
                 $data2['site_status'] = $this->input->post('status');
                 //$data['type']=1;
                 $data2['user_id']=$this->session->userdata('user_id');
                 $data2['user_name']=$this->session->userdata('user_name');
      
                $this->load->model("users_model");   
                $this->users_model->editusernews($link_id,$data2);                    
                $this->profile();
                                                                                
          }                   
        }   
      }
    }                                                                                    
  }

function deleteusernews($id=FALSE)
{
           if(($this->session->userdata('user_name')==""))
       {
        $this->profile();   
       }
        else
    {
            

           $this->load->model("model_get");
           $data_id['data_ids'] = $this->model_get->getidDatas($id);



////////////////////////////////////////////////////////
          foreach ($data_id['data_ids'] as $row) 
          {

          }
          
          $userid = $row->user_id; 
          $delimg= $row->site_img_url;

///////////////////////////////////////////

                   if($this->session->userdata('user_id')!=$userid)
                   {

                      $this->profile(); 
                   }



  else{ 
         
          $this->load->model("model_get");
          if($id)
          {

        
        $pieces = explode("http://surf.az/", $delimg);


        unlink("./".$pieces[1]); 


            

          $this->model_get->deletesurfnews($id);
          //redirect('site/adminsurf');
          $this->profile();   

          }


      }





                    
    }     
}


public function upload()
  {
    // Allowed extentions.
    $allowedExts = array("gif", "jpeg", "jpg", "png");

    // Get filename.
    $temp = explode(".", $_FILES["file"]["name"]);

    // Get extension.
    $extension = end($temp);

    // An image check is being done in the editor but it is best to
    // check that again on the server side.
    // Do not use $_FILES["file"]["type"] as it can be easily forged.
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["file"]["tmp_name"]);

    if ((($mime == "image/gif")
    || ($mime == "image/jpeg")
    || ($mime == "image/pjpeg")
    || ($mime == "image/x-png")
    || ($mime == "image/png"))
    && in_array($extension, $allowedExts)) {
        // Generate new random name.
        $name = sha1(microtime()) . "." . $extension;

        // Save file in the uploads folder.
        move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/newimage/" . $name);

        // Generate response.
        $response = new StdClass;
        $response->link = "http://surf.az/newimage/" . $name;
        echo stripslashes(json_encode($response));
    } 
  }



//////////////fb login code stART//////////////////
public function fblogin(){
    $this->load->helper('url');  ///sonradan yazdim
    $this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

    $user = $this->facebook->getUser();
        
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('site/fblogout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

///////////////////////////////////////////////////
/*foreach ($data['user_profile'] as $row) {
          # code...
        }*/


         $fbemail = $data['user_profile']['email'];

         $fbdata['username'] = $data['user_profile']['name']; //$row['name'];
         $fbdata['email'] = $data['user_profile']['email'];//$row['email'];
         $fbdata['fbid'] = $data['user_profile']['id'];

       //echo $fbemail;
          $this->load->model("users_model");
          $data['results']=$this->users_model->checkfbuser($fbemail);

          if(!$data['results']){

          $this->load->model("users_model");
          $this->users_model->addfbuser($fbdata);

          }else{

          $fbemail = $data['user_profile']['email'];

      

       //echo $fbemail;
          $this->load->model("users_model");
          $data['results']=$this->users_model->checkfbuser($fbemail);
            foreach ($data['results'] as $rows) {

          }
          

    $newdata1 = array(
      'user_id'  => $rows->id,
      'fbid'  => $rows->fbid,
      'user_name'  => $rows->username,
      'user_email'    => $rows->email,
      'logged_in'  => TRUE,
    );

       $this->session->set_userdata($newdata1);

   }
          
    $this->profile();

   


///////////////////////////////////////////////////////////



////////////////////////////////////////////////////////




        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('site/fblogin'), 
                'scope' => array("email") // permissions here
            ));

        $this->load->view('fblogin',$data);



        }

        



  }

    public function fblogout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata);
  $this->session->sess_destroy();
  $this->surf_news();



      //  redirect('site/fblogin');
    }

    ////////////////fb code ends//////////////////////////////



////////////////////User News  End///////////////////////

public function vote($voteid,$siteid){

if(!$this->session->userdata('user_id'))
  {
     //$this->userwelcome();   
    $this->fblogin();
  }
  else
  { 

    $this->load->model("users_model");
    if($voteid==1){
      // like ucun
      $vote = 1;
    }else{
      // duslike ucun
      $vote = -1;
    }

    $data['user_id']=$this->session->userdata('user_id');
    $data['siteid']=$siteid;
    $data['vote']=$vote;
    $this->users_model->insertvote($data);

    $newid=$siteid+1;

    redirect('site/tapdim/'.$newid, 'refresh');
    //$this->tapdim();    

  }


}


  ////////////////////////////////////USERLER BITDI//////////////////////////////////////////////

	
        
     
////////////////////////MEME CREATOR///////////////////////////////
public function generate()
  {
   // $this->check_login();
    //$this->template_file = 'template/main';
   //$this->view = 'main/generate';
    $this->load->view('generate');
  }
  

  
  public function create()
  {

    if($message = $this->input->post('text') )

    {



    $text = $this->input->post('text');
    $title = $this->input->post('title');
    $message = $this->input->post('message');
    $image = $_FILES['fondo']['name'];
    $image_type = $_FILES['fondo']['type'];
    $date = date('Y-m-d');
    
    $params = array(
      'title' => $title,
      'text' => $text,
      'message' => $message,
      'image' => $image,
      'date' => $date
    );
        
    switch($image_type)
    {
      case 'image/png':
        $params['type'] = 'png';
        break;
      case 'image/jpeg':
        $params['type'] = 'jpg';
        break;
      case 'image/gif':
        $params['type'] = 'gif';
        break;
    }
    

    $this->load->model("model_get");

    $meme_id = $this->model_get->insert($params);
    
    move_uploaded_file($_FILES["fondo"]["tmp_name"], "statics/memes/temp/".$image);
    chmod("statics/memes/temp/".$image, 0777); 
        
    
    switch($image_type)
    {
      case 'image/png':
        $imagen = imagecreatefrompng("statics/memes/temp/".$image);
        break;
      case 'image/jpeg':
        $imagen = imagecreatefromjpeg("statics/memes/temp/".$image);
        break;
      case 'image/gif':
        $imagen = imagecreatefromgif("statics/memes/temp/".$image);
        break;
    }
    
    $size = getimagesize("statics/memes/temp/".$image);
    
    $fondo = imagecreatetruecolor(($size[0] + 30), ($size[1] + 220));
    $negro = imagecolorallocate($imagen,255,255,255);

    $fuente = 'statics/fonts/nissanag-bold-webfont.ttf';

    // Añadir algo de sombra al texto

    // shrift, bucaq, soldan mesafe, hundurluk   asagida $fondo yerine imagen olanda fotonun uzerine yazir
    imagettftext($fondo, 20, 0, 20, 40, $negro, $fuente, $text);

    // Añadir el texto
    imagettftext($fondo, 20, 0, 20, $size[1] + 150, $negro, $fuente, $message);
    // surf.az yazisi 
    imagettftext($fondo, 16, 0, $size[0] - 50, $size[1] + 210, $negro, $fuente, 'surf.az');

    //imagefilledrectangle ( $imagen , 0 , 289 , 470 , 300 , $negro );

    imagecopymerge($fondo, $imagen, 15,110,0,0, $size[0], $size[1], 100);
    
    switch($image_type)
    {
      case 'image/png':
        imagepng($fondo, "statics/memes/created/".$meme_id.".png");
        break;
      case 'image/jpeg':
        imagejpeg($fondo, "statics/memes/created/".$meme_id.".jpg");
        break;
      case 'image/gif':
        imagegif($fondo, "statics/memes/created/".$meme_id.".gif");
        break;
    }
    
    imagedestroy($imagen);
    imagedestroy($fondo);
    
    chmod("statics/memes/created/".$meme_id.".".$params['type'], 0777);

   // header("Content-type: image/jpeg");



$file['demotivator'] = "/statics/memes/created/".$meme_id.".".$params['type'];
/*$type = 'image/jpeg';
header('Content-Type:'.$params['type']);
header('Content-Length: ' . filesize($file));
readfile($file);*/

//echo '<img src="'.$file.'"/>';

    
    //redirect('/');
$this->load->view('demotivator',$file);

}
    
  }

  //////////////////////MEME Creator bitdi/////////////////////////////////




}
?>