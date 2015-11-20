<?php

/**
* Removes default Drupal css.
*/
function OUM_Breeze_css_alter(&$css) {
  $exclude = array(
    // Remove core module CSS
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/field/theme/field.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/system/admin.css' => FALSE,
    'modules/system/maintenance.css' => FALSE,
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,

    // Remove contrib module CSS
    drupal_get_path('module', 'views') . '/css/views.css' => FALSE,
    drupal_get_path('module', 'ctools') . '/css/ctools.css' => FALSE,
    drupal_get_path('module', 'eu_cookie_compliance') . '/css/eu_cookie_compliance.css' => FALSE,
  );

  $css = array_diff_key($css, $exclude);
}


/**
 * Alter some page related things
 */
function OUM_Breeze_page_alter(&$page) {
  // get rid of main content block wrapper
  if (!empty($page['content']['system_main'])) {
    $page['content']['system_main']['#theme_wrappers'] = array_diff($page['content']['system_main']['#theme_wrappers'], array('block'));
  }

  // force the footer to render even if empty
  if ( !isset($page["footer"]) || empty($page["footer"])) {
      $page["footer"] = array(
          '#region' => 'footer',
          '#weight' => '-10',
          '#theme_wrappers' => array('region'));
  }
}


/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Adds a HTML5 placeholder to the search block.
 */
function OUM_Breeze_form_search_block_form_alter(&$form, &$form_state, $form_id) {
  $form['search_block_form']['#attributes']['placeholder'] = t('Search');
}


/**
 * Implements theme_menu_link().
 * Add level indicator css class to all menu items and menu links.
 */
function OUM_Breeze_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $element['#attributes']['class'][] = 'menu-item menu-item--level-' . $element['#original_link']['depth'];
  $menu_link = 'menu-item-link menu-item-link--level-' . $element['#original_link']['depth'];
  if ($element['#below']) {
    $element['#attributes']['class'][] = 'menu-item--parent';
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array($menu_link))));
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


/**
 * Implements hook_breadcrumb().
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function OUM_Breeze_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    $breadcrumb[] = drupal_get_title();
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= implode(' <span aria-hidden="true">&gt;</span> ', $breadcrumb);
    return $output;
  }
}
