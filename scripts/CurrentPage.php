<?php

class Pages
{
	public function getActivePage($page)
	{
		$active = "";

		switch ($page)
		{
			case "onas":
				$active = "onas";
				break;
			case "oferta":
				$active = "oferta";
				break;
            case "oferta_szczegoly":
                $active = "oferta";
                break;
			case "realizacje":
				$active = "realizacje";
				break;
			case "realizacje_szczegoly":
				$active = "realizacje";
				break;
			case "blog":
				$active = "blog";
				break;
			case "blog_szczegoly":
				$active = "blog";
				break;
			case "kontakt":
				$active = "kontakt";
				break;
			default:
				$active = "home";
				break;
		}

		return $active;
	}

	public function getCurrentPage($page)
	{
		$page_file = "";

		switch ($page)
		{
			case "onas":
				$page_file = "onas.php";
				break;
			case "oferta":
				$page_file = "oferta.php";
				break;
            case "oferta_szczegoly":
                $page_file = "oferta_szczegoly.php";
                break;
			case "realizacje":
				$page_file = "realizacje.php";
				break;
			case "realizacje_szczegoly":
				$page_file = "realizacje_szczegoly.php";
				break;
			case "blog":
				$page_file = "blog.php";
				break;
			case "blog_szczegoly":
				$page_file = "blog_szczegoly.php";
				break;
			case "kontakt":
				$page_file = "kontakt.php";
				break;
			default:
				$page_file = 'home.php';
				break;
		}

		return $page_file;
	}
}