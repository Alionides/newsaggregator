<?php
class Model_get extends CI_Model{
    
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



/* function getAllSites(){      
      $this->db->order_by('site_id', 'DESC'); 
      $query = $this->db->get("sites");
       return $query->result_array();        
    }
    */
/*  below for adminsurf fetch datas  */
function getAllSitesAdminsurf(){      
      $this->db->order_by('site_id', 'DESC'); 
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
        
       
        
        $this->db->limit($limit, $start);
       /// $this->db->where('site_id <',$b);
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
        
            
        
        $this->db->limit($limit, $start);
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
    
  public function fetch_countries_cat($limit, $start, $cat) {
        $this->db->limit($limit, $start);
        $this->db->where('site_cat', $cat);
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
    
    
    
    
    


    public function insertsurf($data){
        $data = array(
          'site_url' => $data['title'],//url di eslinde title hansiki view den sayt url i kimi gelir
           'site_title' => $data['basliq'],
            'site_img_url' => $data['img'],
            'site_desc' => $data['text']
      );
        $this->db->insert('sites', $data);
    }

public function insertsurfnewsmodel($data){
        $data = array(
         
           'site_title' => $data['title'],
            'site_img_url' => $data['imgurl'],
            'site_desc' => $data['text'],
            'site_type' => $data['type'],
            'site_cat' => $data['interest']
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