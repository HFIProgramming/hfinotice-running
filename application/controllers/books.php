<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
		/**跳转主页*/
        function index() {
			$this->load->helper('url');
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->db->order_by('id','desc');
			$data['info'] = $this->db->get('books');
			$this->load->view('books/books',$data);
        }
		
		function page(){
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$index = $this->uri->segment(3);
			$this->db->where('id',$index);
			$data['info'] = $this->db->get('books');
			$this->load->view('books/display',$data);
		}
		function submit(){
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$data = array(
				'title' => $title,
				'content' => $content
			);
			$this->db->insert('books',$data);
			redirect('books');
		}
		function post(){
			$data['verify'] = $this->GetRandStr(4);
			$this->load->view("books/sellbook",$data);
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