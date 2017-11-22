<?php
/*
Plugin Name: Post icons
Description: Post icons
Version: 1.0
*/
?>
<?php

if (!defined('ABSPATH'))
{
	exit;
}

if (!defined('PICONS_PLUGIN'))
{
	define('PICONS_PLUGIN', __FILE__);
}

if (!class_exists('PostIcons'))
{
	include_once dirname(PICONS_PLUGIN) . '/includes/class-picons.php';
}

function postIcons()
{
	return PostIcons::instance();
}

$GLOBALS['postIcons'] = postIcons();
