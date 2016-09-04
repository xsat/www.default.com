<?php namespace Frontend;

use \Common\Module as CommonModule,
	\Phalcon\DiInterface,
	\Common\Libraries\Translate\Serialize as Translate;

class Module extends CommonModule
{
	protected function initModule()
	{
		$this->dir = __DIR__;
		$this->prefix = 'Frontend';
	}

	public function registerServices(DiInterface $dependencyInjector)
	{
		parent::registerServices($dependencyInjector);

		$this->di->set('t', new Translate([
			'path' => $this->dir . '/../cache/configurations/' ,
			'lang' => $this->di->get('config')->lang,
		]), true);
	}
}
