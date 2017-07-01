<?php
namespace tunect\Yii2PageHelp\controllers;

use Yii;
use tunect\Yii2PageHelp\models\HelpPage;
use tunect\Yii2PageHelp\models\HelpPageSearch;
use tunect\Yii2PageHelp\Module;

use yii\web\NotFoundHttpException;

class DefaultController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
			'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => Yii::$app->getModule(Module::$moduleName)->getRoles(),
                    ],
                ],
            ],
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
		$searchModel = new HelpPageSearch();
        $dataProvider = $searchModel->search(HelpPage::find(), Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
		$model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new HelpPage();
		$model->status = $model::STATUS_ACTIVE;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

	public function actionForPage($page)
	{
		$model = HelpPage::find()->active()->andWhere(['page' => urldecode($page)])->orderBy(['created_at' => SORT_DESC])->one();

		if (null === $model) {
			throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
		}

		return $this->render('view', [
            'model' => $model,
        ]);
	}

	/**
     * Finds the HelpPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HelpPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HelpPage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
        }
    }

}
