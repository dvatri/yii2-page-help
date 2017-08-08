<?php
namespace tunect\Yii2PageHelp\widgets;

use Yii;
use yii\helpers\Url;
use yii\bootstrap\Button;
use tunect\Yii2PageHelp\Module;
use tunect\Yii2PageHelp\models\HelpPage;

class HelpButton extends Button
{
	public $label = '';
	public $encodeLabel = false;
	public $tagName = 'a';
	private $page;

	public function init()
	{
		parent::init();
		$this->page = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;

		// Add module prefix
		if (Yii::$app->controller->module->id !== Yii::$app->id) {
			$this->page = Yii::$app->controller->module->id . '/' . $this->page;
		}

		$this->options['class'] = 'showModalButton glyphicon glyphicon-question-sign btn';
		$this->options['href'] = Url::toRoute(['/' . Module::$moduleName . '/for-page', 'page' => $this->page]);
	}

	public function run()
	{
		if (!HelpPage::hasHelpForPage($this->page)) {
			return;
		}
		return parent::run();
	}
}