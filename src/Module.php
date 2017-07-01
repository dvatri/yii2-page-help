<?php
namespace tunect\Yii2PageHelp;

use Yii;

class Module extends \yii\base\Module
{
    public static $moduleName = 'help';
	public $tableName = '{{%help_page}}';
	public $roles = ['@'];

	public function init()
    {
        parent::init();
		if (($app instanceof \yii\web\Application) && !Yii::$app->request->isAjax) {
			$this->layout = Yii::$app->layout;
			$this->layoutPath = Yii::$app->layoutPath;
		}
		$this->registerTranslations();
    }

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

	public function registerTranslations()
    {
        Yii::$app->i18n->translations['tunect/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
			'basePath' => '@vendor/tunect/yii2-page-help/messages',
            'fileMap' => [
                'tunect/page-help' => 'main.php',
            ],
        ];
	}
}