<?php
namespace tunect\Yii2PageHelp\models;

use tunect\Yii2PageHelp\Module;
use Yii;
/**
 * This is the model class for table "{{%help_page}}".
 *
 * @property integer $id
 * @property integer $status
 * @property string $created_at
 * @property string $page
 * @property string $content
 */
class HelpPage extends \yii\db\ActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	public static function tableName()
    {
        return \Yii::$app->getModule(Module::$moduleName)->tableName;
    }

    public function rules()
    {
        return [
            [['content'], 'safe'],
			[['page', 'status'], 'required'],
            [['page'], 'string', 'max' => 255],
        ];
    }

	/**
     * @inheritdoc
     * @return HelpPageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HelpPageQuery(get_called_class());
    }

	public function attributeLabels()
	{
		return [
			'status' => Yii::t('tunect/page-help', 'Status'),
			'created_at' => Yii::t('tunect/page-help', 'Created at'),
			'page' => Yii::t('tunect/page-help', 'Page'),
			'content' => Yii::t('tunect/page-help', 'Content'),
		];
	}
}
