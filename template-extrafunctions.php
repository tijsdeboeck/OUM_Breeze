<?php

/**
 * Custom fuction to render a block anywhere
 *
 * @example usage in tpl.php files:
 *   print block_render('block', '2');
 *   print block_render('webform', 'client-block-17');
 *
 * @param $module
 *   entity module name
 * @param $block_id
 *   block id
 */
/*function block_render($module, $block_id) {
  $block = block_load($module, $block_id);
  $block_content = _block_render_blocks(array($block));
  $build = _block_get_renderable_array($block_content);
  $block_rendered = drupal_render($build);
  return $block_rendered;
}*/


/**
 * Creates a simple text rows array from a field collections, to be used in a
 * field_preprocess function.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 * @param $field_name
 *   The name of the field being altered.
 *
 * @param $field_array
 *   Array of fields to be turned into rows in the field collection.
 */

/*function rows_from_field_collection(&$vars, $field_name, $field_array) {
  $vars['rows'] = array();
  foreach($vars['element']['#items'] as $key => $item) {
    $entity_id = $item['value'];
    $entity = field_collection_item_load($entity_id);
    $wrapper = entity_metadata_wrapper('field_collection_item', $entity);
    $row = array();
    foreach($field_array as $field){
      $row[$field] = $wrapper->$field->value();
    }
    $vars['rows'][] = $row;
  }
}*/
