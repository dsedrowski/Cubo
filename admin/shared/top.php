<?php
if(!defined('ANTY_HACK') || ANTY_HACK != 'DS_CMS')
    die('Strona została wywołana w nieodpowiedni sposób. Wykonywanie skryptu zatrzymane!');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">
    <title>DS_CMS - System zarządzania treścią</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">
    <link href="assets/css/morris.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/my-styles.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="index.html"><i class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">DS_CMS</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="open-close hidden-xs hidden-lg
 waves-effect waves-light">
                            <i class="ti-arrow-circle-left ti-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a href="changepassword">Zmień hasło</a>
                    </li>
                    <li>
                        <a href="logout">Wyloguj</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <div class="navbar-default sidebar nicescroll" role="navigation">
            <div class="sidebar-nav navbar-collapse ">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i> </button>
                            </span>
                        </div>
                    </li>
                    <li>
                        <a href="home" class="waves-effect <?php if ($active == 'home') echo "active"; ?> "><i class="glyphicon glyphicon-fire fa-fw"></i> Dashboard</a>
                    </li>
					<?php if (COMP_SLIDER == TRUE) { ?>
                    <li>
                        <a href="slider" class="waves-effect <?php if ($active == 'slider') echo "active"; ?> "><i class="glyphicon glyphicon-picture fa-fw"></i> Slider</a>
                    </li>
					<?php } ?>
                    <?php if (COMP_OFFER == TRUE) { ?>
                    <li>
                        <a href="oferta" class="waves-effect <?php if ($active == 'oferta') echo "active"; ?> "><i class="glyphicon glyphicon-folder-open fa-fw"></i> Oferta</a>
                    </li>
                    <?php } ?>
                    <?php if (COMP_REALIZATIONS == TRUE) { ?>
                    <li>
                        <a href="realizacje" class="waves-effect <?php if ($active == 'realizacje') echo "active"; ?> "><i class="glyphicon glyphicon-camera fa-fw"></i> Realizacje</a>
                    </li>
                    <?php } ?>
                    <?php if (COMP_BLOG == TRUE) { ?>
                    <li>
                        <a href="blog" class="waves-effect <?php if ($active == 'blog') echo "active"; ?> "><i class="glyphicon glyphicon-pencil fa-fw"></i> Blog</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
