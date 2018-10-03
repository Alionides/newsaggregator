<?php
class Model_get extends CI_Model{


/*  umumi bazani update etmek ucun
function getalltitles(){

  $this->db->select('*');      
        $this->db->order_by('site_id', 'DESC');           
        $query = $this->db->get("sites");
       return $query->result_array();   
}



  function updateall($data = array())
{
    // Check so incoming data is actually an array and not empty
    if (is_array($data) && ! empty($data))
    {
        // We already have a correctly formatted array from the controller,
        // so no need to do anything else here, just update.
        
        // Update rows in database
        $this->db->update_batch('sites', $data, 'site_id');
    }
} 

*/


function getalltitles(){

  $this->db->select('site_id,site_title');      
        $this->db->order_by('site_id', 'DESC');           
        $query = $this->db->get("sites");
       return $query->result_array();   
}



  function updateall($data = array())
{
    // Check so incoming data is actually an array and not empty
    if (is_array($data) && ! empty($data))
    {
        // We already have a correctly formatted array from the controller,
        // so no need to do anything else here, just update.
        
        // Update rows in database
        $this->db->update_batch('sites', $data, 'site_id');
    }
} 



    public function insert($params)
  {
    $this->db->insert('memes', $params);
    return $this->db->insert_id();

  }

    function getsitemap(){
        $this->db->select('*');      
        $this->db->order_by('site_id', 'DESC');           
        $query = $this->db->get("sites");
       return $query->result();   
    }
    
    
    function getData($page){
        
        $query = $this->db->get_where("pageData", array("page"=>$page));
        return $query->result();
    }
    function getDatas(){      
      $query = $this->db->get("pageData");
       return $query->result();          
    }
    
     function getCat(){      
         $this->db->select('*');
          $this->db->where('parent_id', 1);  
           $query = $this->db->get("cat");
       return $query->result();          
    }
     function getServices(){  
          $this->db->select('*');
           $this->db->where('parent_id', 2);     
            $query = $this->db->get("cat");
       return $query->result();          
    }
    
     function getElan($cat_id){  
         $this->db->select('*');
          $this->db->where('cat_id', $cat_id);  
           $query = $this->db->get("elan");
       return $query->result();          
    }
    
    function getAds($id){  
         $this->db->select('*');
        $this->db->where('id', $id);       
        $query = $this->db->get("elan");
       return $query->result();          
        

    }
    
    
    // image bazaya yazmaq ucun
    public function insert_images($image_data = array()){
      $data = array(
          'filename' => $image_data['file_name'],
          'fullpath' => $image_data['full_path']
      );
      $this->db->insert('pagedata', $data);
}
    
    
    /*
    // stumble upon ucun saytlari oxuyan db
     public function getSites() {
                 //$this->db->select('site_url');
        
                  $this->db->select('*');
                  $querys = $this->db->get('sites');
                 $stumble = rand(1,$querys->num_rows() -1);
                  //echo $stumble;
                  
                  $this->db->where('site_id', $stumble);
		 $query = $this->db->get('sites');
                 
                //return $query->result();
                 
                 
                 
  
                 
              return   $query->result_array();
         



       
	}
        
      */

/*public function getSites() {
                 //$this->db->select('site_url');
        
                 ////// $this->db->select('*');
                ///////  $querys = $this->db->get('sites');
                //// //$stumble = rand(1,$querys->num_rows() -1);
                  
                /////  $new = $querys->num_rows();
                 
                  //echo $stumble;
                  
                ////////  $this->db->where('site_id', $stumble);
		///// $query = $this->db->get('sites');
                 
                //return $query->result();
                
                 
                 $this->db->select('*');
                 //$this->db->where('cat', '1');
                 $this->db->order_by('site_id', 'DESC'); 
                 $this->db->limit(1);
                 $query = $this->db->get('sites');
                 
              return   $query->result_array();
         



       
	}
        */
    
 public function getSites($last_id) {
  if($last_id<0){
    $last_id = 0;
  }

 $this->db->select('*');
 if($last_id)
 {
  $this->db->where('site_id <', $last_id);
       
 }
 $this->db->order_by('site_id', 'DESC'); 
 $this->db->limit(1);
 $this->db->where('site_status', 1); //////////statusa gore goruntuleme 0 gorsensin  1gorsenmesin
 $query = $this->db->get('sites');

 return   $query->result_array();
}  

function getfblastnewsru() {

  $this->db->order_by('site_id', 'desc');
  $this->db->where('lang', 1);

  $this->db->where('site_cat', 15);
   

  $this->db->where('site_status', 1);
  $this->db->limit(1);
  $query = $this->db->get('sites');
  return $query->result();
}

function getfblastnews() {

  $this->db->order_by('site_id', 'desc');
  $this->db->where('lang', 0);
  $this->db->where('site_cat', 15);
  $this->db->or_where('site_cat', 10);
  $this->db->or_where('site_cat', 2);
  $this->db->where('site_status', 1);
  $this->db->limit(1);
  $query = $this->db->get('sites');
  return $query->result();
}

 public function checkfbshared($md5val){
      
    $query=$this->db->get_where('fbsharedlinks',array('md5url'=>$md5val['md5url'])); //md5url saytin evveller bazaya daxil olub olmadigini yoxlayir

   if($query->num_rows() != 0)  // id found stop
   {
     return $sharedvalue=0; 
   }
   else // id not found continue..
   {

     return $sharedvalue=1; 

   }  

   
    }

    public function insertfbsharedmd5($newdata){


        $newdata = array(
         
           'md5url' => $newdata['md5url']
           
      );
        $this->db->insert('fbsharedlinks', $newdata);
    }

function getsimilarnews($sitecat) {

  $this->db->order_by('site_id', 'desc');
  $this->db->where('site_cat', $sitecat);
  $this->db->where('lang', 1);
  $this->db->limit(6);
  $query = $this->db->get('sites');
  return $query->result();
}
function getReklams() {

  $this->db->order_by('site_id', 'desc');
  $this->db->where('site_id', 36700);
  $this->db->limit(6);
  $query = $this->db->get('sites');
  return $query->result();
}




/* function getAllSites(){      
      $this->db->order_by('site_id', 'DESC'); 
      $query = $this->db->get("sites");
       return $query->result_array();        
    }
    */
/*  below for adminsurf fetch datas  */
function getAllSitesAdminsurf(){      
      $this->db->order_by('site_id', 'DESC'); 
	   $this->db->limit(16);
      $query = $this->db->get("sites");
       return $query->result();        
    }

    function getallusernews(){   
    $this->db->where('user_id !=',0);
      $this->db->order_by('site_id', 'DESC'); 
     $this->db->limit(16);
      $query = $this->db->get("sites");
       return $query->result();        
    }
    
    /////////////////////////
    function getidDatas($link_id){   
          $this->db->select('*');
$this->db->from('sites');
$this->db->where('site_id', $link_id);
$query = $this->db->get();
$result = $query->result();
return $result;
    }
    
    
    
        
    function editDatas($link_id,$data)
	{
        
		$this->db->where('site_id', $link_id);
		$this->db->update('sites', $data);
                
	}
    
    /////////////////////////

function getAllSites(){      
      $this->db->order_by('site_id', 'DESC'); 
      $query = $this->db->get("sites");
       return $query->result_array();        
    }

    
    
    
    
    public function record_count() {
        return $this->db->count_all("sites");
    }
    
    public function record_count_cat($cat) {
        $this->db->where('site_cat', $cat);
        //return $this->db->count_all("sites");
        return $this->db->count_all_results("sites");
       
    }
    
    public function lastsiteid(){
        $this->db->limit(1);
        $this->db->order_by('site_id', 'DESC'); 
        $query = $this->db->get("sites");
    }
    public function fetch_countries($limit, $start) {
        
          
           /*    
               $q = $this->db->query('SELECT site_id FROM sites ORDER BY site_id DESC LIMIT 1');

$row = $q->row();
$b = $row->site_id+1-5;
           */
        
       if($start < 0){
        $start = 0;
       }
        
        $this->db->limit($limit, $start);
        $this->db->where('lang =',1);
        $this->db->order_by('site_id', 'DESC'); 
        //$this->db->where('site_status', 1); //////////statusa gore goruntuleme 0 gorsensin  1gorsenmesin
        $query = $this->db->get("sites");
 $row = $query->last_row();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
   }
   // ASAGIDAKI KOD SURF NEWS UCUNDUR VE GORUNTULEME STATUSUNA GORE ISLEYIR
   public function fetch_countriessurf($limit, $start) {
        
            
        
        $this->db->limit($limit,1); //1in yerine $start olmalidir
        $this->db->order_by('site_id', 'DESC'); 
        $this->db->where('site_status', 1); //////////statusa gore goruntuleme 0 gorsensin  1gorsenmesin
        $query = $this->db->get("sites");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
   }
   
   public function fetch_bignews(){
        $this->db->select('*');
        $this->db->limit(1);
        $this->db->order_by('site_id', 'DESC'); 
        $this->db->where('site_status', 1);
        $query = $this->db->get("sites");
       return $query->result();          
       
   }
   
   
   
   
   ////AJAX NEWS///
    
   public function fetch_countriessurfajax($offset=1) {
        
            $this->db->order_by('site_id', 'desc');
            $this->db->where('site_status', 1);
            $this->db->limit(15,$offset);
	$query = $this->db->get('sites');
	return $query->result();
        
      
   }
   
   
   
   function num_messages()
{
	$query = $this->db->count_all_results('sites');
	return $query;
}
   


   function get_search($match, $offset=0) {

  $this->db->order_by('site_id', 'desc');
  $this->db->like('site_title', $match);
  $this->db->like('site_desc', $match);
  $this->db->limit(15,$offset);
  $query = $this->db->get('sites');
  return $query->result();
}


function num_search_messages($match = NULL){
  //$this->db->order_by('site_id', 'desc');
  $this->db->like('site_title', $match);
  $this->db->like('site_desc', $match);
  return $this->db->count_all_results("sites");

}
   
   public function fetch_adminajax($offset) {
        
            $this->db->order_by('site_id', 'desc');
            $this->db->limit(16,$offset);
	$query = $this->db->get('sites');
	return $query->result();
        
      
   }
   
   public function fetch_adminajaxusernews($offset) {
            $this->db->where('user_id !=',0);
            $this->db->order_by('site_id', 'desc');
            $this->db->limit(16,$offset);
  $query = $this->db->get('sites');
  return $query->result();
        
      
   }
   
   
   
        //// END AJAX NEWS///
   
   
   
   
    
  public function fetch_countries_cat($limit, $start, $cat) {
        $this->db->limit($limit, $start);
        $this->db->where('site_cat', $cat);
        $this->db->where('lang =', 1);
        $this->db->order_by('site_id', 'DESC'); 
        $this->db->where('site_status', 1); //////////statusa gore goruntuleme 0 gorsensin  1gorsenmesin
        $query = $this->db->get("sites");
 //return $query->result();
       if ($query->num_rows() >= 0) {
           
           
           foreach ($query->result() as $row) {
               $data[] = $row;
            }
            if(!isset($data)){
        $this->db->limit($limit, $start);        
        $this->db->order_by('site_id', 'DESC'); 
        $query = $this->db->get("sites");
            }else{
                
            
            return $data;}
        }
        return false;
   }

   public function get_newsearch($limit, $start, $match = NULL) {
        $this->db->limit($limit, $start);
        $this->db->like('site_title', $match);
        $this->db->like('site_desc', $match);
          $this->db->order_by('site_id', 'DESC'); 
        $this->db->where('site_status', 1); //////////statusa gore goruntuleme 0 gorsensin  1gorsenmesin
        $this->db->where('lang =', 1);
        $query = $this->db->get("sites");
 //return $query->result();
       if ($query->num_rows() >= 0) {
           
           
           foreach ($query->result() as $row) {
               $data[] = $row;
            }
            if(!isset($data)){
        $this->db->limit($limit, $start);        
        $this->db->order_by('site_id', 'DESC'); 
        $query = $this->db->get("sites");
            }else{
                
            
            return $data;}
        }
        return false;
   }

  
    
    
    ////// AJAX CAT NEWS //////
    
    public function fetch_countries_catajax($cat,$offset=0) {
        
        
            $this->db->order_by('site_id', 'desc');
            $this->db->where('site_status', 1);
            $this->db->where('site_cat', $cat);
            $this->db->limit(15,$offset);
	$query = $this->db->get('sites');
	return $query->result();
        
        
        
   }
   
    ////// END  AJAX CAT NEWS //////


    public function insertsurf($data){

/*
        $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
          'md5url' =>$data['md5url'],
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text']
      );
        
        $this->db->insert('sites', $data);

*/



   $query=$this->db->get_where('sites',array('md5url'=>$data['md5url'])); //md5url saytin evveller bazaya daxil olub olmadigini yoxlayir

   if($query->num_rows() != 0)  // id found stop
   {
     return FALSE; 
   }
   else // id not found continue..
   {
       $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
          'md5url' =>$data['md5url'],
          'slug' => $data['slug'],
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text']
      );
        
        $this->db->insert('sites', $data);        
   }    






    }
    // NEWWWWWWWWWWWWWWWWWW          CRON INSERT
    public function insertnewsurfcron($data){
      /*  $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text'],
            'site_cat' => 1,
            'site_status' => 1
      );
        
        $this->db->insert('sites', $data);
*/

        $query=$this->db->get_where('sites',array('md5url'=>$data['md5url'])); //md5url saytin evveller bazaya daxil olub olmadigini yoxlayir

   if($query->num_rows() != 0)  // id found stop
   {
     return FALSE; 
   }
   else // id not found continue..
   {

      $d=strtotime("+9 Hours");
      $date = date("d-m-Y").' | '.date("H:i", $d); 

      $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
          'md5url' =>$data['md5url'],
          'slug' => $data['slug'],
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text'],
            'site_cat' => $data['sitecat'],
            'site_status' => 1,
            'site_type' =>1,
            'date' => $date,
            'lang' => $data['lang']
      );
        
      $this->db->insert('sites', $data);  

          return $id = $this->db->insert_id();   

   }  









    }

    public function getlatestcron($id){


            $this->db->where('site_id', $id);
  $query = $this->db->get('sites');
  return $query->result();
    }
 
    // new  CRON INSERT BITDI
    
    
    
    //CRON INSERT
    public function insertsurfcron($data){
      /*  $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text'],
            'site_cat' => 1,
            'site_status' => 1
      );
        
        $this->db->insert('sites', $data);
*/

        $query=$this->db->get_where('sites',array('md5url'=>$data['md5url'])); //md5url saytin evveller bazaya daxil olub olmadigini yoxlayir

   if($query->num_rows() != 0)  // id found stop
   {
     return FALSE; 
   }
   else // id not found continue..
   {
      $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
          'md5url' =>$data['md5url'],
          'slug' => $data['slug'],
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text'],
            'site_cat' => $data['sitecat'],
            'site_status' => 1
      );
        
        $this->db->insert('sites', $data);       
   }  









    }
 
    //CRON INSERT BITDI
    
    
    
    

public function insertsurfnewsmodel($data){
$d=strtotime("+9 Hours");
$date = date("d-m-Y").' | '.date("H:i", $d); 

        $data = array(
         
           'site_title' => $data['title'],
           'slug' => $data['slug'],
            'site_img_url' => $data['imgurl'],
            'site_desc' => $data['text'],
            'site_type' => $data['type'],
            'site_cat' => $data['interest'],
            'lang' => $data['lang'],
            'site_status' => $data['status'],
            'date'=>$date
      );
        $this->db->insert('sites', $data);
    }
    
    public function deletesurfnews($id)
	{
		$this->db->where('site_id', $id);
		$this->db->delete('sites');
	}

    
    public function get_product($product_id) {
		$this->db->select('id, title, page, text1, text2, fullpath');
		$this->db->where('id', $product_id);
		$query = $this->db->get('pagedata');

		return $query->row_array();
                
	}
    
    public function update_product($product_id, $data)
	{
		$this->db->where('id', $product_id);
		$this->db->update('pagedata', $data);
	}
        
        public function del_product($product_id)
	{
		$this->db->where('id', $product_id);
		$this->db->delete('pagedata');
	}
    
    
    
 public function set_news($image_data = array())
{
	//$this->load->helper('url');

	//$slug = url_title($this->input->post('title'), 'dash', TRUE);

	$data = array(
		'title' => $this->input->post('title'),
		//'slug' => $slug,
		'text1' => $this->input->post('text'),
             'filename' => $image_data['file_name'],
             'fullpath' => $image_data['full_path']
	);

	return $this->db->insert('pagedata', $data);
}
 
    
    
    
}


?>