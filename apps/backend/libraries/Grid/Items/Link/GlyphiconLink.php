<?php namespace Backend\Libraries\Grid\Items\Link;

use \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\ItemInterface;

class GlyphiconLink extends Link implements ItemInterface
{
    public function __construct($params = [], $icon = "", $title = "")
    {
        $linkText = '<i class="glyphicon glyphicon-' . $icon . '"></i>';
        parent::__construct($params, $linkText, $title);
    }
}