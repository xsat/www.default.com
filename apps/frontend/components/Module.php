<?php namespace Frontend;

class Module extends \Common\Module
{
	protected function initModule()
	{
		$this->dir = __DIR__;
		$this->prefix = 'Frontend';
	}
}
