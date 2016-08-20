<?php namespace Backend\Libraries\Grid\Pagination;

class Next extends Item implements ItemInterface
{
    public function __construct($page)
    {
        parent::__construct($page->next, $page);
    }

    public function isNext()
    {
        return $this->number != $this->page->last;
    }

    public function getTitle()
    {
        return '<span class="glyphicon glyphicon-chevron-right"></span>';
    }
}