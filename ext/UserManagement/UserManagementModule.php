<?php

namespace app\ext\UserManagement;

use Yii;
use yii\helpers\ArrayHelper;

class UserManagementModule extends \webvimark\modules\UserManagement\UserManagementModule
{
	public function init()
	{
		$this->setViewPath('@app/ext/UserManagement/views');
		parent::init();
	}
}