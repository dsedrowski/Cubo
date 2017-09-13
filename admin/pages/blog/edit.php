<!-- #region PRZETWARZANIE FORMULARZA -->
<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Blog.php');

$scripts .= "<script src='assets/js/nicEdit.js'></script>";

$scripts .= "<script type='text/javascript'>bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>";

$error = "";
$blog = FALSE;

$blog = new Blog();

$post_id = "";
$post_title = "";
$post_description = "";

if (isset($_POST['submit'])){

	$post_id = $_POST['ID'];
	$post_title = $_POST['Title'];
	$post_description = $_POST['Description'];
	$result = $blog->Edit($post_id, $post_title, $post_description);

	if ($result == "" || $result != FALSE){
	    echo "<script type='text/javascript'>
	                        window.location.href = 'blog';
	                      </script>";
	}
	else $error .= "Wystąpił błąd podczas edycji rekordu w bazie danych ";

	$blog = TRUE;
}
else if (isset($_GET['id'])) {
	$post_id = $_GET['id'];

	$blog = $blog->Get($post_id);

	$post_title = $blog['Title'];
	$post_description = $blog['Description'];
}


?>
<!-- #endregion -->

<div class="col-md-12">
    <h4 class="page-title">Edytuj wpis</h4>
</div>

<?php if ($blog != FALSE) { ?>
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
				<label class="col-md-12">Opis</label>
				<div class="col-md-12">
					<textarea class="form-control form-control-line" name="Description" placeholder="Wpisz opis kategorii" rows="10"><?php if ($post_description != "") echo $post_description; ?></textarea>
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