<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**usersetting controller**/
/*Ethan Hu*/
/**内容:用户设置*/
class Adduser extends CI_Controller {
	function create_password($pw_length) {  
		$randpwd = '';  
		for ($i = 0; $i < $pw_length; $i++)  
		{  
		$randpwd .= mt_rand(1, 9);  
		}  
		return $randpwd;  
	}
	function create_user($name,$class,$level,$bighead){
		$password=$this->create_password(4);
		$data=array(
							'username'=>$name,
							'password'=>$password,
							'class'=>$class,
							'level'=>$level,
							'bighead'=>$bighead
						);
		$this->db->insert('userinfo',$data);
	}
	function index(){
		for($i=1;$i<=29;$i++){
			$class='baldwin';
			$level='3';
			$bighead='../../../images/default.png';
			switch($i){
				case 1: $this->create_user('曾贻潞',$class,$level,$bighead);
				break;
				case 2: $this->create_user('曾颖涛',$class,$level,$bighead);
				break;
				case 3: $this->create_user('曾子睿',$class,$level,$bighead);
				break;
				case 4: $this->create_user('邓子奕',$class,$level,$bighead);
				break;
				case 5: $this->create_user('傅居泰',$class,$level,$bighead);
				break;
				case 6: $this->create_user('何诺行',$class,$level,$bighead);
				break;
				case 7: $this->create_user('胡佳萱',$class,$level,$bighead);
				break;
				case 8: $this->create_user('黄楚耘',$class,$level,$bighead);
				break;
				case 9: $this->create_user('黄康旎',$class,$level,$bighead);
				break;
				case 10: $this->create_user('黄麟雯',$class,$level,$bighead);
				break;
				case 11: $this->create_user('简辰昊',$class,$level,$bighead);
				break;
				case 12: $this->create_user('匡芷仪',$class,$level,$bighead);
				break;
				case 13: $this->create_user('刘懋仪',$class,$level,$bighead);
				break;
				case 14: $this->create_user('刘聿达',$class,$level,$bighead);
				break;
				case 15: $this->create_user('乔予',$class,$level,$bighead);
				break;
				case 16: $this->create_user('申诗云',$class,$level,$bighead);
				break;
				case 17: $this->create_user('王若琳',$class,$level,$bighead);
				break;
				case 18: $this->create_user('王巽言',$class,$level,$bighead);
				break;
				case 19: $this->create_user('温钰菁',$class,$level,$bighead);
				break;
				case 20: $this->create_user('吴辰杰',$class,$level,$bighead);
				break;
				case 21: $this->create_user('吴文森',$class,$level,$bighead);
				break;
				case 22: $this->create_user('杨坤泽',$class,$level,$bighead);
				break;
				case 23: $this->create_user('杨亦东',$class,$level,$bighead);
				break;
				case 24: $this->create_user('于昊杨',$class,$level,$bighead);
				break;
				case 25: $this->create_user('余博文',$class,$level,$bighead);
				break;
				case 26: $this->create_user('赵明',$class,$level,$bighead);
				break;
				case 27: $this->create_user('周俊均',$class,$level,$bighead);
				break;
				case 28: $this->create_user('周俞廷',$class,$level,$bighead);
				break;
				case 29: $this->create_user('朱沐麒',$class,$level,$bighead);
				break;
				case 30: $this->create_user('罗新豪',$class,$level,$bighead);
				break;
				}
		}
		echo 'success';
	}
	
}