<?php
error_reporting(0);
require_once('admin/scripts/Oferta.php');
require('scripts/CurrentPage.php');

$pages = new Pages();
$oferta = new Oferta();

$oferta_menu = $oferta->List_Cat();

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


?>