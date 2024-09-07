<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CST_Controller {
	public function index()
	{
		$this->response([
			'message' => 'Work in progress :)'
		]);
	}

	public function add_user()
	{
		if(!$this->check_method('POST')) {
			$this->response('This method is not allowed!', HTTP_METHOD_NOT_ALLOWED);
			exit(0);
		}

		$request_body = $this->request_body(true);

		$this->response($request_body, HTTP_ACCEPTED);
	}
}
