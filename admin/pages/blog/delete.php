<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta³a wywo³ana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/Blog.php');

$error = "";
$blog = new Blog();

if (isset($_GET['id'])){
	$id = $_GET['id'];

	$exist = $blog->Get($id);

	if ($exist != FALSE){
		$result = $blog->Delete($id);

		if ($result == "" || $result != FALSE){

			unlink('../assets/img/blog/'.$exist['Image']);


			echo "<script type='text/javascript'>
	                        window.location.href = 'blog';
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