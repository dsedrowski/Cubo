<!-- #region PRZETWARZANIE FORMULARZA -->
<?php

if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Slider.php');
require_once('scripts/ImageManipulator.php');

$success = "";
$error = "";
$slider;

$post_file = "";
$post_title = "";
$post_url = "";
$post_order = "";

if (isset($_POST['submit'])){
	if(isset($_FILES['image-file']) && !empty($_FILES['image-file']['name'])){

		$post_file = $_FILES['image-file']['name'];
		$post_title = $_POST['Title'];
		$post_url = $_POST['URL'];
		$post_order = $_POST['OrderNo'];

		$slider = new Slider();

		$target_dir = '../assets/img/main-slider/';
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

		if ($_FILES["image-file"]["size"] > 500000) {
			$error = "Plik jest zbyt duży\n";
			$uploadOk = 0;
		}

		if($imageFileType != "jpg") {
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

				$result = $slider->Create($fileName, $post_title, $post_url, $post_order);

				if ($result == "" || $result != FALSE){
					echo "<script type='text/javascript'>
							window.location.href = 'slider';
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
    <h4 class="page-title">Dodaj zdjęcie <small>Preferowany rozmiar zdjęcia: <?php echo SLIDER_SIZE; ?></small></h4>
</div>

<div class="col-md-8 col-xs-12">
	<div class="white-box">
        <form class="form-horizontal form-material" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image-file" class="col-md-12">Wybierz zdjęcie: </label>
                <div class="col-md-12">
					<input class="form-control form-control-line" type="file" name="image-file" id="image-file" placeholder="Zdjęcie" <?php if ($post_file != "") echo "value='{$post_file}'"; ?>/>
                </div>
            </div>
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
                    <input type="hidden" name="submit" value="true" />
					<button type="submit" class="btn btn-success">Dodaj</button>
				</div>
			</div>
        </form>
	</div>
</div>
<!-- #endregion -->