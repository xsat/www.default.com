<?php namespace Backend\Libraries\Grid\Pagination;

class Prev extends Item implements ItemInterface
{
    public function __construct($page)
    {
        parent::__construct($page->before, $page);
    }

    public function isPrev()
    {
        return $this->number != $this->page->first;
    }

    public function getTitle()
    {
        return '<span class="glyphicon glyphicon-chevron-left"></span>';
    }
}