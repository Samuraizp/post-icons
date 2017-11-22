<?php

/**
 * Created by PhpStorm.
 * User: Samurai
 * Date: 22.11.2017
 * Time: 10:53
 */
final Class PostIcons
{

	protected static $_instance = null;

	public function __construct()
	{
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	private function define_constants()
	{
		$this->define('PICONS_ABSPATH', dirname(PICONS_PLUGIN) . '/');
		$this->define('PICONS_PLUGIN_DIR', untrailingslashit(dirname(PICONS_PLUGIN)));
		$this->define('PICONS_PLUGIN_URL', untrailingslashit(plugins_url('', PICONS_PLUGIN)));
		$this->define('PICONS_PLUGIN_ADMIN_URL', PICONS_PLUGIN_URL . '/admin');
	}

	private function define($name, $value)
	{
		if (!defined($name))
		{
			define($name, $value);
		}
	}

	public function includes()
	{
		if (is_admin())
		{
			include_once(PICONS_ABSPATH . 'admin/admin.php');
		}
	}

	private function init_hooks()
	{
		if (!is_admin())
		{
			add_filter('the_title', array($this, 'editTitle'), 10, 2);
		}
	}


	public static function instance()
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	function editTitle($title, $id)
	{
		$position = get_option('post_title_icon_position');
		$icon     = get_option('post_title_icon');
		$show     = get_post_meta($id, 'post_icon_meta');
		if ($show)
		{
			if ($position == 'left')
			{
				$title = '<p class="dashicons ' . $icon . '"></p>' . $title;
			}
			else
			{
				$title = $title . '<p class="dashicons ' . $icon . '"></p>';
			}
		}

		return $title;
	}
}