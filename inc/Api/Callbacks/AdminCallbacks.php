<?php
/**
 * @package  SimpleCookies
 */
namespace Simple_Cookies\Api\Callbacks;

use Simple_Cookies\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function helpTab($screen, $tab)
	{
		return require_once( "$this->plugin_path/templates/helptab.php" );
	}
}
