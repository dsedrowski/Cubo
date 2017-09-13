<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona zosta³a wywo³ana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');

if (isset($_SESSION['logged'])){
    $_SESSION['logged'] = 'FALSE';
}

echo "<script type='text/javascript'>
                window.location.href = 'home';
        </script>";