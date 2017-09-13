<?php

class Pages
{
	public function getActivePage($page)
	{
		$active = "";

		switch ($page)
		{
			case "home":
				$active = "home";
				break;
			case "slider":
				$active = "slider";
				break;
			case "oferta":
				$active = "oferta";
				break;
			case "realizacje":
				$active = "realizacje";
				break;
			case "blog":
				$active = "blog";
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
			case "home":
				$page_file = "home.php";
				break;
			case "slider":
				$page_file = "slider.php";
				break;
			case "oferta":
				$page_file = "oferta.php";
				break;
			case "realizacje":
				$page_file = "realizacje.php";
				break;
			case "blog":
				$page_file = "blog.php";
				break;
            case "logout":
                $page_file = 'logout.php';
                break;
            case "changepassword":
                $page_file = 'changepassword.php';
                break;
			default:
				$page_file = 'home.php';
				break;
		}

		return $page_file;
	}
}