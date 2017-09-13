<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta³a wywo³ana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Slider.php');

$error = "";
$slider = new Slider();

if (isset($_GET['id'])){
	$id = $_GET['id'];

	$exist = $slider->GetSlide($id);

	if ($exist != FALSE){
		$result = $slider->Delete($id);

		if ($result == "" || $result != FALSE){
			echo "<script type='text/javascript'>
	                        window.location.href = 'slider';
	                      </script>";
		}
		else $error .= "Wyst¹pi³ b³¹d podczas usuwania rekordu z bazy danych ";
	}
	else {
		$error .= "Brak slide'u o podanym ID w bazie danych";
	}
}
else {
	$error .= "Brak podanego parametru ID";
}

?>

<div class="alert alert-danger col-md-12" <?php if ($error == "") echo 'style="display: none;"' ?>>
	<p><?php echo $error; ?></p>
</div>