<?php namespace Frontend;

use \Common\Module as CommonModule;

class Module extends CommonModule
{
	protected function initModule()
	{
		$this->dir = __DIR__;
		$this->prefix = 'Frontend';
	}
}
