<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta name="description" content="Modern designs and homewares by Little Elk. Inspired by minimal Scandinavian design."/>
    <link rel="canonical" href="https://www.littleelk.uk/" />
    <meta property="og:locale" content="en_GB" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Little Elk | Modern designs and homewares" />
    <meta property="og:description" content="Modern designs and homewares by Little Elk. Inspired by minimal Scandinavian design." />
    <meta property="og:url" content="https://www.littleelk.uk/" />
    <meta property="og:site_name" content="Little Elk" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Modern designs and homewares by Little Elk. Inspired by minimal Scandinavian design." />
    <meta name="twitter:title" content="Little Elk | Modern designs and homewares" />
    <meta name="twitter:site" content="@littleelkshop" />
    <meta name="twitter:creator" content="@littleelkshop" />
    <script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/www.littleelk.uk\/","name":"Little Elk","potentialAction":{"@type":"SearchAction","target":"https:\/\/www.littleelk.uk\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"Organization","url":"https:\/\/www.littleelk.uk\/","sameAs":["https:\/\/www.facebook.com\/littleelkshop\/","https:\/\/www.instagram.com\/littleelkshop","https:\/\/twitter.com\/littleelkshop"],"@id":"https:\/\/www.littleelk.uk\/#organization","name":"Little Elk","logo":"https:\/\/www.littleelk.uk\/assets\/logos\/yellow-doll.png"}</script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/solid.css" integrity="sha384-YIyAArzQv8q6Av1kr9cwxHhFcfNBUaolJindR2XO8E3OLp6z3d8My3oWLd33ET7M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-srL3Qh9R/n855m4o5fegS//B2q0R1md7z6ndDYaPj8iEp0j0IuKdFVWMY0JosKPF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/wim5xii.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="lesp_global-header">
    <div class="lesp_wrap">
        <div class="lesp_site-title">
            <h1><a href="<?php bloginfo('url'); ?>" title="Back to Little Elk home">Little Elk</a></h1>
        </div>
        <div class="lesp_logo">
            <a href="<?php bloginfo('url'); ?>" title="Back to Little Elk home">
                <div class="lesp_header-image">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/village.png">
                </div>
            </a>
        </div>
    </div>
</header>
<div class="lesp_global-nav">
    <div class="lesp_wrap">
        <div class="lesp_header-social">
            <ul>
                <li><a href="#">I</a></li>
                <li><a href="#">F</a></li>
                <li><a href="#">T</a></li>
            </ul>
        </div>
        <nav><ul><?php wp_nav_menu( array('theme_location' => 'main_menu' )); ?></ul></nav>
        <div class="lesp_header-sub-nav">
            <ul>
                <li><a href="#" class="lesp-header-sub-search"><i class="fas fa-search"></i></a></li>
                <li><a href="#" class="lesp-header-sub-heart"><i class="fas fa-heart"></i></a></li>
                <li><a href="#" class="lesp-header-sub-bag"><i class="fas fa-shopping-bag"></i></a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="lesp_nav-announcement"><a href="#" class="lesp_popup-toggle">Psssst...We Have Some News <i class="fas fa-comment"></i></a></div>
