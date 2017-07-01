<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use tunect\Yii2PageHelp\models\HelpPage;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel tunect\Yii2PageHelp\models\HelpPageSearch */
$this->title = Yii::t('tunect/page-help', 'Help pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-help-default-index">

	<h2><?= $this->title ?></h2>

	<p>
        <?= Html::a(Yii::t('tunect/page-help', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			'status:boolean',
			'created_at:datetime',
			'page',
			[
				'attribute' => 'content',
				'format' => 'ntext',
				'contentOptions' => ['class' => 'small'],
				'value' => function (HelpPage $model) {
					return StringHelper::truncateWords($model->content, 5);
				},
			],
			[
				'class' => 'yii\grid\ActionColumn',
			],
        ],
    ]); ?>
</div>
