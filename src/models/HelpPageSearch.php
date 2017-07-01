<?php
namespace tunect\Yii2PageHelp\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class HelpPageSearch extends HelpPage
{
	private $formName;

    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['page', 'content'], 'safe'],
        ];
    }

	public function formName()
	{
		return empty($this->formName) ? parent::formName() : $this->formName;
	}

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($query, $params, $formName=null)
    {
		$this->formName = $formName;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

		if ($this->status === null || $this->status === '') {
			$query->andWhere(['<>', '[[status]]', self::STATUS_INACTIVE]);
		}

        // grid filtering conditions
        $query->andFilterWhere([
			'[[id]]' => $this->id,
            '[[status]]' => $this->status,
        ]);

        $query->andFilterWhere(['like', '[[page]]', $this->page])
            ->andFilterWhere(['like', '[[content]]', $this->content]);

        return $dataProvider;
    }
}
