<?php
use yii\widgets\DetailView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model tunect\Yii2PageHelp\models\HelpPage */

$this->title = Html::encode($model->page);
$this->params['breadcrumbs'][] = ['label' => Yii::t('tunect/page-help', 'Help pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$parser = new \cebe\markdown\Markdown();
?>

<?php if (!Yii::$app->request->isAjax) : ?>
<p>
	<?= Html::a(Yii::t('tunect/page-help', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</p>
<?php endif; ?>
<div class="help-page-view">
    <?= $parser->parse($model->content) ?>
</div>
