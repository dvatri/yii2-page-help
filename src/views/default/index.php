<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="page-help-default-index">

	<h2><?= Html::encode('Javascript errors')?></h2>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
			'status:boolean',
			'created_at:datetime',
			'page',
			[
				'attribute' => 'content',
				'format' => 'ntext',
				'contentOptions' => ['class' => 'small'],
			],
        ],
    ]); ?>
</div>
