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

    public function validate()
    {
        echo json_encode($this->rules);
    }

    public function get($name)
    {
        return $this->variables->{$name};
    }

    public function all()
    {
        return $this->variables;
    }
}