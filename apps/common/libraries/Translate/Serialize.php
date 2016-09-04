<?php namespace Common\Libraries\Translate;

use \Phalcon\Translate\Adapter,
    \Phalcon\Translate\AdapterInterface,
    \Phalcon\Translate\Exception;

class Serialize extends Adapter implements AdapterInterface
{
    private $data = [];
    private $path = '';
    private $lang = '';

    public function __construct(array $options)
    {
        parent::__construct($options);

        if (!isset($options['path'])) {
            throw new Exception('Path option is required');
        }

        if (!isset($options['lang'])) {
            throw new Exception('Lang option is required');
        }

        $this->path = $options['path'];
        $this->lang = $options['lang'];

        $this->load();
    }

    public function save($data)
    {
        file_put_contents($this->file(), serialize($data));
        $this->data = $data;
    }

    private function load()
    {
        if (!file_exists($this->file())) {
            throw new Exception('Translate file does not exist');
        }

        $this->data = unserialize(file_get_contents($this->file()));
    }

    private function file()
    {
        return $this->path . $this->lang . '.data';
    }

    public function query($index, $placeholders = null)
    {
        if ($this->exists($index)) {
            return $this->replacePlaceholders($this->data[$index], $placeholders);
        }

        return $index;
    }

    public function exists($index)
    {
        return isset($this->data[$index]) && $this->data[$index];
    }
}