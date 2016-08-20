<?php namespace Common;

class Alc extends \Phalcon\Acl\Adapter\Memory
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
