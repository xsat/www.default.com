<?php namespace Backend\Controllers;
/*
use \Backend\Libraries\Grid\Grid,
    \Backend\Libraries\Grid\Items\Item,
    \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\Link\GlyphiconLink;*/

class IndexController extends ParentController
{
    public function indexAction()
    {
        /*$grid = new Grid(
            \Backend\Models\User::find(), [
            new Item("id", "ID"),
            new Item("first_name"),
            new Item("second_name"),
            new Item("date_create"),
            new Item("date_update"),
            new Item("status"),
            new Link(['for' => 'test', 'id' => '$id'], "Edit"),
            new GlyphiconLink(['for' => 'test', 'id' => '$id'], 'trash'),
        ]);*/

        //$this->view->setVar('grid', $grid);
    }
}
