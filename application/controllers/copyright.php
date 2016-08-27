<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:站内信息，版权*/
class Copyright extends CI_Controller {
		function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
		}

		/**
		 * 报告Bug页。
		 */
		function bugreport() {
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->load->view('copyright/bugreport');
		}

		/**
		 * 上传Bug。
		 *
		 * $data['content']为Bug的内容。
		 */
		function bugreport_post() {
			$content = $this->input->post('content');
			if ($content != ''){
				$data = array('content' => $content);
				$this->db->insert('bug', $data);
			}
			redirect('notification');
		}

		/**
		 * “关于我们”页
		 */
		function aboutus() {
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->load->view('copyright/aboutus');
		}

		/**
		 * 常见问题页。
		 */
		function faq() {
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->load->view('copyright/faq');
		}
}