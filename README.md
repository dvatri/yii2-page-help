# Controller action-based page help storage extension for Yii2 framework

This module provides ability to create help pages and link them to your app controller's actions. Widged can be used to display modal pop-over with help page linked to particular (current) action for end users.

## Installation

Run to install extension:

	composer require tunect/yii2-page-help

Run migration:

	./yii migrate

*It's possible to add custom migration paths since Yii2 2.0.10 (module adds it's path in tunect\Yii2PageHelp\Bootstrap file)*

Additional settings are optional.

## Module settings

To specify module name (default name is `help`) set it in index.php or in config file (before config goes to Application constructor):

	\tunect\Yii2PageHelp\Module::$moduleName = 'custom-help';

Module settings can be changed in app config:

	'modules' => [
		'help' => [
			'class' => 'tunect\Yii2PageHelp\Module',
			'tableName' => '{{%custom_table_name}}',
			'roles' => function () {
				return [\app\models\User::ROLE_ADMIN];
			},
		],
	],

*Note: Settings should be specified both in web and console app configs since this module has a migration. Or you can use common config, merge config parts, etc.*

By default `'@'` (any authenticated user) role will be used, but any other role(s) can be defined in `roles` module property (see example above). It can take scalar value, array or callable.

## Usage

To create or update help for any page of your website visit `/<module_name>/index` page (by default `/help/index`). `<module_name>` is the name module was registred with, if you changed `Module::$moduleName` - use your value.

`Page` field should contain page path in format `<controller>/<action>`, check looks like:

	Yii::$app->controller->id . '/' . Yii::$app->controller->action->id

`Content` field can contain any help info with Markdown support. This content will be displayed in modal available for particular page.

To add help modal button to layout just add widget to any place in view (layout) file (e.g. next to page header `h1`):

	<?= \tunect\Yii2PageHelp\widgets\HelpButton::widget(); ?>

On button click modal will be displayed. Button will be visible only if help record exists for current page.

(the name module was registred with, if you changed `Module::$moduleName` - use your value as a path).

## TODO

* Implement global search
* Implement module support (in addition to controller and action match check)
