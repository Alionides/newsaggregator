<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model {



 public function __construct()
 {
  parent::__construct();
 }



 function login($email,$password)
 {
  $this->db->where("email",$email);
  $this->db->where("password",$password);

  $query=$this->db->get("users");
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'user_id'  => $rows->id,
      'user_name'  => $rows->username,
      'user_email'    => $rows->email,
      'logged_in'  => TRUE,
    );
   }
   $this->session->set_userdata($newdata);
   return true;
  }
  return false;
 }
 public function add_user()
 {
  $data=array(
    'username'=>$this->input->post('user_name'),
    'email'=>$this->input->post('email_address'),
    'password'=>md5($this->input->post('password'))
  );
  $this->db->insert('user',$data);
 }



function getuserdata($id){
        $this->db->select('*');      
        $this->db->where('id', $id);  

        //$this->db->order_by('id', 'DESC');           
        $query = $this->db->get("users");
       return $query->result();   
    }


///////////////////////////////////////////////////////////////////////////////////





/////// CHECK IF FB USER EXISTS/////////
function checkfbuser($fbemail){      
     
      $this->db->where('email', $fbemail);  

      $query = $this->db->get("users");
       return $query->result();        
    }


    ///////////ad user////////////

    public function addfbuser($fbdata){
        $fbdata = array(
         
            'username' => $fbdata['username'],
            'email' => $fbdata['email'],
            'fbid' => $fbdata['fbid']
            
      );
        $this->db->insert('users', $fbdata);


$this->db->where("email",$fbdata['email']);
  $this->db->where("username",$fbdata['username']);

  $query=$this->db->get("users");
  if($query->num_rows()>0)
  {
   foreach($query->result() as $rows)
   {
    //add all data to session
    $newdata = array(
      'user_id'  => $rows->id,
      'fbid'     => $rows->fbid,
      'user_name'  => $rows->username,
      'user_email'    => $rows->email,
      'logged_in'  => TRUE,
    );
   }
   $this->session->set_userdata($newdata);
   return true;
  }
  //return false;



    }




function getusernews($id){      
      $this->db->order_by('site_id', 'DESC'); 
      $this->db->where('user_id', $id);  

     $this->db->limit(16);
      $query = $this->db->get("sites");
       return $query->result();        
    }

 function user_num_messages($id){          
  $this->db->where('user_id', $id); 
  $query = $this->db->count_all_results('sites');
  return $query;
}

public function fetchusernews($offset,$userid) {

            $this->db->where('user_id', $userid); 
            $this->db->order_by('site_id', 'desc');
            $this->db->limit(16,$offset);
  $query = $this->db->get('sites');
  return $query->result();
        
      
   }

public function insertusernewsmodel($data){
        $data = array(
         
            'site_title' => $data['title'],
            'slug' => $data['slug'],
            'site_img_url' => $data['imgurl'],
            'site_desc' => $data['text'],
            'site_type' => $data['type'],
            'site_cat' => $data['interest'],
            'user_id' => $data['user_id'],
            'user_name' => $data['username']
      );
        $this->db->insert('sites', $data);
    }

function editusernews($link_id,$data2)
  {
       
    $this->db->where('site_id', $link_id);
    $this->db->update('sites', $data2);
                
  }



}
?>