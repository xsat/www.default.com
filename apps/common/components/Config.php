<?php namespace Common;

class Config extends \Phalcon\Config
{
	public function __construct()
	{
		$config = ['database' => [
			'adapter'  => 'Mysql',
			'host'     => 'localhost',
			'username' => 'root',
			'password' => '',
			'name'     => 'test',
		]];

		parent::__construct($config);
	}
}