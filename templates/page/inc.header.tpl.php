<header id="header" class="header" role="banner">
  <div class="wrapper">
    <h1 class="logo">
      <a href="<?php print $front_page; ?>" title="<?php print t('Go to the homepage'); ?>" rel="home">
        <img class="svg" src="/<?php print drupal_get_path('theme', $GLOBALS['theme']) . '/assets/img/logo.svg'; ?>" alt="<?php print $site_name ?> logo" title="<?php print $site_name ?>" />
        <span class="visuallyhidden"><?php print $site_name ?></span>
      </a>
    </h1>

    <?php if (isset($page['header'])) print render($page['header']); ?>

    <a href="#nav-1" class="menu-toggle">Toon menu</a>
  </div>
</header><!-- end #header -->
