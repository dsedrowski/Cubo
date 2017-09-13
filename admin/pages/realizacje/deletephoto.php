<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta�a wywo�ana w nieodpowiedni spos�b. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Realizacje.php');

$error = "";
$realizacje = new Realizacje();

if (isset($_GET['id'])){
	$id = $_GET['id'];

	$exist = $realizacje->Get_Photo($id);

	if ($exist != FALSE){
		$result = $realizacje->Delete_Photo($id);

		if ($result == "" || $result != FALSE){

			unlink('../assets/img/offer-photo/'.$exist['Image']);

			echo "<script type='text/javascript'>
	                        window.location.href = 'realizacje-details-{$exist['KategoriaID']}';
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