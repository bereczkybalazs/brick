<?php

namespace Core;

use Progsmile\Validator\Validator;

class Request
{
    protected $variables;
    protected $rules = [];

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

    protected function authenticate()
    {
        return true;
    }

    public function validate()
    {
        $this->authorizeRequest();
        $this->validateRequest();
    }

    protected function validateRequest()
    {
        $validator = Validator::make(
            toArray($this->variables),
            $this->rules
        );
        if ($validator->fails()) {
            new JsonError(406, 'Invalid request', $validator->firsts());
        }
    }

    protected function authorizeRequest()
    {
        if (!$this->authenticate()) {
            new JsonError(401, "Unauthorized request");
        }
    }
}