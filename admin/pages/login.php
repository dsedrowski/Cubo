<?php

if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

if (isset($_POST['submitted']) && isset($_POST['login']) && isset($_POST['password'])){
    require_once('scripts/User.php');

    $user = new User();

    $login = $user->Login($_POST['login'], md5($_POST['password']));

    if ($login != FALSE)
    {
        $_SESSION['logged'] = 'TRUE';
        $_SESSION['UID'] = $login;

        header('Location: ../admin');
    }

}

?>


<!DOCTYPE HTML>
<html>
<head>
    <title>DS_CMS Panel logowania</title>
    <link href="assets/css/style_login.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" . />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>
    <div class="shadow-forms">
        <div class="message warning">
            <div class="login-head">
                <h2>DS_CMS Login</h2>
            </div>            
            <form action="" method="post">
                <input type="text" class="text" value="Użytkownik" name="login" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Użytkownik';}">
                <input type="password" value="Hasło" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Hasło';}">
                <!--<div class="p-container">
                    <label style="color: white;"><input type="checkbox" name="remember" value="TRUE"><i></i>Zapamiętaj</label>
                    <div class="clear"> </div>
                </div>-->
                <div class="submit">
                    <input type="hidden" name="submitted" value="TRUE" />
                    <input type="submit" value="LOG IN">
                </div>
                <div class="buttons">
                    
                </div>
            </form>
            <div class="sign-up">           
            </div>

            <div class="clear"> </div>
        </div>

    </div>
</body>
</html>