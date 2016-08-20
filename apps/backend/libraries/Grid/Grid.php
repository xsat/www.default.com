<?php namespace Backend\Libraries\Grid;

use \Phalcon\Mvc\User\Component;

class Grid extends Component
{
    private $paginator;
    private $page;
    private $items = [];
    private $filters = [];

    public function __construct($data, $items = [], $filters = [])
    {
        $this->paginator =  new Pagination([
            'data'  => $data,
            'limit' => 1,
            'page'  => 3,
        ]);
        $this->page = $this->paginator->getPaginate();
        $this->items = $items;
        $this->filters = $filters;
    }

    public function renderFilters()
    {
    }

    public function renderHeader()
    {
        $html = '<tr class="info">';

        foreach ($this->items as $item) {
            $html .= '<th>';
            $html .= $item->getTitle();
            $html .= '</th>';
        }

        $html .= '</tr>';

        return $html;
    }

    public function renderBody()
    {
        $html = '';

        foreach ($this->page->items as $model) {
            $html .= '<tr>';

            foreach ($this->items as $item) {
                $item->setModel($model);
                $html .= '<td>';
                $html .= $item->getValue();
                $html .= '</td>';
            }

            $html .= '</tr>';
        }

        return $html;
    }

    public function renderPagination()
    {
        $html = '<nav>';
        $html .= '<ul class="pagination">';

        foreach ($this->paginator->getPages() as $page) {
            $html .= '<li'.$page->getClass().'>';
            $html .= '<a'.$page->getLink().'>';
            $html .= $page->getTitle();
            $html .= '</a>';
            $html .= '</li>';
        }

        $html .= '</ul>';
        $html .= '</nav>';

        return $html;
    }
}
