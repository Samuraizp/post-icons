<?php
/*
Plugin Name: Post icons
Description: Post icons
Version: 1.0
*/
?>
<?php

define('PICONS_PLUGIN', __FILE__);
define('PICONS_PLUGIN_DIR', untrailingslashit(dirname(PICONS_PLUGIN)));
define('PICONS_PLUGIN_URL', untrailingslashit(plugins_url('', PICONS_PLUGIN)));
define('PICONS_PLUGIN_ADMIN_URL', PICONS_PLUGIN_URL . '/admin');
define('PICONS_PLUGIN_BASENAME', plugin_basename(PICONS_PLUGIN));

require_once PICONS_PLUGIN_DIR . '/settings.php';
