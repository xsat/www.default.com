<?php namespace Backend\Libraries\Grid;

use \Phalcon\Paginator\AdapterInterface,
    \Phalcon\Paginator\Adapter\NativeArray as ArrayPaginator,
    \Phalcon\Paginator\Adapter\Model as ModelPaginator,
    \Phalcon\Paginator\Adapter\QueryBuilder as BuilderPaginator,
    \Phalcon\Paginator\Exception,
    \Backend\Libraries\Grid\Pagination\Item,
    \Backend\Libraries\Grid\Pagination\Prev,
    \Backend\Libraries\Grid\Pagination\Next;

class Pagination  implements AdapterInterface
{
    private $paginator = null;
    private $page = null;
    private $pages = [];

    public function __construct($config = [])
	{
        if (isset($config['data'])) {
            if (is_array($config['data'])) {
                $this->paginator = new ArrayPaginator($config);
            } else {
                $this->paginator = new ModelPaginator($config);
            }
        } else if (isset($config['builder'])) {
            $this->paginator = new BuilderPaginator($config);
        } else {
            throw new Exception('Wrong config paginator');
        }
	}

    public function getPaginate()
    {
        $this->page = $this->paginator->getPaginate();
        $this->createPages();

        return $this->page;
    }

    private function createPages()
    {
        $this->pages[] = new Prev($this->page);

        for ($number = $this->page->first; $number <= $this->page->total_pages; $number++) {
            $this->pages[] = new Item($number, $this->page);
        }

        $this->pages[] = new Next($this->page);
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function setCurrentPage($page)
    {
        $this->paginator->setCurrentPage($page);

        return $this;
    }

    public function setLimit($limit)
    {
        $this->paginator->setLimit($limit);

        return $this;
    }

    public function getLimit()
    {
        return $this->paginator->getLimit();
    }
}
