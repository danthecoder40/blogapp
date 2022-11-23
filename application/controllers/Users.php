<?php


class Users extends CI_Controller{

// register user

public function register(){

$data['title'] = 'sign up';

$this->form_validation->set_rules('name','Name','required');

//$this->form_validation->set_rules('username','Username','required')





$this->form_validation->set_rules('username','Username', 'required|callback_check_username_exists');

$this->form_validation->set_rules('email','Email','required|callback_check_email_exists');

$this->form_validation->set_rules('password','Password','required');

$this->form_validation->set_rules('password2','Confirm Password','matches[password]');

if($this->form_validation->run()===FALSE){
$this->load->view('templates/header');
$this->load->view('users/register',$data);
$this->load->view('templates/footer');

}else{

//die('Continue');

//before we submit through the model we want to encrypt the password


//Encrypt password

$enc_password = md5($this->input->post('password'));


$this->user_model->register($enc_password);


// Set message

$this->session->set_flashdata('user_register','You are now registered and can log in');

redirect('posts');
}

}


// log in user

public function login(){

    $data['title'] = 'sign In';
    
    
    
    //$this->form_validation->set_rules('username','Username','required')
    
    
    
    
    
    $this->form_validation->set_rules('username','Username', 'required|callback_check_username_exists');
    
    
    
    $this->form_validation->set_rules('password','Password','required');
    
    




    
    if($this->form_validation->run()===FALSE){
    $this->load->view('templates/header');
    $this->load->view('users/login',$data);
    $this->load->view('templates/footer');
    
    }else{
    
    
    //Get username
    $username =$this->input->post('username');


    //Get and encrypt the password

    $password = md5($this->input->post('password'));
    
    // login user
    //we will pass in the username and password ($username and $password)


    
// $user_id = $this->user_model->login($username,$password);

// if($user_id){

//     //Create session
//     die('SUCCESS');


// //     $user_data = array(

// // 'user_id'=>$user_id,
// // 'username'=>$username,
// // 'logged_in'=>true




//    // );

// //$this->session->set_userdata($user_data);



// //Create session

// // Set message
    
// $this->session->set_flashdata('user_loggedin','You are now logged in');
    
// redirect('posts');



// }else{


//     // Set message
    
//     $this->session->set_flashdata('login_failed','Login is invalid');
    
//     redirect('users/login');


// }

    

    
//     }
    
// }

// Login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
                        
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					redirect('posts');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}		
			}
		}











//log user out

public function logout(){
//we will killout the session data

// we will unset each individaual one first

//unset user data

$this->session->unset_userdata('logged_in');
$this->session->unset_userdata('user_id');
$this->session->unset_userdata('username');

// Set message
$this->session->set_flashdata('user_loggedout', 'You are now logged out');

redirect('users/login');


}





// check if username exists

public function check_username_exists($username){

$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');



if($this->user_model->check_username_exists($username)){

return true;



}else{

    return false;
}

}

//check if email exists

public function check_email_exists($email){

    $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
    
    
    
    if($this->user_model->check_email_exists($email)){
    
    return true;
    
    
    
    }else{
    
        return false;
    }
    
    }



}
















