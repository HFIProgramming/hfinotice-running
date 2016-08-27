<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:登陆验证，登出验证，用户名存在验证*/
class Login extends CI_Model  {
		function __construct() {
			parent::__construct();
			$this->load->library('session');
		}
		/**验证用户名存在*/
		function username_exist($username) {
			if ($this->db->get_where('userinfo',array('username' => $username))->num_rows() == 1) {
				return true;
			}else {
				return false;
			}
		}
		
		/**验证密码是否正确，并把信息加入session*/
		function verify($username,$password) {
			if ($this->db->get_where('userinfo',array('username' => $username))->num_rows() == 1) {
				$this->db->where('username',$username);
				$data = $this->db->get('userinfo');
				$password_compare = '';
				$bighead = '';
				$email = '';
				$class = '';
				$level = '';
				$username1 = '';
				foreach ($data->result() as $row) {
					$username1 = $row->username;
					$password_compare = $row->password;
					$bighead = $row->bighead;
					$email = $row->email;
					$class = $row->class;
					$level = $row->level;
					
				}
				if ($password == $password_compare) {
					$userinfo = array(
						'username' => $username1,
						'bighead' => $bighead,
						'email' => $email,
						'class' => $class,
						'level' => $level,
						'logged' => true
					);
					$this->session->set_userdata($userinfo);
					return true;
				}
				else {
					return false;
				}
			}
			else
				return false;
		}
		
		/**验证用户输入的邮箱是否配对该用户名*/
		function reset_verify($username,$email) {
			if ($this->db->get_where('userinfo',array('username' => $username))->num_rows() == 1&&$email!='') {
				$this->db->where('username',$username);
				$email_db = '';
				$data = $this->db->get('userinfo');
				foreach($data->result() as $row) {
					$email_db = $row->email;
				}
				if ($email == $email_db)
					return true;
				else
					return false;
				
			}
			else
				return false;
		}
		
		/**执行密码重置*/
		function do_reset($username,$password) {
			$data = array('password' => $password);
			$this->db->where('username',$username);
			$this->db->update('userinfo',$data);
		}
}