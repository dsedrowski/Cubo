<!-- #region PRZETWARZANIE FORMULARZA -->
<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Slider.php');

$error = "";
$slide = FALSE;

$slider = new Slider();

$post_id = "";
$post_title = "";
$post_url = "";
$post_order = "";

if (isset($_POST['submit'])){

	$post_id = $_POST['ID'];
	$post_title = $_POST['Title'];
	$post_url = $_POST['URL'];
	$post_order = $_POST['OrderNo'];

	$result = $slider->Edit($post_id, $post_title, $post_url, $post_order);

	if ($result == "" || $result != FALSE){
	    echo "<script type='text/javascript'>
	                        window.location.href = 'slider';
	                      </script>";
	}
	else $error .= "Wystąpił błąd podczas edycji rekordu w bazie danych ";

	$slide = TRUE;
}
else if (isset($_GET['id'])) {
	$post_id = $_GET['id'];

	$slide = $slider->GetSlide($post_id);

	$post_title = $slide['Title'];
	$post_url = $slide['URL'];
	$post_order = $slide['OrderNo'];
}


?>
<!-- #endregion -->

<div class="col-md-12">
    <h4 class="page-title">Edytuj zdjęcie</h4>
</div>

<?php if ($slide != FALSE) { ?>
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
				<label class="col-md-12">Odnośnik</label>
				<div class="col-md-12">
					<input type="text" placeholder="Podaj odnośnik slider'a" name="URL" class="form-control form-control-line" <?php if ($post_url != "") echo "value='{$post_url}'"; ?> />
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
	<p>Brak slide'u o podanym ID w bazie danych!</p>
</div>
<?php } ?>