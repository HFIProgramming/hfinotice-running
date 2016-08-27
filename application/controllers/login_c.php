<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:登陆，登出*/

class Login_c extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('login');
			$this->load->model('notification_m');
			$this->load->helper('url');
			$this->load->helper('form');
		}
		
		/**AJAX接口:验证用户名是否存在*/
		function query_username() {
			$username = $this->input->post('username');
			if ($this->login->username_exist($username)) {
				echo 'true';
			}
			else {
				echo 'false';
			}
		}
		
		
		/**登陆，进入登陆主页*/
		function index() { 
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$uri = $this->input->post('uri');
			if ($this->login->verify($username,$password)) {
				redirect($uri);
			}
			else {
				$data['notification'] = $this->notification_m->get_notification('',30);
				$data['reply'] = $this->notification_m->get_all_reply();
				$data['all'] = '';
				$data['origin_uri'] = $uri;
				$this->load->view('unlogged/notification_with_error',$data);
			}
		}
		
		
		/**登出*/
		function logout() { 
			$uri = $this->input->post('uri');
			$userinfo = array(
					'username' => '',
					'bighead' => '',
					'email' => '',
					'class' => '',
					'level' => '',
					'logged' => ''
			);
			$this->session->unset_userdata($userinfo);
			redirect($uri);
		}
		
		/**进入重置密码验证页面*/
		function reset_password_verify() {
			$data['error'] = '';
			$data['notification'] = $this->notification_m->get_notification('',30);
			$data['reply'] = $this->notification_m->get_all_reply();
			$this->load->view('unlogged/notification_password_change_1',$data);
		}
		
		/**验证重置密码并打开执行页面*/
		function do_password_reset() {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			if ($this->login->reset_verify($username,$email)) {
				$data['username'] = $username;
				$data['notification'] = $this->notification_m->get_notification('',30);
				$data['reply'] = $this->notification_m->get_all_reply();
				$this->load->view('unlogged/notification_password_change_2',$data);
			}
			else {
				$data['error'] = 'true';
				$data['notification'] = $this->notification_m->get_notification('',30);
				$data['reply'] = $this->notification_m->get_all_reply();
				$this->load->view('unlogged/notification_password_change_1',$data);
			}
		}
		
		/**进行密码重置*/
		function do_password_reset_2() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($username != '' && $password != '') {
				$this->login->do_reset($username,$password);
			}
			$data['notification'] = $this->notification_m->get_notification('',30);
			$data['reply'] = $this->notification_m->get_all_reply();
			$this->load->view('unlogged/reset_success',$data);
		}
}