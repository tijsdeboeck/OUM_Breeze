<?php
  // Add a aria role search if this is the search block
  if($block_html_id == "block-search-form"){
    $role = ' role="search"';
  } else {
    $role = '';
  }
?>

<div class="<?php print $classes; ?>"<?php print $attributes . $role; ?>>
  <?php print render($title_prefix); ?>
    <?php if ($block->subject): ?>
      <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
    <?php endif;?>
  <?php print render($title_suffix); ?>
  <?php print $content ?>
</div>
