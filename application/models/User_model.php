<?php 

class User_model extends CI_MOdel{



    public function register($enc_password){
        //User data array

        $data = array(
'name'=>$this->input->post('name'),
'email'=>$this->input->post('email'),
'username'=>$this->input->post('username'),
'password'=>$enc_password,
'zipcode'=>$this->input->post('zipcode'),

        );


// insert user

return $this->db->insert('users',$data);

    }


// Log user in

public function login($username,$password){

//validate

$this->db->where('username',$username);
$this->db->where('password',$password);

$result= $this->db->get('users');



if($result->num_rows()== 1){


    return $result->row(0)->id; 
}else{

return false;

}


}

// check username exists

 function check_username_exists($username){

$query = $this->db->get_where('users',array('username'=>$username,'password'=>$password));



if(empty($query->row_array())){

return true;

}else{

   return false;
  //echo "good";

  //redirect('posts');
}

}

// check if email exist


public function check_email_exists($email){

    $query = $this->db->get_where('users',array('email'=>$email));
    
    
    
    if(empty($query->row_array())){
    
    return true;
    
    }else{
    
        return false;
    }
    
    }


}