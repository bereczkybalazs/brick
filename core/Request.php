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
            $error = new \stdClass();
            $error->code = 406;
            $error->message = "Invalid request";
            $error->error = $validator->firsts();
            $this->makeError($error);
        }
    }

    protected function authorizeRequest()
    {
        if (!$this->authenticate()) {
            $error = new \stdClass();
            $error->code = 401;
            $error->message = "Unauthorized request";
            $this->makeError($error);
        }
    }

    protected function makeError($error)
    {
        header('HTTP/1.0 ' . $error->code);
        header('Content-Type: application/json');
        echo json_encode($error);
        exit;
    }
}