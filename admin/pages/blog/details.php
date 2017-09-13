<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Blog.php');
$blog = new Blog();
$blog_get;
if (isset($_GET['id'])){
	$blog_get = $blog->Get($_GET['id']);
}
if ($blog_get != FALSE) {

?>

<div class="col-md-8 col-md-offset-2 col-xs-12">
    <div class="white-box">
		<div class="row">
			<div class="col-md-12">

				<hr />
					<p>
						<i class="fa fa-clock-o"></i>Wpis z dnia <?php echo $blog_get['Date']; ?>
						<a href="blog-delete-<?php echo $blog_get['ID']; ?>" class="btn btn-danger pull-right" style="margin-left: 10px;">Usuń</a>
                        <a href="blog-edit-<?php echo $blog_get['ID']; ?>" class="btn btn-warning pull-right">Edytuj</a>
					</p>
				<hr />

				<img class="img-responsive" src="../assets/img/blog/<?php echo $blog_get['Image']; ?>" alt="" />

				<hr />
				<h1 class="text-center" style="font-weight: bold;"><?php echo $blog_get['Title']; ?></h1>
				<hr />
				<div>
					<?php echo $blog_get['Description']; ?>
				</div>
			</div>			
		</div>
	</div>
</div>

<?php } else { ?>

<div class="alert alert-danger col-md-12">
    <p>Brak wpisu o podanym ID w bazie danych!</p>
</div>

<?php } ?>

