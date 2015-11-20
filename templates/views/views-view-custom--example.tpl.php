<?php foreach($rows as $index => $row): ?>
  <?php
    $imgTitle   = 'Image title';
    $imgUri     = $row['field_image'];

    $imgXS      = image_style_url('16_9_xs', $imgUri);
    $imgS       = image_style_url('16_9_s', $imgUri);
    $imgM       = image_style_url('16_9_m', $imgUri);
    $imgL       = image_style_url('16_9_l', $imgUri);
    $imgXL      = image_style_url('16_9_xl', $imgUri);
    $imgXXL     = image_style_url('16_9_xxl', $imgUri);

    $imgSet     = $imgXS . ' 240w, ' . $imgS . ' 480w, ' . $imgM . ' 720w, ' . $imgL . ' 1040w, ' . $imgXL . ' 1440w, ' . $imgXXL . ' 1920w';
    $imgSizes   = '(min-width: 80em) 125vw, (min-width: 60em) 150vw, (min-width: 45em) 200vw, 250vw';
  ?>

  <article class="item">
    <header class="info">
      <h1><?php print $row['title']; ?></h1>
      <h2><?php print $row['field_client']; ?></h2>
      <p class="services visuallyhidden">
        <?php print t('We provided'); ?>: <?php print $row['field_services']; ?>
      </p>
    </header>

    <img
      data-srcset="<?php print $imgSet; ?>"
      data-sizes="<?php print $imgSizes; ?>"
      alt="<?php print $imgTitle; ?>"
      title="<?php print $imgTitle; ?>"
      class="hero-img lazyload"
      width= "100%"
    />
  </article>
<?php endforeach; ?>
