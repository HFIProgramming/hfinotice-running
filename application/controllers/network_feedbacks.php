<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Network_feedbacks extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('network_feedbacks_m');
	}

	public function index() {
		secondary_site_redirect($this->uri->segment(1), $this->uri->segment(2), $this->uri->segment(3), base_url());
		$data['verify'] = $this->GetRandStr(4);
		$this->load->view("feedback/ntwkfeedback",$data);
	}

	public function store() {
		$feedback = $this->input->post('text');
		$this->network_feedbacks_m->store($feedback);
		redirect('network_feedbacks');
	}
	
	private function GetRandStr($len) 
		{ 
			$chars = array( 
				"0", "1", "2",  
				"3", "4", "5", "6", "7", "8", "9" 
			); 
			$charsLen = count($chars) - 1; 
			shuffle($chars);   
			$output = ""; 
			for ($i=0; $i<$len; $i++) 
			{ 
				$output .= $chars[mt_rand(0, $charsLen)]; 
			}  
			return $output;  
		} 
}