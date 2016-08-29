<?php namespace Backend\Libraries\Menu\Items;

use \Phalcon\Mvc\User\Component;

class Item extends Component implements ItemInterface
{
    private $title = '';
    private $link = '';

    private $router = null;
    private $dispatcher = null;

    public function __construct($title, $link = '')
    {
        $this->title = $title;
        $this->link = $link;

        $this->setRouter();
        $this->setDispatcher();
    }

    private function setRouter()
    {
        $this->router = $this->getDi()->get('router');
    }

    private function setDispatcher()
    {
        $this->dispatcher = $this->getDi()->get('dispatcher');
    }

    public function isActive()
    {
        return $this->router->getRewriteUri() ==  $this->getDi()->get('url')->get($this->link);
    }

    public function isAllow()
    {
        return true;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getLink()
    {
        return $this->link;
    }
}