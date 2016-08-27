<?php namespace Backend\Libraries\Grid\Pagination;

use \Phalcon\Tag;

class Next extends Item implements ItemInterface
{
    public function __construct($page)
    {
        parent::__construct($page->next, $page);
    }

    public function getTitle()
    {
        return Tag::tagHtml('span', ['class' => 'glyphicon glyphicon-chevron-right'], true);
    }

    public function getClass()
    {
        if ($this->isNext()) {
            return 'disabled';
        }

        return '';
    }

    public function getLink()
    {
        if ($this->isNext()) {
            return 'javascript:void(0);';
        }

        return parent::getLink();
    }

    public function isNext()
    {
        return $this->page->current == $this->number;
    }
}