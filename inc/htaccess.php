<?php
//stolen from Roots - adds h5bp to htaccess
function wolf_add_h5bp_htaccess($content) {
  global $wp_rewrite;
  $home_path = function_exists('get_home_path') ? get_home_path() : ABSPATH;
  $htaccess_file = $home_path . '.htaccess';
  $mod_rewrite_enabled = function_exists('got_mod_rewrite') ? got_mod_rewrite() : false;

  if ((!file_exists($htaccess_file) && is_writable($home_path) && $wp_rewrite->using_mod_rewrite_permalinks()) || is_writable($htaccess_file)) {
    if ($mod_rewrite_enabled) {
      $h5bp_rules = extract_from_markers($htaccess_file, 'HTML5 Boilerplate');
      if ($h5bp_rules === array()) {
        $filename = dirname(__FILE__) . '/h5bp-htaccess';
        return insert_with_markers($htaccess_file, 'HTML5 Boilerplate', extract_from_markers($filename, 'HTML5 Boilerplate'));
      }
    }
  }

  return $content;
}

add_action('generate_rewrite_rules', 'wolf_add_h5bp_htaccess');