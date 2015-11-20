<article class="node-<?php print $node->nid; ?><?php if($classes) print ' ' . $classes;?>"<?php print $attributes; ?> role="article">

  <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a></h2>
    <?php endif; ?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print render($content);?>
  </div>
</article>
