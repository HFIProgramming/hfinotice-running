<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:文件功能*/
class Files extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->model('files_m');
			$this->load->model('notification_m'); //used for reminders
		}
		
		
		/**
		* 加载特定$common的$limit条通知 新文件通知
		* 加载最近上传的文件
		*
		* $data['files']为上传的文件序号。
		* $data['error']为文件为误。
		* $data['sections']为获取已有的文件列表。
		* $data['default_section']为赋值为Common。
		* $data['default_section_id']为读取身份，调用common函数。
		* $data['if_remind']为'ture'时为未读提醒。
		* $data['reminders']表示未读提醒。
		* $data['all']为'all'时需要加载所有文件。
		*/
		private function load_recent($common,$limit){
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			if ($this->session->userdata('logged')) { //验证是否登陆
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$data['files'] = $this->files_m->get_files($limit);
				$data['error'] = '';
				if ($limit == NULL)
					$data['all'] = 'all';
				else
					$data['all'] = '';
				$data['sections'] = $this->files_m->get_folders();
				$data['default_section'] = 'Common';
				$data['default_section_id'] = $common;
				
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				
				$this->load->view('files/files',$data);
			}
			else {
				$data['files'] = $this->files_m->get_files($limit);
				if ($limit == NULL)
					$data['all'] = 'all';
				else
					$data['all'] = '';
				$this->load->view('unlogged/files',$data);  //未登录文件页面
			}
		}
		
		/**验证登陆，跳转文件主页   the value of the common folder should be checked carefully*/
		function index() { 
			$this->load_recent('13',30);
		}

		/**获取全部文件页面*/
		function get_all() { 
			$this->load_recent('13',NULL);
		}
		
		/**
		* 文件夹页面展示
		* $data['sections']为获取已有的文件列表。
		* $data['error']为错误信息，默认为空。
		* $data['default_section']赋值为'Common'
		* $data['default_section_id']调取用户ID,调用common函数。
		* $data['if_remind']为'ture'时为未读提醒。
		* $data['reminders']为未读消息。
		*
		*/
		function sections() {
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$common = '13'; //Check this value carefully
			if ($this->session->userdata('logged')) { //验证是否登陆
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$data['sections'] = $this->files_m->get_folders();
				$data['error'] = '';
				$data['default_section'] = 'Common';
				$data['default_section_id'] = $common;
				$reminders=$this->notification_m->get_reminders();
				if(count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}else {
					$data['if_remind'] = false;
				}
				$this->load->view('files/sections',$data);
			}
			else{
				$data['sections']=$this->files_m->get_folders();
				$this->load->view('unlogged/files_sections',$data);  //未登录页面
			}
		}

		/**
		*文件夹内部页面
		*
		*$data['sections']为获取所有文件名。
		*$data['foldername']为获取文件名。
		*$data['default_section']为赋值为'Common'
		*$data['default_section_id']为调用用户id，common函数。
		*$data['files']为获取上传文件序号。
		*$data['error']显示错误信息。
		*$data['if_remind']为'ture'时显示未读提醒。
		*$data['reminders']表示未读提醒。
		*/
		function folder() {
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$common = '13'; //Check this value carefully
			if ($this->session->userdata('logged')) { //验证是否登陆
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$folder_id = $this->uri->segment(3);
				$foldername = $this->files_m->get_folder_name($folder_id);
				$data['sections'] = $this->files_m->get_folders();
				$data['foldername'] = $foldername;
				if ($folder_id == 1 || $folder_id == 2 || $folder_id == 3){ //预留三个文件夹的位置给特殊权限文件夹
					$data['default_section'] = 'Common';
					$data['default_section_id'] = $common;
				}
				else{
					$data['default_section'] = $foldername;
					$data['default_section_id'] = $folder_id;
				}
				$data['files'] = $this->files_m->get_folder_files($folder_id);
				$data['error'] = '';
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				$this->load->view('files/folderpage',$data);
			}
			else{
				$folder_id = $this->uri->segment(3);
				$data['foldername'] = $this->files_m->get_folder_name($folder_id);
				$data['files'] = $this->files_m->get_folder_files($folder_id);
				$this->load->view('unlogged/files_folderpage',$data);  //未登录主页
			}
		}
		
/**
		*文件上传
		*
		* $data['files']为获取文件序号，最大限度为30.
		* $data['all']为' '时显示已显示完所有文件。
		* $data['error']为函数display_error的返回值（错误参数）。
		*
		*/
		function file_upload() {
			$config['upload_path'] = 'file';
			$config['allowed_types'] = '*';
			$config['max_size'] = '10240';
			
			$author = $this->session->userdata('username');
			$bighead = $this->session->userdata('bighead');
			$back_link = $this->input->post('uri');
			$folderid = $this->input->post('folderid');
			$foldername = $this->input->post('foldername');
			 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload()) {
				$data['files'] = $this->files_m->get_files(30);
				$data['all'] = '';
		   		$data['error'] = $this->upload->display_errors();
				$data['default_section'] = $foldername;
				$data['default_section_id'] = $folderid;
				$data['sections'] = $this->files_m->get_folders();
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
		   		$this->load->view('files/files', $data);
		  	} 
		  	else {
		   		$data = $this->upload->data();
		   		$data = $this->upload->data();
				$link = '0';
				foreach ($data as $item => $value) {
                    if ($item == 'file_url') {
						$link = $value;
                        break;
                    }
				}
				$name = $this->input->post('filename');
				date_default_timezone_set('Etc/GMT-8');
				$date = date('G:i Y/n/j');
	
				if ($this->session->userdata('class') != '') {
					$class = strtoupper(substr($this->session->userdata('class'),0,3)).'.';
				}
				else {
					$class = '';
				}
			   
				$this->files_m->upload_file($link,$name,$author,$bighead,$date,$folderid,$foldername,$class);
				
			   
				redirect($back_link);
		  }
	}

/**文件删除*/
	function file_delete() {
			$id = $this->uri->segment(3);
			$section = $this->uri->segment(4);
			if($this->session->userdata('logged'))
				$this->files_m->delete_file($id,$section);
			redirect('usersetting/myfiles');
		}
}