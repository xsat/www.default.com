<?php namespace Common;

use \Phalcon\Acl\Adapter\Memory;

class Alc extends Memory
{
    public function __construct()
    {
        parent::__construct();
        $this->createRoles();
    }

    private function createRoles()
    {
        /*$this->addRole(new \Phalcon\Acl\Role('Users'));
        $this->addRole(new \Phalcon\Acl\Role('Guests'));*/
    }
}
