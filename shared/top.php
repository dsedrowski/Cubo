<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Damian Sędrowski">
    <title>CUBO - Punkt Sprzedaży</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/scrolling-nav.css" rel="stylesheet">
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../assets/img/favicon.ico">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
	
	<!-- #region Menu Górne -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll col-md-offset-2">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="page-scroll" href="/">
                    <img src="assets/img/logo.png" alt="Logo" />
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="/" <?php if ($active == 'home') echo 'class="active"'; ?>>Strona główna</a>
                    </li>
                    <li>
                        <a href="/onas" <?php if ($active == 'onas') echo 'class="active"'; ?>>O Nas</a>
                    </li>
                    <li class="dropdown">
                        <a href="/oferta" <?php if ($active == 'oferta') echo 'class="active"'; ?>>Oferta</a>
                        <div class="dropdown-menu">
                            <?php foreach ($oferta_menu as $elem) { ?>
                                <a class="dropdown-item" href="/oferta-szczegoly-<?php echo $elem["ID"]; ?>"><?php echo $elem['Title']; ?></a>
                            <?php } ?>
                        </div>
                    </li>
                    <li>
                        <a href="/realizacje" <?php if ($active == 'realizacje') echo 'class="active"'; ?>>Realizacje</a>
                    </li>
                    <li>
                        <a href="/blog" <?php if ($active == 'blog') echo 'class="active"'; ?>>Aktualności</a>
                    </li>
                    <li>
                        <a href="/kontakt" <?php if ($active == 'kontakt') echo 'class="active"'; ?>>Kontakt</a>
                    </li>
                    <li>
                        <a href="http://facebook.pl"><i class="fa fa-facebook-square fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="http://olx.pl"><span class="olx-logo"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #endregion -->
