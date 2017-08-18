<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model tunect\Yii2PageHelp\models\HelpPage */

$module = '/' . \tunect\Yii2PageHelp\Module::$moduleName;

$this->title = Html::encode($model->page);
$this->params['breadcrumbs'][] = ['label' => Yii::t('tunect/page-help', 'Help pages'), 'url' => [$module . '/default/index']];
$this->params['breadcrumbs'][] = $this->title;

$parser = new \cebe\markdown\Markdown();
?>

<p class="pull-right">
	<?php if (!Yii::$app->request->isAjax) : ?>
		<?= Html::a(Yii::t('tunect/page-help', 'Visit page'), ['/' . $model->page], ['class' => 'btn btn-default btn-xs']) ?>
	<?php endif; ?>
	<?= Html::a(
		Yii::t('tunect/page-help', 'Update'),
		[$module . '/default/update', 'id' => $model->id],
		['class' => 'btn btn-primary btn-xs' . (Yii::$app->request->isAjax ? ' showModalButton' : '')]
	) ?>
</p>
<div class="help-page-view">
    <?= $parser->parse($model->content) ?>
	&nbsp;
</div>

