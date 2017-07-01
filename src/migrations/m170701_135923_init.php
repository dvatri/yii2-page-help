<?php
namespace tunect\Yii2PageHelp\migrations;

use yii\db\Migration;
use tunect\Yii2PageHelp\Module;

class m170701_135923_init extends Migration
{
	private $table_name;

	public function init()
	{
		parent::init();
		$this->table_name = \Yii::$app->getModule(Module::$moduleName)->tableName;
	}
    public function safeUp()
    {
		$this->createTable($this->table_name, [
			'id' => $this->primaryKey(),
			'status' => $this->smallInteger(),
			'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
			'page' => $this->string(),
			'content' => $this->text(),
		]);

		$this->createIndex('idx-help_page-status-page', $this->table_name, ['status', 'page']);
    }

    public function safeDown()
    {
		$this->dropIndex('idx-help_page-status-page', $this->table_name);
		$this->dropTable($this->table_name);
    }
}
