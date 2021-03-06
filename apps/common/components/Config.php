<?php namespace Common;

use \Phalcon\Config as PhalconConfig;

class Config extends PhalconConfig
{
	public function __construct()
	{
		$config = ['database' => [
			'adapter'  => 'Mysql',
			'host'     => 'localhost',
			'username' => 'root',
			'password' => '',
			'name'     => 'default',
		], 'lang' => 'en'];

		parent::__construct($config);
	}
}