<?php

namespace Core;

class Request
{
    protected $variables;

    public function __construct($variables)
    {
        $this->variables = $variables;
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