<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:课程表*/
class Lessons extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('notification_m'); //used for reminders
		}

		/**
		* 验证登陆，跳转班级或课程表主页
		* 
		* $data['if_remind']为未读消息状态，用于判断是否有新消息。类别为布尔值。
		* $data['reminders']为未读消息数量
		* 
		*/
		function index() { 
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			if ($this->session->userdata('logged')) { //验证是否登陆
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$classname = $this->session->userdata('class');
				if ($classname == 'douglass') {redirect ('lessons/class2');}
				else if ($classname == 'morrison') {redirect ('lessons/class3');}
				else if ($classname == 'sotomayor') {redirect ('lessons/class4');}
				else if ($classname == 'stanton' || $classname == 'earhart' || $classname == 'carson' || $classname == 'barton') {redirect ('lessons/junior');}
				else if ($classname == 'copland' || $classname == 'joplin' || $classname == 'williams' || $classname == 'gershwin') {redirect ('lessons/senior');} //根据班别自动跳转版面
				else {
					$reminders = $this->notification_m->get_reminders();
					if (count($reminders[0]) > 0) {
						$data['if_remind'] = true;
						$data['reminders'] = $reminders;
					}
					else {
						$data['if_remind'] = false;
					}
				//$this->load->view('lessons/lessons',$data);
				$this->load->view("ad2015");// 新版课程表暂时未上线  零时跳转
				}
			}
			else {
				//$this->load->view('unlogged/lessons'); 
				$this->load->view("ad2015");// 新版课程表暂时未上线  零时跳转 
			}
		}
		
		/**
		* 课程表的匹配切换过程
		* 
		* $data['if_remind']为未读消息状态，用于判断是否有新消息。类别为布尔值。
		* $data['reminders']为未读消息数量
		* 
		*/
		
		private function go_class($class) {
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->load->view("ad2015");// 新版课程表暂时未上线  零时跳转
			/*
			if ($this->session->userdata('logged')) { //验证是否登陆
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				$view = '';
				switch($class){
					case 'class1': $view = 'lessons/lessons'; break;
					case 'class2': $view = 'lessons/class2'; break;
					case 'class3': $view = 'lessons/class3'; break;
					case 'class4': $view = 'lessons/class4'; break;
					case 'junior': $view = 'lessons/AP'; break;
					case 'senior': $view = 'lessons/AP'; break;
				}
				$this->load->view($view,$data);
			}
			else {
				$view = '';
				switch($class){
					case 'class1': $view = 'unlogged/lessons'; break;
					case 'class2': $view = 'unlogged/lesson_class2'; break;
					case 'class3': $view = 'unlogged/lesson_class3'; break;
					case 'class4': $view = 'unlogged/lesson_class4'; break;
					case 'junior': $view = 'unlogged/lesson_AP'; break;
					case 'senior': $view = 'unlogged/lesson_AP'; break;
				}
				$this->load->view($view);  
			}
			*/
			
		}
		
		/**班级1*/
		function class1() { 
			$this->go_class('class1');
		}
		
		/**班级2*/
		function class2() { 
			$this->go_class('class2');
		}
		
		/**班级3*/
		function class3() { 
			$this->go_class('class3');
		}
		
		/**班级4*/
		function class4() { 
			$this->go_class('class4');
		}

		/**高二年级*/
		function junior() { 
			$this->go_class('junior');
		}

		/**高三年级*/
		function senior() {
			$this->go_class('senior');
		}
}