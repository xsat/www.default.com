<?php namespace Common;

class Application extends \Phalcon\Mvc\Application
{
    private $dir;

    public function __construct()
    {
        $this->dir = __DIR__;
        $this->setServices();
    }

    private function setServices()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces([
            'Common' => $this->dir  . '/../components/',
            'Common\Controllers' => $this->dir  . '/../controllers/',
            'Common\Models' => $this->dir  . '/../models/',
            'Common\Plugins' => $this->dir  . '/../plugins/',
        ]);
        $loader->register();

        $config = new \Common\Config();
        $di = new \Phalcon\DI\FactoryDefault();
        $di->set('router', new \Common\Router());
        $di->set('url', new \Phalcon\Mvc\Url());
        $di->set('db', new \Phalcon\Db\Adapter\Pdo\Mysql([
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->name
        ]));
        $di->set('session', function() {
            $session = new \Phalcon\Session\Adapter\Files();
            $session->start();
            return $session;
        });
        $di->set('modelsMetadata', new \Phalcon\Mvc\Model\Metadata\Files([
            'metaDataDir' => $this->dir . '/../cache/models/'
        ]));

        $this->setDI($di);

        $this->registerModules([
            'frontend' => [
                'className' => 'Frontend\Module',
                'path' => '../apps/frontend/components/Module.php'
            ],
            'backend' => [
                'className' => 'Backend\Module',
                'path' => '../apps/backend/components/Module.php'
            ],
        ]);
    }

    public function getCompressedContent()
    {
        $search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/>(\s)+</', '/\n/', '/\r/', '/\t/'];
        $replace = ['>', '<', '\\1', '><', '', '', ''];

        return preg_replace($search, $replace, $this->handle()->getContent());
    }
}