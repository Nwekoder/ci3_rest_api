<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CST_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        header("Content-Type: application/json");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

        if ($this->check_method('OPTIONS')) {
            header("Access-Control-Allow-Headers: Authorization, Content-Type");
            exit(0);
        }
    }

    protected function check_method($method)
    {
        return $this->input->method(true) == $method;
    }

    protected function check_methods($methods)
    {
        return in_array($this->input->method(true), $methods);
    }

    protected function response($data, $status_code = HTTP_OK)
    {
        $this->output
            ->set_status_header($status_code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    protected function request_body($associative = FALSE) {
        $body = json_decode(file_get_contents('php://input'), true);
        
        if($associative) {
            return $body;
        }
        
        return (object)$body;
    }
}
