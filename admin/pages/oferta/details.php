<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Oferta.php');
$oferta = new Oferta();
$oferta_get;
$oferta_zdjecia;
if (isset($_GET['id'])){
	$oferta_get = $oferta->Get_Cat($_GET['id']);
}
if ($oferta_get != FALSE) {

	$oferta_zdjecia = $oferta->List_Photo($_GET['id']);

?>

<div class="col-md-2 col-md-offset-10" style="text-align: right; margin-bottom: 20px;">
    <a href="oferta-addphoto-<?php echo $_GET['id']; ?>" class="btn btn-success">Dodaj zdjęcie</a>
</div>

<div class="col-md-12 col-xs-12">
    <div class="white-box">
		<div class="row">
			<div class="col-md-6">
				<img class="img-responsive" src="../assets/img/offer-category/<?php echo $oferta_get['Image']; ?>" alt="" />
			</div>
			<div class="col-md-6">
				<h2><?php echo $oferta_get['Title']; ?></h2>
				<p><?php echo $oferta_get['Description']; ?></p>
			</div>
		</div>
	</div>
</div>

<?php if ($oferta->Count_Photo_For_Cat($_GET['id']) > 0) { ?>
<div class="col-md-12 col-xs-12">
	<div class="white-box">
		<div class="row">
<?php
$count = $oferta->Count_Photo_For_Cat($_GET['id']);

foreach ($oferta_zdjecia as $photo) {
			?>
			<div class="col-md-3 img-portfolio">
				<img class="img-responsive img-hover" src="../assets/img/offer-photo/<?php echo $photo['Image']; ?>" alt="" />
				<a href="oferta-deletephoto-<?php echo $photo['ID']; ?>" class="btn btn-danger img-delete-btn"><i class="glyphicon glyphicon-trash"></i></a>
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

