<?php namespace Backend;

use \Common\Module as CommonModule,
	\Phalcon\DiInterface,
	\Backend\Libraries\Menu\Menu;

class Module extends CommonModule
{
	protected function initModule()
	{
		$this->dir = __DIR__;
		$this->prefix = 'Backend';
	}

	public function registerServices(DiInterface $dependencyInjector)
	{
		parent::registerServices($dependencyInjector);

		$this->di->set('menu', new Menu(), true);
	}
}
