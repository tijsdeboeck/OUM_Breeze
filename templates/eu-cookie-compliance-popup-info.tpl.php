<?php
/**
 * @file
 * This is a template file for a pop-up prompting user to give their consent for
 * the website to set cookies.
 *
 * When overriding this template it is important to note that jQuery will use
 * the following classes to assign actions to buttons:
 *
 * agree-button      - agree to setting cookies
 * find-more-button  - link to an information page
 *
 * Variables available:
 * - $message:  Contains the text that will be display whithin the pop-up
 * - $agree_button: Contains agree button title
 * - $disagree_button: Contains disagree button title
 */
?>

<div>
  <div class="popup-content info wrapper">
    <div class="popup-text">
      <?php print $message ?>
    </div>
    <div class="popup-buttons">
      <button type="button" class="button agree-button agreed"><?php print $agree_button; ?></button>
      <button type="button" class="button find-more-button more-info"><?php print $disagree_button; ?></button>
    </div>
  </div>
</div>