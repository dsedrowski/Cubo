<?php
require_once('admin/scripts/Blog.php');

$blog = new Blog();

$blog = $blog->List_Blog();

?>

<div class="container" id="content">
    <div class="col-md-8 col-md-offset-2">
    <div class="row desc">
        <?php
        if (count($blog) > 0) {
            foreach ($blog as $elem) { ?>
        <h2 class="post-heading">
            <a href="#"><?php echo $elem['Title']; ?></a>
        </h2>
        <p>
            <i class="fa fa-clock-o"></i> Post z dnia: <?php echo $elem['Date']; ?>
        </p>
        <hr />
        <a href="blog-post-<?php echo $elem['ID']; ?>">
            <img class="img-responsive img-hover" src="assets/img/blog/<?php echo $elem['Image']; ?>" alt="" />
        </a>
        <hr />
        <p><?php echo strip_tags(substr($elem['Description'], 0, 400)); ?></p>
        <a class="btn btn-primary btn-green" href="blog-post-<?php echo $elem['ID']; ?>">
            Więcej
            <i class="fa fa-angle-right"></i>
        </a>

        <hr />
        <?php } 
        }
        else { ?>
        <h2 class="text-center">Zapraszamy wkrótce!</h2>
       <?php }?>
    </div>
    </div>
</div>
<!-- #endregion -->