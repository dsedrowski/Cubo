<?php
require_once('admin/scripts/Blog.php');
$blog = new Blog();
$blog_get;
if (isset($_GET['id'])){
	$blog_get = $blog->Get($_GET['id']);
}
if ($blog_get != FALSE) {

?>
<div class="container" id="content">
    <div class="col-md-8 col-md-offset-2 col-xs-12">
        <div class="row desc">
            <h2 class="post-heading">
                <?php echo $blog_get['Title']; ?>
            </h2>
            <p>
                <i class="fa fa-clock-o"></i> Post z dnia: <?php echo $blog_get['Date']; ?>
            </p>
            <hr />
            <img class="img-responsive" src="assets/img/blog/<?php echo $blog_get['Image']; ?>" alt="" />

            <p style="margin-top: 30px;">
                <?php echo $blog_get['Description']; ?>
            </p>
        </div>
    </div>
</div>

<?php } else { ?>

<div class="alert alert-danger col-md-12">
    <p>Brak wpisu o podanym ID w bazie danych!</p>
</div>

<?php } ?>

