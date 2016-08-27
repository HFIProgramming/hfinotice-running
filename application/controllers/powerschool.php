<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:Powerschool 控制器*/
class Powerschool extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('notification_m');
			$this->load->model('utility_m');
			$this->load->helper('url');
			$this->load->helper('form');
    	}	
		
		/**
		 * 首页。
		 *
		 * 加载powerschool界面。
		 */
		function index() { 
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->load->model('notification_m');
			if ($this->session->userdata('logged')) { //验证是否登陆
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$reminders = $this->notification_m->get_reminders();
				if (count($reminders[0]) > 0) {
					$data['if_remind'] = true;
					$data['reminders'] = $reminders;
				}else {
					$data['if_remind'] = false;
				}
				
				$username = $this->session->userdata('username');
				$data['account'] = $this->utility_m->load_ps_account($username);
				$this->load->view("powerschool/powerschool",$data);
			}else {
				$this->load->view("unlogged/powerschool");
			}
		}
}