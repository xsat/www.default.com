<?php namespace Common\Models;

use \Phalcon\Mvc\Model as PhalconModel;

class Model extends PhalconModel
{
    public $id;

    final protected function now()
    {
        return date('Y-m-d H:i:s');
    }
}
