<?php

namespace Core;

class Request
{
    protected $variables;
    protected $rules = ['test'];

    public function __construct($variables)
    {
        $this->variables = $variables;
    }

    protected function authenticate()
    {
        return true;
    }

    public function validate()
    {
        $error = new \stdClass();
        if(!$this->authenticate()) {
            $error->code = 401;
            $error->message = "Unauthorized request";
            $this->makeError($error);
        }
    }

    public function get($name)
    {
        return $this->variables->{$name};
    }

    public function all()
    {
        return $this->variables;
    }

    protected function makeError($error)
    {
        header('Content-Type: application/json');
        echo json_encode($error);
        exit;
    }
}