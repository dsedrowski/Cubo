<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

require_once('scripts/User.php');
$error = "";
$success = "";
$user;

$old_pass = "";
$new_pass = "";
$new_pass_rpt = "";

if (isset($_POST['submitted'])){
    $old_pass = $_POST['OldPass'];
    $new_pass = $_POST['NewPass'];
    $new_pass_rpt = $_POST['NewPassRpt'];

    $user = new User();

    if (isset($_SESSION['UID'])){
        $check_password = $user->CheckPassword($_SESSION['UID'], md5($old_pass));

        if ($check_password){
            if ($new_pass != '' || $new_pass_rpt != '')
            {
                if ($new_pass == $new_pass_rpt){
                    $result = $user->ChangePassword($_SESSION['UID'], md5($new_pass));
                    $success = "Hasło zostało zmienione!";
                }
                else {
                    $error .= "Podane hasła nie są identyczne";
                }
            }
            else {
                $error .= "Pola z nowym hasłem nie mogą być puste";
            }
        }
        else {
            $error .= "Stare hasło nieprawidłowe";
        }

    }
    else {
        $error .= "Użytkownik nie jest zalogowany";
    }
}

?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-12">
				<h4 class="page-title">Witamy w DS_CMS</h4>
				<ol class="breadcrumb">
					<li>
						<a href="#">Zmień hasło</a>
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
            <div class="alert alert-danger col-md-12" <?php if ($error == "") echo 'style="display: none;"' ?>>
                <?php echo $error; ?>
            </div>
            <div class="alert alert-success col-md-12" <?php if ($success == "") echo 'style="display: none;"' ?>><?php echo $success; ?>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <form class="form-horizontal form-material" action="" method="post" enctype="multipart/form-data">                        
                        <div class="form-group">
                            <label class="col-md-12">Stare hasło</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Wpisz stare hasło" name="OldPass" class="form-control form-control-line" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nowe hasło</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Wpisz nowe hasło" name="NewPass" class="form-control form-control-line" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Powtórz nowe hasło</label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Powtórz nowe hasło" name="NewPassRpt" class="form-control form-control-line" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="hidden" name="submitted" value="true" />
                                <button type="submit" class="btn btn-success">Zmień</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>