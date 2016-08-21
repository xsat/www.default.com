<?php namespace Common\Plugins\Authorization;

use \Phalcon\Acl\Adapter\Memory as AclList;

abstract class Acl extends AclList
{
    public function check()
    {
        if (!file_exists($this->getDirectory())) {
            $this->write();
        } else {
            $this->load();
        }
    }

    public function write()
    {
        file_put_contents($this->getDirectory(), serialize($this));
    }

    public function load()
    {
        return unserialize(file_get_contents($this->getDirectory()));
    }

    abstract protected function getDirectory();
}