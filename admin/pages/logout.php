<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta�a wywo�ana w nieodpowiedni spos�b. Wykonywanie skryptu zatrzymane!');

if (isset($_SESSION['logged'])){
    $_SESSION['logged'] = 'FALSE';
}

echo "<script type='text/javascript'>
                window.location.href = 'home';
        </script>";