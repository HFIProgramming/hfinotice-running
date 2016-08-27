<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:投票*/
class Votes extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->model('notification_m');
			$this->load->model('votes_m');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('votes');		
}
		
		/**
		 * 加载所有当前用户可以获取的Votes。
		 *
		 * $data['votes'] 为当前所有对用户开放的投票。
		 * $data['if_remind'] 为true时表示有未读提醒。
		 * $data['reminders'] 为未读提醒。
		 * $data['voted'] 为当前所有的投票。
		 */
		function index() { 
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
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
				
				$data['votes'] = $this->votes_m->get_all_votes();
				$data['voted'] = $this->votes_m->get_all_voted();
				$this->load->view('votes/votes',$data);
			}else {
				$this->load->view('unlogged/votes');  //未登录Votes页面
			}
		}
		
		/**
		 * 根据用户是否投票等信息加载投票内的相应内容。
		 *
		 * $data['if_remind'] 为true时表示有未读提醒。
		 * $data['reminders'] 为未读提醒。
		 * $data['vote_content'] 为当前投票的内容，包涵标题，简介等。
		 * $data['option'] 为当前所有的投票的所有可选项
		 * $data['vote_id'] 为当前所有的投票的id。
		 * $data['vote_title'] 为当前投票的标题。
		 */
		function detail(){
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			//查看投票的先决条件为用户必须已登陆
			if ($this->session->userdata('logged')) {
				if ($this->session->userdata('email')=='')
					redirect('setup');
				$voteid = $this->uri->segment(3);
				//判断投票是否开放并且用户是否已经投票
				if ($this->votes_m->if_vote_open($voteid) == true && $this->votes_m->if_has_vote($voteid) == false){
					$reminders = $this->notification_m->get_reminders();
					if (count($reminders[0]) > 0) {
						$data['if_remind'] = true;
						$data['reminders'] = $reminders;
					}else {
						$data['if_remind'] = false;
					}
					
					
					$current_vote = $this->votes_m->get_current_vote($voteid);
					$data['vote_content'] = $current_vote;
					$data['option'] = $this->votes_m->get_current_options($voteid);
					$data['vote_id'] = $voteid;
					$data['vote_title'] = $this->votes_m->get_current_title($current_vote);
					
					//判断当前投票的形式，目前投票有三种形式，open(开放式), protected(到期之前没有结果), 以及doublelock(双选数据采集)
					$current_vote_type = '';
					foreach($current_vote->result() as $row){
						$current_vote_type = $row->votetype;
					}   //获取vote的形式
					
					//根据不同的种类的投票加载视图
					if ($current_vote_type == 'doublelock')
						$this->load->view('votes/multivotepage',$data);
					else
						$this->load->view('votes/votepage',$data);
				}
				else{
					$reminders = $this->notification_m->get_reminders();
					if (count($reminders[0]) > 0) {
						$data['if_remind'] = true;
						$data['reminders'] = $reminders;
					}else {
						$data['if_remind'] = false;
					}
					
					$current_vote = $this->votes_m->get_current_vote($voteid);
					$data['vote_content'] = $current_vote;
					$data['option'] = $this->votes_m->get_current_options($voteid);
					$data['vote_title'] = $this->votes_m->get_current_title($current_vote);
					
					$current_vote_type = '';
					foreach($current_vote->result() as $row){
						$current_vote_type = $row->votetype;
					}   //获取vote的形式
					
					if ($current_vote_type == 'open' || $this->session->userdata('level') == 1){
						$this->load->view('votes/resultpage',$data);
					}
					else if ($current_vote_type == 'protected'){
						if ($this->votes_m->if_vote_open($voteid) == true) {
							$this->load->view('votes/protected_resultpage',$data);
						}
						else {
							$this->load->view('votes/resultpage',$data);
						}
					}
					else if ($current_vote_type == 'doublelock'){
						$this->load->view('votes/protected_resultpage',$data);
					}
					else
						redirect('votes');
				}
			}
			else{
				redirect('votes');
			}
		}
		
		/**
		 * 单选投票：将用户的投票结果上传并记录。
		 */
		function do_votes(){
			$choice_id = $this->input->post('choice');
			$vote_id = $this->input->post('voteid');
			$username = $this->session->userdata('username');
			
			//要求用户必须已经登陆，尚未投票，并且不投空票
			if($username != '' && $this->votes_m->if_has_vote($vote_id) == false && $choice_id != ''){
				$this->votes_m->upload_votes($username,$vote_id,$choice_id);
			}
			
			redirect('votes/detail/'.$vote_id);
		}
		
		/**
		 * 双选投票：将用户的双选投票结果上传并记录
		 */
		function do_2_votes(){
			$choice_id1 = $this->input->post('choice1');
			$choice_id2 = $this->input->post('choice2');
			$vote_id = $this->input->post('voteid');
			$username = $this->session->userdata('username');
			
			if($username != '' && $this->votes_m->if_has_vote($vote_id) == false && $choice_id1 != '' && $choice_id2 != ''){
				$this->votes_m->upload_votes($username,$vote_id,$choice_id1);
				$this->votes_m->upload_votes($username,$vote_id,$choice_id2);
			}
			
			redirect('votes/detail/'.$vote_id);
		}
}