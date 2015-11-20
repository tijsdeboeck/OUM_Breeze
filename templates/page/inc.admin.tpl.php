<?php if($messages): ?>
  <div class="drupal-messages">
    <?php print $messages; ?>
  </div>
<?php endif; ?>

<?php if ($action_links): ?>
  <ul class="action-links">
    <?php print render($action_links); ?>
  </ul>
<?php endif; ?>

<?php if ($tabs['#primary']): ?>
  <nav class="tabs">
    <?php print render($tabs); ?>
  </nav>
<?php endif; ?>

<?php if (isset($page['help'])): ?>
  <div class="page-help">
    <?php print render($page['help']); ?>
  </div>
<?php endif; ?>
