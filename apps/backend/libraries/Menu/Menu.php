<?php namespace Backend\Libraries\Menu;

use \Phalcon\Mvc\User\Component,
    \Backend\Libraries\Menu\Items\Item;

class Menu extends Component
{
    private $items = [];

    public function __construct()
    {
        $this->setItems();
    }

    private function setItems()
    {
        $this->items = [
            'Users' => [
                new Item('Roles', ['for' => 'c-admin', 'controller' => 'role']),
            ],
            'Accesses' => [
                new Item('Role Accesses', ['for' => 'c-admin', 'controller' => 'role_access']),
                new Item('Accesses', ['for' => 'c-admin', 'controller' => 'access']),
                new Item('Resources', ['for' => 'c-admin', 'controller' => 'resource']),
            ],
        ];
    }

    public function getItems()
    {
        return $this->items;
    }
}