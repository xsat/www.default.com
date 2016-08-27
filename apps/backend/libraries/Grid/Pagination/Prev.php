<?php namespace Backend\Libraries\Grid\Pagination;

use \Phalcon\Tag;

class Prev extends Item implements ItemInterface
{
    public function __construct($page)
    {
        parent::__construct($page->before, $page);
    }

    public function getTitle()
    {
        return Tag::tagHtml('span', ['class' => 'glyphicon glyphicon-chevron-left'], true);
    }

    public function getClass()
    {
        if ($this->isPrev()) {
            return 'disabled';
        }

        return '';
    }

    public function getLink()
    {
        if ($this->isPrev()) {
            return 'javascript:void(0);';
        }

        return parent::getLink();
    }

    public function isPrev()
    {
        return $this->page->current == $this->number;
    }
}