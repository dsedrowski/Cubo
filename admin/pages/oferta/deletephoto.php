<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta³a wywo³ana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Oferta.php');

$error = "";
$oferta = new Oferta();

if (isset($_GET['id'])){
	$id = $_GET['id'];

	$exist = $oferta->Get_Photo($id);

	if ($exist != FALSE){
		$result = $oferta->Delete_Photo($id);

		if ($result == "" || $result != FALSE){

			unlink('../assets/img/offer-photo/'.$exist['Image']);

			echo "<script type='text/javascript'>
	                        window.location.href = 'oferta-details-{$exist['KategoriaID']}';
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