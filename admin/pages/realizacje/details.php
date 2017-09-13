<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Realizacje.php');
$realizacje = new Realizacje();
$realizacje_get;
$realizacje_zdjecia;
if (isset($_GET['id'])){
	$realizacje_get = $realizacje->Get_Cat($_GET['id']);
}
if ($realizacje_get != FALSE) {

	$realizacje_zdjecia = $realizacje->List_Photo($_GET['id']);

?>

<div class="col-md-2 col-md-offset-10" style="text-align: right; margin-bottom: 20px;">
    <a href="realizacje-addphoto-<?php echo $_GET['id']; ?>" class="btn btn-success">Dodaj zdjęcie</a>
</div>

<div class="col-md-12 col-xs-12">
    <div class="white-box">
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" src="../assets/img/realizations-category/<?php echo $realizacje_get['Image']; ?>" alt="" />
			</div>
			<div class="col-md-6">
				<h2><?php echo $realizacje_get['Title']; ?></h2>
				<p><?php echo $realizacje_get['Description']; ?></p>
			</div>
		</div>
	</div>
</div>

<?php if ($realizacje->Count_Photo_For_Cat($_GET['id']) > 0) { ?>
<div class="col-md-12 col-xs-12">
	<div class="white-box">
		<div class="row">
<?php
$count = $realizacje->Count_Photo_For_Cat($_GET['id']);

foreach ($realizacje_zdjecia as $photo) {
			?>
			<div class="col-md-3 img-portfolio">
				<img class="img-responsive img-hover" src="../assets/img/realizations-photo/<?php echo $photo['Image']; ?>" alt="" />
				<a href="realizacje-deletephoto-<?php echo $photo['ID']; ?>" class="btn btn-danger img-delete-btn"><i class="glyphicon glyphicon-trash"></i></a>
			</div>
<?php } 
	  } ?>
		</div>
	</div>
</div>
<?php } else { ?>

<div class="alert alert-danger col-md-12">
    <p>Brak kategorii o podanym ID w bazie danych!</p>
</div>

<?php } ?>

