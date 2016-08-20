<?php namespace Common;

use \Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    protected $dir;
    protected $prefix;
    protected $di;

    public function __construct()
    {
        $this->initModule();
    }

    protected function initModule()
    {
        $this->dir = __DIR__;
        $this->prefix = 'Common';
    }

    public function registerAutoloaders(\Phalcon\DiInterface $dependencyInjector = null)
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces([
            $this->prefix . '\Controllers' => $this->dir . '/../controllers/',
            $this->prefix . '\Models' => $this->dir . '/../models/',
            $this->prefix . '\Forms' => $this->dir . '/../forms/',
            $this->prefix . '\Plugins' => $this->dir . '/../plugins/',
            $this->prefix . '\Libraries' => $this->dir . '/../libraries/',
        ]);
        $loader->register();
    }

    public function registerServices(\Phalcon\DiInterface $dependencyInjector)
    {
        $this->di = $dependencyInjector;
        $this->di->set('dispatcher',$this->setDispatcher());
        $this->di->set('view', $this->setView(), true);
        $this->di->set('modelsMetadata', $this->setModelsMetadata());
    }

    private function setDispatcher()
    {
        $dispatcher = new \Phalcon\Mvc\Dispatcher();
        $dispatcher->setDefaultNamespace($this->prefix .  '\Controllers');
        $eventsManager = new \Phalcon\Events\Manager();
        $eventsManager->attach('dispatch:beforeExecuteRoute', new Plugins\Authorization\Authorization());
        $dispatcher->setEventsManager($eventsManager);
        return $dispatcher;
    }

    private function setView()
    {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir($this->dir . '/../views/');
        $view->setLayoutsDir('layouts/');
        $view->setLayout('main');
        $view->registerEngines([
            '.volt' => $this->setVolt($view),
            '.phtml' => 'Phalcon\Mvc\View\Engine\Php',
        ]);
        return $view;
    }

    private function setVolt(\Phalcon\Mvc\View $view)
    {
        $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $this->di);
        $volt->setOptions([
            'compiledPath' => $this->dir . '/../cache/views/',
            'compiledSeparator' => '_',
        ]);
        return $volt;
    }

    private function setModelsMetadata()
    {
        return new \Phalcon\Mvc\Model\Metadata\Files([
            'metaDataDir' => $this->dir . '/../cache/models/'
        ]);
    }
}
