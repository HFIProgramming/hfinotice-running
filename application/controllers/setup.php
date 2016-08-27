<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:初次登陆设置*/
class Setup extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('usersetting_m');
	}
		/**跳转第一页*/
		function index() { 
			if ($this->session->userdata('username') != '')
				$this->load->view('usersetting/first_log_guide_1');
			else
				redirect('notification');
		}
		
		/**
		*改密码并跳转第二页
		*/
		function password_reset() {
				$username = $this->session->userdata('username');
				$password = $this->input->post('password');
				if ($username != '' && $password != '')  {
					$this->usersetting_m->change_password($username,$password);
					$this->load->view('usersetting/first_log_guide_2');
				}
				else {
					$this->load->view('usersetting/first_log_guide_1');
				}
		}
		
		
		/**
		* 改邮箱并跳转第三页
		*
		* $data['error']为错误返回参数，默认为空
		*
		*/
		function email_reset() {
			$username = $this->session->userdata('username');
			$email = $this->input->post('email');
			if ($username != '' && $email != '')  {
				$this->usersetting_m->change_email($username,$email);
				$data['error'] = '';
				$this->load->view('usersetting/first_log_guide_3',$data);
			}
			else {
				$this->load->view('usersetting/first_log_guide_2');
			}
		}
		
		
		/**
		* 改头像
		*
		* $data['error']为函数display_errors的返回参数（错误参数）
		*
		*/
		function avatar_reset() {
			$config['upload_path'] = 'bighead';
			$config['allowed_types'] = 'png|jpg|bmp';
			$config['max_size'] = '1024';
			 
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload()) {
					$data['error'] = $this->upload->display_errors();
					$this->load->view('usersetting/first_log_guide_3', $data);
				} 
				else {
					$data = $this->upload->data();
					$i = '0';
				foreach ($data as $item => $value) {
				   if ($item == 'file_url')
						$i = $value;
			   }
				 $link = $i;

			    if ($link != '') {
					$this->usersetting_m->upload_avatar($link);
					$this->load->view('usersetting/first_log_guide_4');
				}
				else {
					$this->load->view('usersetting/first_log_guide_3');
				}
			   
				
			  }
		}
		
		/**跳过改头像页面*/
		function skip() {
			$this->load->view('usersetting/first_log_guide_4');
		}
}