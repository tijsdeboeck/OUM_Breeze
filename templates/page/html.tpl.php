<!doctype html>
  <!--[if IEMobile 7]><html class="no-js ie iem7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
  <!--[if lte IE 6]><html class="no-js ie lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
  <!--[if (IE 7)&(!IEMobile)]><html class="no-js ie lt-ie9 lt-ie8" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
  <!--[if IE 8]><html class="no-js ie lt-ie9" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"><![endif]-->
  <!--[if (gte IE 9)|(gt IEMobile 7)]><html class="no-js ie" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>><![endif]-->
  <![if !IE]><html class="no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>><![endif]>

  <head>
    <title><?php print $head_title; ?></title>

    <?php print $head; ?>

    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" type="image/ico" href="/<?php print drupal_get_path('theme', $GLOBALS['theme']); ?>/assets/favicon/favicon.ico">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/<?php print drupal_get_path('theme', $GLOBALS['theme']); ?>/assets/favicon/favicon-144.png">

    <link rel="apple-touch-icon-precomposed" href="/<?php print drupal_get_path('theme', $GLOBALS['theme']); ?>/assets/favicon/favicon-152.png">
    <link rel="icon" type="image/png" href="/<?php print drupal_get_path('theme', $GLOBALS['theme']); ?>/assets/favicon/favicon-32.png" sizes="32x32">

    <meta name="theme-color" content="#000000">

    <?php print $styles; ?>
    <?php print $scripts; ?>
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>

    <?php print $page_top; ?>
    <div class="page">
      <?php print $page; ?>
    </div>
    <?php print $page_bottom; ?>
  </body>
</html>
