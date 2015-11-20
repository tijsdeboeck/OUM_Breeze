<footer id="footer" class="footer" role="contentinfo">
  <div class="wrapper">

    <?php if(isset($page['footer'])) print render($page['footer']); ?>

    <div class="copy">
      <p class="copyright">
        &copy; <?php print date('Y'); ?> <?php if($site_name) print $site_name; ?>
      </p>
    </div>

    <div class="ou-link">
      <a href="http://www.openupmedia.be" class="openup" titel="<?php print t('Visit'); ?> www.openupmedia.be">
        <?php print t('Website by'); ?> Open Up Media
      </a>
    </div>
  </div>
</footer><!-- end #footer -->
