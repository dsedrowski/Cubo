<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta³a wywo³ana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Realizacje.php');

$error = "";
$realizacje = new Realizacje();

if (isset($_GET['id'])){
	$id = $_GET['id'];

	$exist = $realizacje->Get_Cat($id);

	if ($exist != FALSE){
		$result = $realizacje->Delete_Cat($id);

		if ($result == "" || $result != FALSE){

			unlink('../assets/img/realizations-category/'.$exist['Image']);

			$zdjecia = $realizacje->List_Photo($exist['ID']);

			if (count($zdjecia) > 0) {

				$photos_result = $realizacje->Delete_Photos_For_Cat($exist['ID']);

				if ($photos_result == "" || $result != FALSE){
					foreach ($zdjecia as $zdjecie){
						unlink('../assets/img/realizations-photo/'.$zdjecie['Image']);
					}
				}
			}

			echo "<script type='text/javascript'>
	                        window.location.href = 'realizacje';
	                      </script>";
		}
		else $error .= "Wyst¹pi³ b³¹d podczas usuwania rekordu z bazy danych ";
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