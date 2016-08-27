<?php namespace Backend\Models\Role;

use \Backend\Models\Role;

class Builder extends Role
{
    public $name;

    private $builder = null;

    public function initialize()
    {
        $this->builder = $this->modelsManager
            ->createBuilder()
            ->from(__NAMESPACE__);
    }

    public function execute()
    {
        return $this->builder->getQuery()->execute();
    }

    public function setName($name)
    {
        $this->builder->andWhere('name LIKE :name:', ['name' => $name]);
        $this->name = $name;
    }
}