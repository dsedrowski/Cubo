<!-- #region PRZETWARZANIE FORMULARZA -->
<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Realizacje.php');

$scripts .= "<script src='assets/js/nicEdit.js'></script>";

$scripts .= "<script type='text/javascript'>bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>";

$error = "";
$realizacje = FALSE;

$realizacje = new Realizacje();

$post_id = "";
$post_title = "";
$post_description = "";
$post_short_description = "";
$post_order = "";

if (isset($_POST['submit'])){

	$post_id = $_POST['ID'];
	$post_title = $_POST['Title'];
	$post_description = $_POST['Description'];
	$post_short_description = $_POST['ShortDescription'];
	$post_order = $_POST['OrderNo'];

	$result = $realizacje->Edit_Cat($post_id, $post_title, $post_description, $post_short_description, $post_order);

	if ($result == "" || $result != FALSE){
	    echo "<script type='text/javascript'>
	                        window.location.href = 'realizacje';
	                      </script>";
	}
	else $error .= "Wystąpił błąd podczas edycji rekordu w bazie danych ";

	$realizacje = TRUE;
}
else if (isset($_GET['id'])) {
	$post_id = $_GET['id'];

	$realizacje = $realizacje->Get_Cat($post_id);

	$post_title = $realizacje['Title'];
	$post_description = $realizacje['Description'];
	$post_short_description = $realizacje['ShortDescription'];
	$post_order = $realizacje['OrderNo'];
}


?>
<!-- #endregion -->

<div class="col-md-12">
    <h4 class="page-title">Edytuj kategorię</h4>
</div>

<?php if ($realizacje != FALSE) { ?>
<!-- #region FORMULARZ -->
<div class="alert alert-danger col-md-12" <?php if ($error == "") echo 'style="display: none;"' ?>>
	<?php echo $error; ?>
</div>


<div class="col-md-8 col-xs-12">
	<div class="white-box">
		<form class="form-horizontal form-material" action="" method="post" enctype="multipart/form-data">			
			<div class="form-group">
				<label class="col-md-12">Tytuł</label>
				<div class="col-md-12">
					<input type="text" placeholder="Wpisz tytuł" name="Title" class="form-control form-control-line" <?php if ($post_title != "") echo "value='{$post_title}'"; ?> />
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12">Krótki opis <small>(max 255 znaków)</small></label>
				<div class="col-md-12">
					<textarea class="form-control form-control-line" name="ShortDescription" placeholder="Wpisz opis kategorii" rows="5"><?php if ($post_short_description != "") echo $post_short_description; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12">Opis</label>
				<div class="col-md-12">
					<textarea class="form-control form-control-line" name="Description" placeholder="Wpisz opis kategorii" rows="10"><?php if ($post_description != "") echo $post_description; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-12">Kolejność</label>
				<div class="col-md-12">
					<input type="number" min="1" step="1" placeholder="Podaj kolejność wyświetlania" name="OrderNo" class="form-control form-control-line" <?php if ($post_order != "") echo "value='{$post_order}'"; ?> />
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<input type="hidden" name="ID" value="<?php echo $post_id; ?>" />
					<input type="hidden" name="submit" value="true" />
					<button type="submit" class="btn btn-success">Zapisz</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- #endregion -->
<?php } else { ?>
<div class="alert alert-danger col-md-12">
	<p>Brak kategorii o podanym ID w bazie danych!</p>
</div>
<?php } ?>