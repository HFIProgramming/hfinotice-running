<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:PeerBuddy宣传页*/

class Peerbuddy extends CI_Controller {
		/**跳转主页*/
        function index() {
			$this->load->helper('url');
			secondary_site_redirect($this->uri->segment(1),$this->uri->segment(2),$this->uri->segment(3),base_url());
			$this->load->view('copyright/peerbuddy');
        }
}