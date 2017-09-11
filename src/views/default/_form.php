<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model tunect\Yii2PageHelp\models\HelpPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="help-page-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
		<div class="col-md-12">
			<?= $form->field($model, 'status')->checkbox() ?>

		</div>
		<div class="col-md-12">
			<?= $form->field($model, 'page')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-md-12">
			<?= $form->field($model, 'content')->textarea(['rows' => '18']) ?>
		</div>

	</div>
	
	<div class="form-group">
		<?= Html::submitButton(\Yii::t('tunect/page-help', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

    <?php ActiveForm::end(); ?>

</div>
