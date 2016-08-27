<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:默认控制器，可进行其他编辑*/
//注：Default Controller已被notification取代，若需调用此控制器，请修改application/config/routes.php

class Welcome extends CI_Controller {
		/**跳转主页*/
        function index() {
			$this->load->helper('url');
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			redirect("notification");
        }
		
		function programmingclub(){
			$this->load->view('copyright/programmingclub');
		}
		function programmingclubsubmit(){
			$username=$this->session->userdata('username');
			$class=$this->session->userdata('class');
			$wechat=$this->input->post('wechat');
			$ename=$this->input->post('ename');

			if($wechat != '' && $ename != ''){
				$data=array(
						'cname' => $username,
						'class' => $class,
						'wechat' => $wechat,
						'ename' => $ename
					);
				$this->db->insert('programmingclub',$data);
				$this->load->view('copyright/programmingclubsuccess');
			}else{
				echo '出错了！请再次申请。';
			}
		}
		
}