<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:作业*/
class Homework_Cancelled extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('homework_m');
			$this->load->model('notification_m'); //used for reminders
		}

		/**验证登陆，跳转作业主页或班级*/
		
		function index() { 
			if($this->session->userdata('logged')) { //验证是否登陆
				$classname = $this->session->userdata('class');
				if ($classname == 'douglass') {redirect ('homework/class2');}
				else if ($classname == 'morrison') {redirect ('homework/class3');}
				else if ($classname == 'sotomayor') {redirect ('homework/class4');}
				else {
					redirect('homework/class1');
				}
			}
			else {
				$data['homework'] = $this->homework_m->getclass1();
				$this->load->view('unlogged/homework',$data);  
			}
		}

		/**班1作业*/
		function class1() { 
			if ($this->session->userdata('logged')) { //验证是否登陆
				$data['homework'] = $this->homework_m->getclass1();
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				$this->load->view('homework/class1',$data);
			}
			else {
			$data['homework'] = $this->homework_m->getclass1();
			$this->load->view('unlogged/homework',$data);  
			}
		}
		
		/**班2作业*/
		function class2() { 
			if ($this->session->userdata('logged')) { //验证是否登陆
				$data['homework'] = $this->homework_m->getclass2();
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				$this->load->view('homework/class2',$data);
			}
			else {
			$data['homework'] = $this->homework_m->getclass2();
			$this->load->view('unlogged/homework_class2',$data);  
			}
		}
		
		/**班3作业*/
		function class3() { 
			if ($this->session->userdata('logged')) { //验证是否登陆
				$data['homework'] = $this->homework_m->getclass3();
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				$this->load->view('homework/class3',$data);
			}
			else {
			$data['homework'] = $this->homework_m->getclass3();
			$this->load->view('unlogged/homework_class3',$data);  
			}
		}
		
		/**班4作业*/
		function class4() { 
			if ($this->session->userdata('logged')) { //验证是否登陆
				$data['homework'] = $this->homework_m->getclass4();
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}
				else {
					$data['if_remind'] = false;
				}
				$this->load->view('homework/class4',$data);
			}
			else {
			$data['homework'] = $this->homework_m->getclass4();
			$this->load->view('unlogged/homework_class4',$data);  
			}
		}
		
		/**前方高能，一大群ajax接口，用于获取全部作业*/
		function getclass3all() {
			$trans = $this->homework_m->getclass3all();
			echo $trans;
		}
		
		function getclass1all() {
			$trans = $this->homework_m->getclass1all();
			echo $trans;
		}
		
		function getclass2all() {
			$trans = $this->homework_m->getclass2all();
			echo $trans;
		}
		
		function getclass4all() {
			$trans = $this->homework_m->getclass4all();
			echo $trans;
		}
		

		/**作业发送*/
		function hw_post() {
			$content = $this->input->post('hw_content');
			$class_o = $this->input->post('class');
			$class = '';
			switch($class_o) {
				case 'class1': $class = 'baldwin'; break;
				case 'class2': $class = 'douglass'; break;
				case 'class3': $class = 'morrison'; break;
				case 'class4': $class = 'sotomayor'; break;
			}
			$date = date("d F Y");
			$day = date("l");
			if ($content != '') {
				$this->homework_m->hw_post($date,$content,$class,$day);
			}
			if ($class_o == 'class1')
				redirect('homework/class1');
			else if ($class_o == "class2")
				redirect('homework/class2');
			else if ($class_o == "class3")
				redirect('homework/class3');
			else
				redirect('homework/class4');
			
		}
		
		/**获取编辑内容，ajax接口(未按照mvc操作)*/
		function get_edit_content() {
			$id = $this->input->post('id');
			$this->db->where('id',$id);
			$data = $this->db->get('homework');
			foreach ($data->result() as $row) {
				echo $row->homework;
			}
		}
		
		/**作业编辑上传*/
		function hw_edit() {
			$content = $this->input->post('hw_content');
			$id = $this->input->post('id');
			$class = $this->input->post('class');
			if ($content != '') {
				$this->homework_m->hw_edit($id,$content);
			}
			if ($class == 'class1')
				redirect('homework/class1');
			else if ($class == "class2")
				redirect('homework/class2');
			else if ($class == "class3")
				redirect('homework/class3');
			else
				redirect('homework/class4');
			
		}

		/**作业删除*/
		function deletehw() {
			$id = $this->uri->segment(3);
			$class = $this->uri->segment(4);
			$this->homework_m->deletehw($id);
			if ($class == 'class1')
				redirect('homework/class1');
			else if ($class == "class2")
				redirect('homework/class2');
			else if ($class == "class3")
				redirect('homework/class3');
			else
				redirect('homework/class4');
		}
}