<?php namespace Backend\Libraries\Grid;

use \Backend\Libraries\Grid\Pagination\Item,
    \Backend\Libraries\Grid\Pagination\Prev,
    \Backend\Libraries\Grid\Pagination\Next;

class Pagination extends \Phalcon\Paginator\Adapter\Model
{
    private $page;
    private $pages;

    public function getPaginate()
    {
        $this->page = parent::getPaginate();
        $this->createPages();

        return $this->page;
    }

    private function createPages()
    {
        $prev = new Prev($this->page);
        if ($prev->isPrev()) {
            $this->pages[] = $prev;
        }

        for ($number = $this->page->first; $number <= $this->page->total_pages; $number++) {
            $this->pages[] = new Item($number, $this->page);
        }

        $next = new Next($this->page);
        if ($next->isNext()) {
            $this->pages[] = $next;
        }
    }

    public function getPages()
    {
        return $this->pages;
    }
}
