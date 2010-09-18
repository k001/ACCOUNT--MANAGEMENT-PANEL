<?php if (! defined('BASEPATH')) exit('No direct script access');

class users extends Controller {

	private $data = array();
	private $username;
	private $password;

	function __construct()
	{
		parent::__construct();
		$this->template->set_template('template_login');
	}
	
	function index()
	{		
		redirect('/users/login');
	}
	
	/**
	 * Login users
	 * @access public
	 * @author Ivan A. Zenteno A. <ivan.zenteno@infapen.com>
	 * @return void
	 */
	function login()
	{
		if ($this->tank_auth->is_logged_in()) redirect('/front/');
		elseif ($this->tank_auth->is_logged_in(FALSE)) 	redirect('/users/send_again/');
		else
		{
			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND $this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');

			$this->form_validation->set_rules('login', 'lang:email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('pass', 'lang:password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('keep_logged', 'lang:keep-me-logged-in', 'integer');

			if ($this->config->item('login_count_attempts', 'tank_auth') AND ($login = $this->input->post('login')))
			{
				$login = $this->input->xss_clean($login);
			}
			else
			{
				$login = '';
			}
		}
		$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
		if ($ajax)
		{
			$data['errors'] = array();
			if ($this->form_validation->run($this))
			{
				if ($this->tank_auth->login(
						$this->form_validation->set_value('login'),
						$this->form_validation->set_value('pass'),
						$this->form_validation->set_value('remember'),
						$data['login_by_username'],
						$data['login_by_email']))
				{
					$this->data['ajax'] = json_encode(array(
						'valid' => true,
						'redirect' => '/front/'
					));
				}
				else
				{
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned']))
					{
						$this->data['ajax'] = $this->lang->line('auth_message_banned').' '.$errors['banned'];
						$this->load->view('ajax',$this->data['ajax']);
					}
					elseif (isset($errors['not_activated']))
					{
						redirect('/users/send_again/');
					}
					else
					{
						foreach ($errors as $k => $v)
							$this->data['errors'][$k] = $this->lang->line($v);
					}
					$this->data['ajax'] = json_encode(array(
						'valid' => false,
						'error' => $this->data['errors']
					));
				}
			}
			else
			{
				$this->data['ajax'] = json_encode(array(
					'valid' => false,
					'error' => validation_errors()
				));
			}
			$this->load->view('ajax', $this->data);				
		}		
		else
		{
			$this->data['login']=true;
			$this->template->add_js('assets/js/login.js');
			$this->template->add_css('assets/css/special-pages.css');
			$this->template->write_view('content','login_view', $this->data);
			$this->template->render();			
		}		
	}


	/**
	 * Logout user
	 *
	 * @return void
	 */
	function logout()
	{
		($this->tank_auth->is_logged_in()? true: redirect('/users/'));
		$this->tank_auth->logout();
		$this->data['login']=true;
		$this->data['message'] = $this->lang->line('auth_message_logged_out');
		$this->template->add_js('assets/js/login.js');
		$this->template->add_css('assets/css/special-pages.css');
		$this->template->write_view('content','login_view', $this->data);
		$this->template->render();
	}

}