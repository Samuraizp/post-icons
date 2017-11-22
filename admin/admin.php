<?php

if (!class_exists('PIconsAdmin', false)) :

	class PIconsAdmin
	{
		public function __construct()
		{
			add_action('admin_menu', array($this, 'adminMenu'));
			add_action('wp_ajax_picons_action', array($this, 'actionCallback'));
			add_action('admin_init', array($this, 'registerSettings'));
			$this->registerFiles();
		}

		function adminMenu()
		{
			add_submenu_page('options-general.php', 'Post icons Admin', 'Post icons',
				'manage_options', 'post-icons', array($this, 'adminPage'));
		}

		function registerFiles()
		{
			wp_enqueue_style('dashicons-picker', PICONS_PLUGIN_ADMIN_URL . '/assets/css/dashicons-picker.css', array('dashicons'), '1.0', false);
			wp_enqueue_script('dashicons-picker', PICONS_PLUGIN_ADMIN_URL . '/assets/js/dashicons-picker.js', array('jquery'), '1.1', true);
			wp_enqueue_script('admin', PICONS_PLUGIN_ADMIN_URL . '/assets/js/admin.js', array('jquery'), '1.0', true);
		}

		function registerSettings()
		{
			register_setting('picons-settings-group', 'picons_visible');
			register_setting('picons-settings-group', 'post_title_icon');
			register_setting('picons-settings-group', 'post_title_icon_position');
		}

		function adminPage()
		{
			if (!class_exists('PI_Helper'))
			{
				include_once PICONS_ABSPATH . '\admin\helper\class-helper.php';
				PI_Helper::renderAdminPage();
			}

		}

		function actionCallback()
		{
			$id    = intval($_POST['id']);
			$value = intval($_POST['value']);
			if ($value)
			{
				add_post_meta($id, 'post_icon_meta', $value, true);
			}
			else
			{
				delete_post_meta($id, 'post_icon_meta');
			}
			die();
		}
	}

endif;

return new PIconsAdmin();












