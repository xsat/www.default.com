<?php namespace Common\Controllers;

use \Phalcon\Mvc\Controller as PhalconController;

abstract class ParentController extends PhalconController
{
    public function errorAction()
    {
        $this->response->setStatusCode(404);
    }
}
