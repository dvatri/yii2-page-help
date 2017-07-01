<?php
namespace tunect\Yii2PageHelp;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $name = Module::$moduleName;

		if (!$app->hasModule($name)) {
			$app->setModule($name, new Module($name));
		}
        if ($app instanceof \yii\web\Application) {
            $rules[] = [
                'class' => 'yii\web\GroupUrlRule',
                'prefix' => $name,
                'rules' => [
                    '/' => 'default/index',
                    '<action:[\w-]+>' => 'default/<action>',
                ],
            ];
            $app->getUrlManager()->addRules($rules, false);

        } elseif ($app instanceof \yii\console\Application) {
			$app->controllerMap = array_merge($app->controllerMap, [
				'migrate' => [
					'migrationNamespaces' => [
						'tunect\Yii2PageHelp\migrations',
					],
				],
			]);
			if (empty($app->controllerMap['migrate']['class'])) {
				$app->controllerMap['migrate']['class'] = 'yii\console\controllers\MigrateController';
			}
        }
    }
}
