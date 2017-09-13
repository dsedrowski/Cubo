<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta�a wywo�ana w nieodpowiedni spos�b. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Oferta.php');

$error = "";
$oferta = new Oferta();

if (isset($_GET['id'])){
	$id = $_GET['id'];

	$exist = $oferta->Get_Cat($id);

	if ($exist != FALSE){
		$result = $oferta->Delete_Cat($id);

		if ($result == "" || $result != FALSE){

			unlink('../assets/img/offer-category/'.$exist['Image']);

			$zdjecia = $oferta->List_Photo($exist['ID']);

			if (count($zdjecia) > 0) {

				$photos_result = $oferta->Delete_Photos_For_Cat($exist['ID']);

				if ($photos_result == "" || $result != FALSE){
					foreach ($zdjecia as $zdjecie){
						unlink('../assets/img/offer-photo/'.$zdjecie['Image']);
					}
				}
			}

			echo "<script type='text/javascript'>
	                        window.location.href = 'oferta';
	                      </script>";
		}
		else $error .= "Wyst�pi� b��d podczas usuwania rekordu z bazy danych ";
	}
	else {
		$error .= "Brak kategorii o podanym ID w bazie danych";
	}
}
else {
	$error .= "Brak podanego parametru ID";
}

?>

<div class="alert alert-danger col-md-12" <?php if ($error == "") echo 'style="display: none;"' ?>>
	<p><?php echo $error; ?></p>
</div>