<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:用户设置操作*/
class Usersetting_m extends CI_Model  {
		/**更换用户头像，并刷新session信息*/
		function upload_avatar($link) {
			$username = $this->session->userdata('username');
			$data = array(
				'bighead' => $link
			);
			$this->db->where('username',$username);
			$this->db->update('userinfo',$data);
			$this->db->where('username',$username);
			$this->db->update('notification',$data);
			$this->db->where('username',$username);
			$this->db->update('reply',$data);
			$this->db->where('author',$username);
			$this->db->update('files',$data);
			
			$bighead = '';
			$email = '';
			$class = '';
			$level = '';
			$this->db->where('username',$username);
			$new = $this->db->get('userinfo');
			foreach ($new->result() as $row) {
				$bighead = $row->bighead;
				$email = $row->email;
				$class = $row->class;
				$level = $row->level;
			}
			$userinfo = array(
					'username' => $username,
					'bighead' => $bighead,
					'email' => $email,
					'class' => $class,
					'level' => $level,
					'logged' => true
				);
			$this->session->set_userdata($userinfo);
		}
		
		/**获得用户旧密码*/
		function get_old_password($username) {
			$this->db->where('username',$username);
			$data = $this->db->get('userinfo');
			$password = '';
			foreach ($data->result() as $row) {
				$password = $row->password;
			}
			return $password;
		}
		
		/**更改用户密码*/
		function change_password($username,$password) {
			$data = array(
				'password' => $password
			);
			$this->db->where('username',$username);
			$this->db->update('userinfo',$data);
		}
		
		/**更改用户邮箱，并更新session信息*/
		function change_email($username,$email) {
			$data = array(
				'email' => $email
			);
			$this->db->where('username',$username);
			$this->db->update('userinfo',$data);
			
			$bighead = '';
			$email = '';
			$class = '';
			$level = '';
			$this->db->where('username',$username);
			$new = $this->db->get('userinfo');
			foreach ($new->result() as $row) {
				$bighead = $row->bighead;
				$email = $row->email;
				$class = $row->class;
				$level = $row->level;
			}
			$userinfo = array(
					'username' => $username,
					'bighead' => $bighead,
					'email' => $email,
					'class' => $class,
					'level' => $level,
					'logged' => true
				);
			$this->session->set_userdata($userinfo);
		}
}