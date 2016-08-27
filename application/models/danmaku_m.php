<?php

class Danmaku_m extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/**
	 * 发送一条弹幕。
	 *
	 * @param $color string 弹幕颜色
	 * @param $content string 弹幕内容
	 */
	function send($color, $content) {
		$data = array(
			'color' => $color,
			'content' => $content
		);
		$this->db->insert('danmaku', $data);
	}
}