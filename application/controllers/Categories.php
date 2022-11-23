<?php

class Categories extends CI_Controller{

    public function index(){

        $data['title'] = ' Categories';


        $data['categories'] = $this->category_model->get_categories();

//to load the templete for header in header code, to load the template for category and also load the template footer with footer code


$this->load->view('templates/header');

//we will pass our data array to the view
$this->load->view('categories/index',$data);
$this->load->view('templates/footer');


    }

public function create(){



    // check login
    //if not logged in redirect to the users/login page

    
    if(!$this->session->userdata('logged_in')){

        redirect('users/login');
        
            }

$data['title'] = 'Create Categories';







$this->form_validation->set_rules('name','Name','required');


if($this->form_validation->run() === FALSE){

    $this->load->view('templates/header');

    //we will pass our data array to the view
    $this->load->view('categories/create',$data);
    $this->load->view('templates/footer');


}else{

$this->category_model->create_category();


// Set message

$this->session->set_flashdata('category_created','Your category has been created');

redirect('categories');

}

}


//the post get an id which ccomes from the third part of the url
public function posts($id){

    // to fetch the title
$data['title']= $this->category_model->get_category($id)->name;


$data['posts'] = $this->post_model->get_posts_by_category($id);

$this->load->view('templates/header');

//we will pass our data array to the view
$this->load->view('posts/index',$data);
$this->load->view('templates/footer');



}
 public function delete($id){

    // check login
    //if not logged in redirect to the users/login page

    
    if(!$this->session->userdata('logged_in')){

        redirect('users/login');
        
            }





//echo $id;
//to call the category model
$this->category_model->delete_category($id);

// Set message

$this->session->set_flashdata('category_deleted','Your category has been deleted');



redirect('categories');

}

}