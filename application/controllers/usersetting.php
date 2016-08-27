<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:用户设置*/
class Usersetting extends CI_Controller  {
	function __construct() {
		parent::__construct();
		$this->load->model('usersetting_m');
		$this->load->model('notification_m');
		$this->load->model('files_m');
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	/**
	* 更换头像流程
	*
	* $data['uri']为上传的新头像的地址
	* $data['error']为错误信息，默认为空
	*
	*/
	function changeavatar() {
		if ($this->session->userdata('logged')) {
			$data['uri'] = $this->input->post('uri');
			$data['error'] = '';
			$this->load->view('usersetting/changeavatar',$data);
		}
		else
			redirect('notification');
	}
	
	/**
	* 新头像上传流程
	*
	* $data['error']为模块uplord中函数display_errors返回（上传过程中的）的错误信息
	* $data['uri']为新头像地址（服务器）
	*
	*/
	function do_avatar_upload() {
		$config['upload_path'] = 'bighead';
		$config['allowed_types'] = 'png|jpg|bmp|jpeg';
		$config['max_size'] = '1024';
		 
		$uri = $this->input->post('uri');
	    $this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()) {
		   		$data['error'] = $this->upload->display_errors();
		   		$data['uri'] = $uri;
		   		$this->load->view('usersetting/changeavatar', $data);
		  	} 
		  	else {
		   		$data = $this->upload->data();
		   		$i = '0';
		   	foreach ($data as $item => $value) {
			   if ($item=='file_url')
					$i = $value;
		   }
		  	 $link = $i;
		   
		   	$this->usersetting_m->upload_avatar($link);
		   
		   	redirect('usersetting/changeavatar');
		  }
	}
	
	/**
	* 我的通知读取流程
	* 
	* $data['notification']为模块notification_m中函数get_user_notification的对应用户的返回数据（通知）
	* $data['reply']为模块noticifation_m中函数get_all_reply返回的信息
	* $data['uri']为（独立）通知地址
	*
	*/
	function mynotification() {
		if ($this->session->userdata('logged')) {
			$data['notification'] = $this->notification_m->get_user_notification($this->session->userdata('username'));
			$data['reply'] = $this->notification_m->get_all_reply();
			$data['uri'] = $this->input->post('uri');
			$this->load->view('usersetting/mynotification',$data);
		}
		else
			redirect('notification');
	}
	
	
	/**
	* 我的文件读取流程
	*
	* $data['files']为模块files_m中函数get_files返回的数据
	* $data['uri']为文件的地址
	*
	*/
	function myfiles() {
		if ($this->session->userdata('logged')) {
			$data['files'] = $this->files_m->get_files();
			$data['uri'] = $this->input->post('uri');
			$this->load->view('usersetting/myfiles',$data);
		}
		else
			redirect('notification');
	}
	
	
	/**
	* 更改密码流程
	*
	* $data['error']为错误信息，默认为空
	* $data['uri']为
	*
	*/
	function changepassword() {
		if ($this->session->userdata('logged')) {
			$data['error'] = '';
			$data['uri'] = $this->input->post('uri');
			$this->load->view('usersetting/changepassword',$data);
		}
		else
			redirect('notification');
	}
	
	
	/**
	* 新密码上传流程
	* 
	* $data['uri']为
	* $data['error']为错误参数，默认为true（密码输错的时候）
	*
	*/
	function do_password_change() {
		$origin_password_input = $this->input->post('origin_password');
		$newpassword = $this->input->post('new_password');
		$newpassword2 = $this->input->post('new_password2');
		$username = $this->session->userdata('username');
		$data['uri'] = $this->input->post('uri');
	
		$origin_password = $this->usersetting_m->get_old_password($username);
		if ($origin_password_input != $origin_password || $newpassword != $newpassword2) {
			$data['error'] = 'true';
			$this->load->view('usersetting/changepassword',$data);
		}
		else {
			if ($username != '' && $newpassword != '')
				$this->usersetting_m->change_password($username,$newpassword);
			redirect('login_c/logout');
		}
	}
	
	
	/**
	* 更改邮箱
	*
	* $data['uri'] 为
	*
	*/
	function changeemail() {
		if ($this->session->userdata('logged')) {
			$data['uri'] = $this->input->post('uri');
			$this->load->view('usersetting/changeemail',$data);
		}
		else
			redirect('notification');
	}
	
	
	/**
	* 新邮箱上传流程
	*
	*/
	function do_email_change() {
		$email = $this->input->post('new_email');
		$username = $this->session->userdata('username');
		if ($username != '' && $email != '')
			$this->usersetting_m->change_email($username,$email);
		redirect('usersetting/changeemail');
	}
	
}