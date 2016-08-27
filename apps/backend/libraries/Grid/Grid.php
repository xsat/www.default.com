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
    }

    public function addItem(ItemInterface $item)
    {
        $this->items[] = $item;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getSize()
    {
        return sizeof($this->items);
    }

    public function isItems()
    {
        return $this->items && sizeof($this->items) > 0;
    }

    public function isModels()
    {
        return $this->models->items && sizeof($this->models->items) > 0;
    }

    public function getModels()
    {
        return $this->models->items;
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

        if (sizeof($this->models->items) > 0) {
            foreach ($this->models->items as $model) {
                $html .= '<tr>';

                foreach ($this->items as $item) {
                    $item->setModel($model);
                    $html .= '<td>';
                    $html .= $item->getValue();
                    $html .= '</td>';
                }

                $html .= '</tr>';
            }
        } else {
            $html .= '<tr align="center">';
            $html .= '<td colspan="' . sizeof($this->items) . '">';
            $html .= 'No Items';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

    public function renderPagination()
    {
        $pages = $this->paginator->getPages();
        $html = '';

        if (sizeof($pages) > 1) {
            $html .= '<nav>';
            $html .= '<ul class="pagination pagination-sm">';

            foreach ($this->paginator->getPages() as $page) {
                $html .= '<li' . $page->getClass() . '>';
                $html .= '<a' . $page->getLink() . '>';
                $html .= $page->getTitle();
                $html .= '</a>';
                $html .= '</li>';
            }

            $html .= '</ul>';
            $html .= '</nav>';
        }

        return $html;
    }
}
