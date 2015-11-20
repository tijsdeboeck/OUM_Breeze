<?php require('inc.header.tpl.php'); ?>

<div class="container">
  <div class="wrapper">

    <section class="body" role="main">
      <a id="main-content"></a>

      <?php print render($title_prefix); ?>
        <h1 class="page-title"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>

      <?php if ($breadcrumb): ?>
        <nav class="breadcrumbs" aria-label="breadcrumbs" role="navigation">
          <?php print $breadcrumb; ?>
        </nav>
      <?php endif; ?>

      <?php include('inc.admin.tpl.php'); ?>

      <?php print render($page['content']); ?>
    </section><!-- /#body -->

    <?php if ($page['sidebar_first']): ?>
      <aside role="complementary" class="sidebar sidebar_first">
        <?php print render($page['sidebar_first']); ?>
      </aside>
    <?php endif; ?>

    <?php if ($page['sidebar_second']): ?>
      <aside role="complementary" class="sidebar sidebar_second">
        <?php print render($page['sidebar_second']); ?>
      </aside>
    <?php endif; ?>

  </div>
</div>

<?php require('inc.footer.tpl.php'); ?>
