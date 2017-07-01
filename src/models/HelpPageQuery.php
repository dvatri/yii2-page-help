<?php
namespace tunect\Yii2PageHelp\models;

/**
 * This is the ActiveQuery class for [[HelpPage]].
 *
 * @see HelpPage
 */
class HelpPageQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['[[status]]' => HelpPage::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     * @return HelpPage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HelpPage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
