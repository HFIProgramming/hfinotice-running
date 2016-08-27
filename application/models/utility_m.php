<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:小工具*/
class Utility_m extends CI_Model  {
		
		/**
		 * 从数据库加载对应用户的powerschool帐号
		 *
		 * @return String
		 */
		function load_ps_account($username){
			$this->db->select('poweruser');
			$this->db->where('username',$username);
			$data = $this->db->get('userinfo');
			foreach($data -> result() as $row){
				return $row->poweruser;
			}
		}
}