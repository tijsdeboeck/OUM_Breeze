<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 */
?>
<!doctype html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

  <head>
    <title><?php print $head_title; ?></title>

    <?php print $head; ?>

    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php print $styles; ?>
    <?php print $scripts; ?>
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>

    <?php if (isset($page_top)) print $page_top; ?>
    <div class="page">

      <?php require('inc.header.tpl.php'); ?>

      <div class="container">
        <div class="wrapper">

          <section class="body" role="main">
            <a id="main-content"></a>
            <h1 class="page-title"><?php print $title; ?></h1>

            <?php //include('inc.admin.tpl.php'); ?>

            <?php print render($page['content']); ?>
          </section><!-- /#body -->

          <?php if (isset($page['sidebar_first'])): ?>
            <aside role="complementary" class="sidebar sidebar_first">
              <?php print render($page['sidebar_first']); ?>
            </aside>
          <?php endif; ?>

          <?php if (isset($page['sidebar_second'])): ?>
            <aside role="complementary" class="sidebar sidebar_second">
              <?php print render($page['sidebar_second']); ?>
            </aside>
          <?php endif; ?>

        </div>
      </div>

      <?php require('inc.footer.tpl.php'); ?>
    </div>

    <?php if (isset($page_bottom)) print $page_bottom; ?>
  </body>
</html>
