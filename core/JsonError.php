<?php

namespace Core;

use stdClass;

class JsonError
{
    private $code;
    private $message;
    private $error;

    public function __construct($code, $message, $error = [])
    {
        $this->code = $code;
        $this->message = $message;
        $this->error = $error;
        $this->execute();
    }

    public function execute()
    {
        header('HTTP/1.0 ' . $this->code);
        header('Content-Type: application/json');
        echo json_encode($this->getErrorContent());
        exit;
    }

    private function getErrorContent()
    {
        $response = new stdClass();
        $response->code = $this->code;
        $response->message = $this->message;
        if (!empty($this->error)) {
            $response->error = $this->error;
        }
        return $response;
    }
}