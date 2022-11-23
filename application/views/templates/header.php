<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogapp</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    
    <script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    
</head>
<body>
    <nav class ="navbar navbar-inverse">
        <div class ="container">
            <div class = "navbar-header">
                <a class ="navbar-brand" href="/">blogapp</a>
</div>

<div id ="navbar">
    <ul class = "nav navbar-nav">
        <li><a href ="<?php echo base_url(); ?>">home</a></li>
        <li><a href ="<?php echo base_url(); ?>/about">about</a></li>
        <li><a href ="<?php echo base_url(); ?>posts">Blog</a></li>

        <li><a href ="<?php echo base_url(); ?>categories">Categories</a></li>

<!-- adding access controllers -->

<?php if(!$this->session->userdata('logged_in')):?>

<!-- if users are not logged in the code below will show -->

</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="<?php echo base_url();?>users/login">login</a></li>


<li><a href="<?php echo base_url();?>users/register">Register</a></li>

<?php endif;?>

<?php if($this->session->userdata('logged_in')):?>

<!-- if users are logged in the code below will show -->


<li><a href="<?php echo base_url();?>posts/create">Create post</a></li>

<li><a href="<?php echo base_url();?>categories/create">Create categories</a></li>
<li><a href="<?php echo base_url();?>users/logout">logout</a></li>

<?php endif;?>
</ul>
</div>
</div>
</nav>

<div class = "container">

<!-- flash messages-->

<?php if($this->session->flashdata('user_register')): ?>

<!-- if the user is register from the function above, then echo the the process below -->

    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_register').'</p>'; ?>

    <?php endif; ?>
    


    



    
    
     <?php if($this->session->flashdata('post_created')): ?>

          
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
        
     <?php endif; ?>


     <?php if($this->session->flashdata('post_updated')): ?>

               
                
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
                
      <?php endif; ?>


     <?php if($this->session->flashdata('category_created')): ?>

                       
                        
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
                        
    <?php endif; ?>

                            
   



   <?php if($this->session->flashdata('post_deleted')): ?>

                       
                        
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
                    
<?php endif; ?>




<?php if($this->session->flashdata('login_failed')): ?>

                       
                        
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
                    
<?php endif; ?>


<?php if($this->session->flashdata('user_loggedin')): ?>

                       
                        
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
                    
<?php endif; ?>

<?php if($this->session->flashdata('user_loggedout')): ?>

                       
                        
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
                    
<?php endif; ?>

<?php if($this->session->flashdata('category_deleted')): ?>

                       
                        
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
                    
<?php endif; ?>