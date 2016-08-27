<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keyword_m extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert($keyword) {
		$this->db->insert('keyword', compact('keyword'));
	}

	function get_all() {
		return $this->db->get('keyword');
	}
	
	function isKeyword($keyword) {
		$this->db->select('keyword');
		$this->db->where('keyword', $keyword);
		return $this->db->get('keyword');
	}
}
