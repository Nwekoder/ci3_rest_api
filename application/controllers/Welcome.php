<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CST_Controller {
	public function index()
	{
		$this->response([
			'message' => 'Welcome CI3 REST API Server!'
		]);
	}
}
