<?php namespace Backend\Libraries\Grid;

use \Phalcon\Mvc\User\Component,
    \Backend\Libraries\Grid\Items\ItemInterface;

class Grid extends Component
{
    private $paginator;
    private $models;
    private $items = [];

    public function __construct($data, $items = [], $filters = [])
    {
        $this->paginator =  new Pagination([
            'data'  => $data,
            'limit' => 10,
            'page'  => $this->request->get('page', 'int', 1),
        ]);
        $this->models = $this->paginator->getPaginate();
        $this->items = $items;
        $this->filters = $filters;

        $this->paginator->getPages();
    }

    public function addItem(ItemInterface $item)
    {
        $this->items[] = $item;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function isItems()
    {
        return $this->items && sizeof($this->items) > 0;
    }

    public function getSize()
    {
        return sizeof($this->items);
    }

    public function isModels()
    {
        return $this->models->items && sizeof($this->models->items) > 0;
    }

    public function getModels()
    {
        return $this->models->items;
    }

    public function isPages()
    {
        return sizeof($this->getPages()) > 3;
    }

    public function getPages()
    {
        return $this->paginator->getPages();
    }
}
