<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Network_feedbacks_m extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function store($feedback) {
		$this->db->insert('network_feedbacks',
			array('time' => date('Y-m-d H:i:s'), 'content' => $feedback)
		);
	}
}