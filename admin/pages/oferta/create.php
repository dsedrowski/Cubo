<!-- #region PRZETWARZANIE FORMULARZA -->
<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Oferta.php');
require_once('scripts/ImageManipulator.php');

$scripts .= "<script src='assets/js/nicEdit.js'></script>";

$scripts .= "<script type='text/javascript'>bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>";

$success = "";
$error = "";
$oferta;

$post_file = "";
$post_title = "";
$post_description = "";
$post_short_description = "";
$post_order = "";

if (isset($_POST['submit'])){
	if(isset($_FILES['image-file']) && !empty($_FILES['image-file']['name'])){

		$post_file = $_FILES['image-file']['name'];
		$post_title = $_POST['Title'];
		$post_description = $_POST['Description'];
		$post_short_description = $_POST['ShortDescription'];
		$post_order = $_POST['OrderNo'];

		$oferta = new Oferta();

		$target_dir = '../assets/img/offer-category/';
		$target_file = $target_dir . basename($_FILES['image-file']['name']);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		$check = getimagesize($_FILES['image-file']['tmp_name']);

		if($check !== FALSE) {
			$uploadOk = 1;
		}
		else {
			$error .= "Plik nie jest obrazkiem.\n";
			$uploadOk = 0;
		}

		if (file_exists($target_file)) {
			$error .= "Plik o podanej nazwie już istnieje.\n";
			$uploadOk = 0;
		}

		if ($_FILES["image-file"]["size"] > 5000000) {
			$error = "Plik jest zbyt duży\n".$_FILES["image-file"]["size"];
			$uploadOk = 0;
		}

		if($imageFileType != "jpg" && $imageFileType != "png") {
			$error .= "Wymagany format pliku to .jpg\n";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			$error .= "Twoje zdjęcie nie zostało przesłane.\n";
			// if everything is ok, try to upload file
		} else {

			$fileName = basename( $_FILES["image-file"]["name"]);

			$exp = explode(".", $fileName);
			$newFileName = $exp[0] . "_thumb." + $exp[1];

			if (move_uploaded_file($_FILES["image-file"]["tmp_name"], $target_file)) {
				$success = "Zdjęcie ". basename( $_FILES["image-file"]["name"]). " zostało przesłane.";

				$result = $oferta->Create_Cat($fileName, $post_title, $post_description, $post_short_description, $post_order);

				if ($result == "" || $result != FALSE){
					echo "<script type='text/javascript'>
							window.location.href = 'oferta';
						  </script>";
				}
				else $error .= "Wystąpił błąd podczas dodawania rekordu do bazy danych ";

			} else $error .= "Wystąpił problem podczas przesyłania zdjęcia";
		}
	}
	else $error = "Proszę wybrać plik do wysłania.";
}


?>
<!-- #endregion -->

<!-- #region FORMULARZ -->
<div class="alert alert-danger col-md-12" <?php if ($error == "") echo 'style="display: none;"' ?>>
	<?php echo $error; ?>
</div>

<div class="col-md-12">
	<h4 class="page-title">
		Dodaj kategorię
		<small>
			Preferowany rozmiar zdjęcia: <?php echo OFFER_CATEGORY; ?>
		</small>
	</h4>
</div>

<div class="col-md-8 col-xs-12">
	<div class="white-box">
		<form class="form-horizontal form-material" action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="image-file" class="col-md-12">Wybierz zdjęcie: </label>
				<div class="col-md-12">
					<input class="form-control form-control-line" type="file" name="image-file" id="image-file" placeholder="Zdjęcie" <?php if ($post_file != "") echo "value='{$post_file}'"; ?> />
				</div>
			</div>
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
					<input type="hidden" name="submit" value="true" />
					<button type="submit" class="btn btn-success">Dodaj</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- #endregion -->