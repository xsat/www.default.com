<?php namespace Backend\Plugins\Authorization;

use \Common\Plugins\Authorization\Acl as CommonAcl;

class Acl extends CommonAcl
{
    protected function getDirectory()
    {
        return __DIR__ . '/../../cache/configurations/acl.data';
    }
}