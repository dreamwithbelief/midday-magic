<!DOCTYPE html>
<html>
<head>
    <title>SpeakOut - SCC</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700" rel="stylesheet"/>
    <script src="<?= URL; ?>public/js/jquery.min.js"></script>
<!--    <script src="--><?//= URL; ?><!--public/js/config.js"></script>-->
<!--    <script src="--><?//= URL; ?><!--public/js/skel.min.js"></script>-->
<!--    <script src="--><?//= URL; ?><!--public/js/skel-panels.min.js"></script>-->
<!--    <noscript>-->
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/skel-noscript.css"/>
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/style-desktop.css"/>
<!--    </noscript>-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/style-ie9.css"/><![endif]-->
    <!--[if lte IE 8]>
    <script src="<?= URL; ?>public/js/html5shiv.js"></script><![endif]-->
    <script src="<?= URL; ?>public/js/main.js"></script>
    <link href="<?= URL; ?>public/css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<!-- Header -->

<div id="header-wrapper">
    <header class="container" id="site-header">
        <div class="row">
            <div class="12u">
                <div id="logo">
                    <h1>SpeakOut - SCC</h1>
                </div>
                <nav id="nav">
                    <ul>
                        <?php $page = !empty($_GET[ 'url' ]) ? explode( '/', $_GET[ 'url' ] )[ 1 ] : ''; ?>
                        <li <?= ( $page == '' || $page == 'index' ) ? 'class="current_page_item"' : ''; ?>><a href="/">Home</a>
                        </li>
                        <li <?= ( $page == 'events' ) ? 'class="current_page_item"' : ''; ?>><a href="/home/events">Events</a>
                        </li>
                        <li <?= ( $page == 'contact' ) ? 'class="current_page_item"' : ''; ?>><a href="/home/contact">Contact
                                Us</a></li>
                        <li <?= ( $page == 'officers' ) ? 'class="current_page_item"' : ''; ?>><a href="/home/officers">Officers</a>
                        </li>
                        <li <?= ( $page == 'gallery' ) ? 'class="current_page_item"' : ''; ?>><a href="/home/gallery">Gallery</a>
                        </li>
                        <li <?= ( $page == 'about' ) ? 'class="current_page_item"' : ''; ?>><a href="/home/about">About
                                Us</a></li>
                        <li <?= ( $page == 'login' ) ? 'class="current_page_item"' : ''; ?>><a href="/member/login">Member
                                Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>

<!-- Main -->

<div id="main-wrapper">
    <div class="container">
        <?php

        if(!empty($user['name'])){
        ?>
        <h2>Welcome, <?=$user['name'];?></h2>
        <?php } ?>