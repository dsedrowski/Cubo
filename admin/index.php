<?php

session_start();

error_reporting(0);

define('ANTY_HACK', 'DS_CMS');

require('settings.php');

if ((isset($_SESSION['logged']) && $_SESSION['logged'] == 'TRUE') || (isset($_COOKIE['user_logged']) && $_COOKIE['user_logged'] == 'TRUE')){
    require('scripts/CurrentPage.php');

    $pages = new Pages();
    $scripts = "";

    if (isset($_GET['page']))
    {
	    $active = $pages->getActivePage($_GET['page']);
	    $page_file = $pages->getCurrentPage($_GET['page']);
    }
    else
    {
	    $active = 'home';
	    $page_file = 'home.php';
    }


    include 'shared/top.php';
    include 'pages/'.$page_file;
    include 'shared/bottom.php';
}
else {
    include 'pages/login.php';
}

?>