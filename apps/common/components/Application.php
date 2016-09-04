<?php namespace Common;

use \Phalcon\Mvc\Application as PhalconApplication,
    \Phalcon\Loader,
    \Phalcon\DI\FactoryDefault,
    \Phalcon\Mvc\Url,
    \Phalcon\Db\Adapter\Pdo\Mysql,
    \Phalcon\Session\Adapter\Files as SessionFiles,
    \Phalcon\Mvc\Model\Metadata\Files as MetadataFiles,
    \Phalcon\Flash\Session as flashSession;

class Application extends PhalconApplication
{
    private $dir;

    public function __construct()
    {
        $this->dir = __DIR__;
        $this->setServices();
    }

    private function setServices()
    {
        $loader = new Loader();
        $loader->registerNamespaces([
            'Common' => $this->dir  . '/../components/',
            'Frontend' => $this->dir  . '/../../frontend/components/',
            'Backend' => $this->dir  . '/../../backend/components/',
            'Common\Controllers' => $this->dir  . '/../controllers/',
            'Common\Models' => $this->dir  . '/../models/',
            'Common\Plugins' => $this->dir  . '/../plugins/',
            'Common\Libraries' => $this->dir  . '/../libraries/',
        ]);
        $loader->register();

        $config = new Config();
        $di = new FactoryDefault();
        $di->set('config', $config, true);
        $di->set('router', new Router(), true);
        $di->set('url', new Url(), true);
        $di->set('db', new Mysql([
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->name
        ]), true);
        $di->set('session', function() {
            $session = new SessionFiles();
            $session->start();
            return $session;
        }, true);
        $di->set('flashSession', new FlashSession([
            'error' => 'alert alert-danger',
            'notice' => 'alert alert-warning',
            'success' => 'alert alert-success',
            'warning' => 'alert alert-warning',
        ]), true);
        $di->set('modelsMetadata', new MetadataFiles([
            'metaDataDir' => $this->dir . '/../cache/models/'
        ]), true);

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
        $this->setDefaultModule('frontend');
    }

    public function getCompressedContent()
    {
        $search = ['/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/>(\s)+</', '/\n/', '/\r/', '/\t/'];
        $replace = ['>', '<', '\\1', '> <', '', '', ''];

        return preg_replace($search, $replace, $this->handle()->getContent());
    }
}