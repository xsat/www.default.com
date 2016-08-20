<?php namespace Backend\Libraries\Grid\Pagination;

class Item implements ItemInterface
{
    protected $number;
    protected $page;

    public function __construct($number, $page)
    {
        $this->number = $number;
        $this->page = $page;
    }

    public function getLink()
    {
        return ' href="' . $this->number . '"';
    }

    public function getClass()
    {
        if ($this->page->current == $this->number) {
            return ' class="active"';
        }

        return '';
    }

    public function getTitle()
    {
        return $this->number;
    }
}