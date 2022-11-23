<h2><?= $title?></h2>

<?php  foreach($posts as $post) : ?>

    <div class="row">

    <div class= "col-md-3">

<img  class ="post-thumb" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>">
    </div>

    <div class="col-md-9">
    <strong> <?php echo $post['name'];?> </small><br>
<h3><?php echo word_limiter($post['body'],50); ?></h3>
<br>
<p><a  class ="btn btn-default" 

href="<?php echo site_url('/posts/' . $post['slug']); ?>">Read More</a></p>

    </div>
    </div>

<h3><?php echo $post['title']; ?></h3>
<small class ="post-date"> Posted on: <?php echo $post['created_at']; ?> in 

<!-- now we have access to name inside the category table,after the join function in the create section of post_model.php -->



<?php endforeach; ?>
<div class="pagination-links">
<?php echo $this->pagination->create_links(); ?>
</div>