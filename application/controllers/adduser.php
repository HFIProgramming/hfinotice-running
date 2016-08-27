<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:添加用户*/
class Adduser extends CI_Controller {

	/**随机生成数字4位密码*/
	function create_password($pw_length) {  
		$randpwd = '';  
		for ($i = 0; $i < $pw_length; $i++)  
		{  
		$randpwd .= mt_rand(1, 9);  
		}  
		return $randpwd;  
	}

	/**创建用户，插入数据库*/
	function create_user($name,$class,$level,$bighead) {
		$password = $this->create_password(4);
		$data = array(
							'username' => $name,
							'password' => $password,
							'class' => $class,
							'level' => $level,
							'bighead' => $bighead
						);
		$this->db->insert('userinfo',$data);
	}
	

	/*
	function index() {
		for ($i=1; $i<=21; $i++) {
			$level = '3';
			$bighead = '../../../images/default.png';
			switch ($i) {
				case 1: $this->create_user('白一彤','carson',$level,$bighead);
				break;
				case 2: $this->create_user('岑伟霖','carson',$level,$bighead);
				break;
				case 3: $this->create_user('戴思婷','earhart',$level,$bighead);
				break;
				case 4: $this->create_user('邓和洎','earhart',$level,$bighead);
				break;
				case 5: $this->create_user('何厚仪','carson',$level,$bighead);
				break;
				case 6: $this->create_user('黄家麒','barton',$level,$bighead);
				break;
				case 7: $this->create_user('兰方怡','stanton',$level,$bighead);
				break;
				case 8: $this->create_user('李泽新','carson',$level,$bighead);
				break;
				case 9: $this->create_user('刘奕杰','barton',$level,$bighead);
				break;
				case 10: $this->create_user('罗旭晴','carson',$level,$bighead);
				break;
				case 11: $this->create_user('罗雅方','earhart',$level,$bighead);
				break;
				case 12: $this->create_user('潘永政','stanton',$level,$bighead);
				break;
				case 13: $this->create_user('区天阅','stanton',$level,$bighead);
				break;
				case 14: $this->create_user('师清扬','stanton',$level,$bighead);
				break;
				case 15: $this->create_user('苏恺晴','earhart',$level,$bighead);
				break;
				case 16: $this->create_user('吴壁君','stanton',$level,$bighead);
				break;
				case 17: $this->create_user('徐沛然','barton',$level,$bighead);
				break;
				case 18: $this->create_user('叶健翔','barton',$level,$bighead);
				break;
				case 19: $this->create_user('叶娴','stanton',$level,$bighead);
				break;
				case 20: $this->create_user('周钰唯','barton',$level,$bighead);
				break;
				case 21: $this->create_user('邹可翰','barton',$level,$bighead);
				break;
				}
		}
		echo 'success';
	}
	*/
	
}

