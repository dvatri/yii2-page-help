<?php
namespace tunect\Yii2PageHelp;

class Module extends \yii\base\Module
{
    public static $moduleName = 'help';
	public $tableName = '{{%help_page}}';
	public $roles = ['@'];

	public function getRoles()
	{
		if (is_callable($this->roles)) {
			return call_user_func($this->roles);
		}
		if (is_array($this->roles)) {
			return $this->roles;
		}
		return [$this->roles];
	}
}