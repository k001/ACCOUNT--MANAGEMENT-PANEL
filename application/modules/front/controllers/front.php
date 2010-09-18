<?php 
if (! defined('BASEPATH')) exit('No direct script access');

class front extends MasterController {

	private $data = array();
	
	function __construct()
	{
		($this->tank_auth->is_logged_in()?true:redirect('/users/'));
		parent::__construct();
		$this->data = $this->conf_model->get_version();
		$this->output->enable_profiler(true);
	}

	function index()
	{
		$this->template->add_css('assets/css/block-lists.css');
		$this->template->add_css('assets/css/simple-lists.css');
//		$this->template->write_view('content', 'front_view', $this->data);
		$this->template->render();
	}

}