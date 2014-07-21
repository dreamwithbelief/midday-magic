<!DOCTYPE HTML>
<!--
	Arcana 2.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>SpeakOut - SCC</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700" rel="stylesheet"/>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/skel.min.js"></script>
    <script src="/js/skel-panels.min.js"></script>
    <noscript>
        <link rel="stylesheet" href="/css/skel-noscript.css"/>
        <link rel="stylesheet" href="/css/style.css"/>
        <link rel="stylesheet" href="/css/style-desktop.css"/>
    </noscript>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/css/style-ie9.css"/><![endif]-->
    <!--[if lte IE 8]>
    <script src="/js/html5shiv.js"></script><![endif]-->
    <script src="/js/main.js"></script>
    <link href="/css/main.css" rel="stylesheet" type="text/css"/>
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
                        <?php $page = explode( '/', $_GET[ 'url' ] )[ 1 ]; ?>
                        <li <?= ( $page == '' || $page == 'index' ) ? 'class="current_page_item"' : '' ?>><a href="/">Home</a>
                        </li>
                        <li <?= ( $page == 'events' ) ? 'class="current_page_item"' : '' ?>><a href="/home/events">Events</a>
                        </li>
                        <li <?= ( $page == 'contact' ) ? 'class="current_page_item"' : '' ?>><a href="/home/contact">Contact
                                Us</a></li>
                        <li <?= ( $page == 'officers' ) ? 'class="current_page_item"' : '' ?>><a href="/home/officers">Officers</a>
                        </li>
                        <li <?= ( $page == 'gallery' ) ? 'class="current_page_item"' : '' ?>><a href="/home/gallery">Gallery</a>
                        </li>
                        <li <?= ( $page == 'about' ) ? 'class="current_page_item"' : '' ?>><a href="/home/about">About
                                Us</a></li>
                        <li <?= ( $page == 'login' ) ? 'class="current_page_item"' : '' ?>><a href="/member/login">Member
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
        <?php
        }
        require_once $yield;

        ?>
    </div>
</div>

<!-- Footer -->

<div id="footer-wrapper">
    <footer class="container" id="site-footer">
        <div class="row">
            <div class="3u">
                <section class="first">
                    <h2>Ipsum et phasellus</h2>
                    <ul class="link-list">
                        <li><a href="#">Mattis et quis rutrum sed accumsan</a>
                        <li><a href="#">Suspendisse amet varius nibh</a>
                        <li><a href="#">Suspenddapibus amet mattis quis</a>
                        <li><a href="#">Rutrum accumsan eu varius</a>
                        <li><a href="#">Nibh lorem sed dolore et ipsum.</a>
                    </ul>
                </section>
            </div>
            <div class="3u">
                <section>
                    <h2>Lorem mattis dolor</h2>
                    <ul class="link-list">
                        <li><a href="#">Duis neque nisi dapibus sed</a>
                        <li><a href="#">Suspenddapibus amet mattis quis</a>
                        <li><a href="#">Rutrum accumsan eu varius</a>
                        <li><a href="#">Nibh lorem sed dolore et ipsum.</a>
                        <li><a href="#">Mattis et quis rutrum sed accumsan</a>
                    </ul>
                </section>
            </div>
            <div class="3u">
                <section>
                    <h2>Mattis quis tempus</h2>
                    <ul class="link-list">
                        <li><a href="#">Suspendisse amet varius nibh</a>
                        <li><a href="#">Suspenddapibus amet mattis quis</a>
                        <li><a href="#">Rutrum accumsan eu varius</a>
                        <li><a href="#">Nibh lorem sed dolore et ipsum.</a>
                        <li><a href="#">Duis neque nisi dapibus sed</a>
                    </ul>
                </section>
            </div>
            <div class="3u">
                <section class="last">
                    <h2>Odio et phasellus</h2>
                    <ul class="link-list">
                        <li><a href="#">Rutrum accumsan eu varius</a>
                        <li><a href="#">Nibh lorem sed dolore et ipsum.</a>
                        <li><a href="#">Duis neque nisi dapibus sed</a>
                        <li><a href="#">Mattis et quis rutrum sed accumsan</a>
                        <li><a href="#">Suspendisse amet varius nibh</a>
                    </ul>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="12u">
                <div class="divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="12u">
                <div id="copyright">
                    &copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a> | Images:
                    <a href="http://fotogrph.com">fotogrph</a>
                </div>
            </div>
        </div>
    </footer>
</div>

</body>
</html>