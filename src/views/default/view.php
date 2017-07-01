<?php
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model tunect\Yii2PageHelp\models\HelpPage */
?>
<div class="help-page-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'status:boolean',
			'created_at:datetime',
            'page',
			'content',
        ],
    ]) ?>

</div>
