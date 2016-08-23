<?php namespace Backend\Libraries\Grid\Items\Link;

use \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\ItemInterface,
    \Phalcon\Tag;

class GlyphIconLink extends Link implements ItemInterface
{
    public function __construct($params = [], $icon = "", $title = "")
    {
        parent::__construct($params, Tag::tagHtml('span', [
            'class' => 'glyphicon glyphicon-' . $icon,
            'aria-hidden' => 'true',
        ], true), $title);
    }
}