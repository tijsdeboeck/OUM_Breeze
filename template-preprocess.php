<?php

/**
 * phptemplate_preprocess_html() overrides
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_html(&$variables) {
  //first get some nescessary stuff
  $theme_path = drupal_get_path('theme', $GLOBALS['theme']);
  $node = menu_get_object();

  /* Add JS & CSS
  ---------------------------------------------------------------------------- */
  // add theme path as js setting var
  drupal_add_js(array('path_to_theme' => base_path() . $theme_path), 'setting');

  // js files header
  $selectivizr = array(
    '#tag' => 'script',
    '#attributes' => array(
      'src' => $theme_path . '/assets/js/vendor/selectivizr/selectivizr.1.0.3b.min.js',
    ),
    '#prefix' => '<!--[if (gte IE 6)&(lte IE 8)]>',
    '#suffix' => '</script><![endif]-->',
  );
  drupal_add_html_head($selectivizr, 'selectivizr');

  drupal_add_js($theme_path . '/assets/js/vendor/modernizr/modernizr.min.js', array('group' => JS_LIBRARY, 'weight' => -999, 'every_page' => TRUE));
  drupal_add_js($theme_path . '/assets/js/vendor/respond/respond.1.4.2.min.js', array('group' => JS_LIBRARY, 'weight' => -998, 'every_page' => TRUE));

  // js files footer
  //drupal_add_js($theme_path . '/assets/js/vendor/picturefill/picturefill.min.js', array('scope' => 'footer', 'every_page' => TRUE, 'async' => TRUE));
  //drupal_add_js($theme_path . '/assets/js/vendor/lazysizes/lazysizes.min.js', array('scope' => 'footer', 'every_page' => TRUE, 'async' => TRUE));

  drupal_add_js($theme_path . '/assets/js/plugins.js', array('scope' => 'footer', 'every_page' => TRUE));
  drupal_add_js($theme_path . '/assets/js/main.js', array('scope' => 'footer', 'every_page' => TRUE));

  // css files
  drupal_add_css('http://fonts.googleapis.com/css?family=Open+Sans:400,700', array('type' => 'external', 'weight' => 0));

  drupal_add_css($theme_path . '/assets/scss/main.scss', array('group' => CSS_THEME, 'every_page' => TRUE));
  drupal_add_css($theme_path . '/assets/scss/ie.scss', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 9', '!IE' => FALSE), 'every_page' => TRUE));
  //drupal_add_css($theme_path . '/assets/scss/print.scss', array('group' => CSS_THEME, 'every_page' => TRUE, 'media' => 'print'));


  /* Overrides
  ---------------------------------------------------------------------------- */
  // add unpublished class to the body, if the current node is unpublished
  if ($node && isset($node->nid) && !$node->status) {
    $variables['classes_array'][] = 'unpublished';
  }
  // get rid of .no-sidebars class that Drupal adds
  $variables['classes_array'] = array_diff($variables['classes_array'], array(
   'no-sidebars',
  ));

  //dsm($variables);
}


/**
 * phptemplate_preprocess_page() overrides
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_page(&$variables) {
  /* Template suggestions
  ---------------------------------------------------------------------------- */
  if(module_exists('path')) {
    // gets the "clean" URL of the current page
    $alias = drupal_get_path_alias($_GET['q']);

    if ($alias != $_GET['q']) {
      $template_filename = 'page__alias_';
      foreach(explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '_' . $path_part;
        $variables['theme_hook_suggestions'][] = $template_filename;
      }
    }
  }

  // suggestions for individual nodes
  if(isset($variables['node'])) {
    // template suggestions for nodes in general
    $variables['theme_hook_suggestions'][] = 'page__'.$variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'page__node__'.$variables['node']->nid;

    // template suggestions for nodes in teaser view
    if(isset($variables['teaser']) && $variables['teaser']) {
      $variables['theme_hook_suggestions'][] = 'page__'.$variables['node']->type.'_teaser';
      $variables['theme_hook_suggestions'][] = 'page__node__'.$variables['node']->nid.'_teaser';
    }
  }

  //dsm($variables);
  //dsm($variables['theme_hook_suggestions']);
}


/**
 * phptemplate_preprocess_node() overrides
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_node(&$variables) {
  /* Template suggestions
  ---------------------------------------------------------------------------- */
  // individual nodes
  if($variables['page']) {
    $variables['theme_hook_suggestions'][] = 'node__page';
    $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->type.'_page';
    $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->nid.'_page';
  }
  // multiple nodes being displayed on one page in either teaser or full view
  else {
    // template suggestions for nodes in general
    $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->nid;

    // template suggestions for nodes in teaser view
    if($variables['teaser']) {
      $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->type.'_teaser';
      $variables['theme_hook_suggestions'][] = 'node__'.$variables['node']->nid.'_teaser';
    }
  }
  // the path module is required and must be activated
  if(module_exists('path')) {
    // gets the "clean" URL of the current page
    $alias = drupal_get_path_alias($_GET['q']);

    if ($alias != $_GET['q']) {
      $template_filename = 'node__alias_';
      foreach(explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '_' . $path_part;
        $variables['theme_hook_suggestions'][] = $template_filename;
      }
    }
  }

  //dsm($variables['theme_hook_suggestions']);
  //dsm($variables);
}


/**
 * phptemplate_preprocess_region() overrides
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_region(&$variables) {
  // Provide a valid, unique HTML ID.
  $variables['region'] = drupal_html_id($variables['region']);
}


/**
 * Implements template_preprocess_block()
 */
function OUM_Breeze_preprocess_block(&$variables) {
  /* Template suggestions
  ---------------------------------------------------------------------------- */
  // the "cleaned-up" block title to be used for suggestion file name
  $subject = str_replace(" ", "_", strtolower($variables['block']->subject));

  $variables['theme_hook_suggestions'][] = 'block__'.$variables['block']->delta;
  $variables['theme_hook_suggestions'][] = 'block__'.$subject;

  //dsm($variables['theme_hook_suggestions']);
  //dsm($variables);
}


/**
 * Implements template_preprocess_taxonomy_term()
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_taxonomy_term(&$variables) {
  //dsm($variables['theme_hook_suggestions']);
  //dsm($variables);
}


/**
 * Implements template_preprocess_taxonomy_term()
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_user_profile(&$variables) {
  //dsm($variables['theme_hook_suggestions']);
  //dsm($variables);
}


/**
 * Implements template_preprocess_taxonomy_term()
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_comment(&$variables) {
  //dsm($variables['theme_hook_suggestions']);
  //dsm($variables);
}


/**
 * Implements template_preprocess_field()
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_field(&$variables, $hook) {
  //dsm($variables);
  //dsm($variables['theme_hook_suggestions']);
}


/**
 * Implements template_preprocess_button().
 *
 * @param $variables
 *   An array of variables to pass to the theme function.
 */
function OUM_Breeze_preprocess_button(&$variables) {
  // Rewrite the drupal classes for buttons so we can consistently theme them.
  $variables['element']['#attributes']['class'][] = 'button';
  if (isset($variables['element']['#value'])) {
    $classes = array(
      //specifics
      t('Save and add') => '',
      t('Add another item') => '',
      t('Add effect') => '',
      t('Add and configure') => '',
      t('Update style') => '',
      t('Download feature') => '',
      //generals
      t('Save') => 'primary',
      t('Apply') => '',
      t('Create') => '',
      t('Confirm') => 'primary',
      t('Submit') => 'primary',
      t('Export') => '',
      t('Import') => '',
      t('Restore') => '',
      t('Rebuild') => '',
      t('Search') => '',
      t('Add') => '',
      t('Update') => '',
      t('Delete') => 'alert',
      t('Remove') => 'alert',
    );
    foreach ($classes as $search => $class) {
      if (strpos($variables['element']['#value'], $search) !== FALSE) {
        $variables['element']['#attributes']['class'][] = $class;
        break;
      }
    }
  }
}
