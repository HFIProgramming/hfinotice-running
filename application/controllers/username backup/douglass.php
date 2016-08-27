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
			$class='douglass';
			$level='3';
			$bighead='../../../images/default.png';
			switch($i){
				case 1: $this->create_user('陈怡伶',$class,$level,$bighead);
				break;
				case 2: $this->create_user('陈子希',$class,$level,$bighead);
				break;
				case 3: $this->create_user('戴雨诗',$class,$level,$bighead);
				break;
				case 4: $this->create_user('傅渝淇',$class,$level,$bighead);
				break;
				case 5: $this->create_user('郭思雅',$class,$level,$bighead);
				break;
				case 6: $this->create_user('贺文宣',$class,$level,$bighead);
				break;
				case 7: $this->create_user('黄懿清',$class,$level,$bighead);
				break;
				case 8: $this->create_user('黄周一叶',$class,$level,$bighead);
				break;
				case 9: $this->create_user('黄子岚',$class,$level,$bighead);
				break;
				case 10: $this->create_user('李佳玲',$class,$level,$bighead);
				break;
				case 11: $this->create_user('李杰晖',$class,$level,$bighead);
				break;
				case 12: $this->create_user('李欣倩',$class,$level,$bighead);
				break;
				case 13: $this->create_user('刘威麟',$class,$level,$bighead);
				break;
				case 14: $this->create_user('彭煜麟',$class,$level,$bighead);
				break;
				case 15: $this->create_user('阮廷曦',$class,$level,$bighead);
				break;
				case 16: $this->create_user('王博洋',$class,$level,$bighead);
				break;
				case 17: $this->create_user('王尔芊',$class,$level,$bighead);
				break;
				case 18: $this->create_user('王洪俊明',$class,$level,$bighead);
				break;
				case 19: $this->create_user('翁隽宇',$class,$level,$bighead);
				break;
				case 20: $this->create_user('吴宇伦',$class,$level,$bighead);
				break;
				case 21: $this->create_user('伍逸童',$class,$level,$bighead);
				break;
				case 22: $this->create_user('席玥',$class,$level,$bighead);
				break;
				case 23: $this->create_user('尹澜霏',$class,$level,$bighead);
				break;
				case 24: $this->create_user('张派豪',$class,$level,$bighead);
				break;
				case 25: $this->create_user('张颐洋',$class,$level,$bighead);
				break;
				case 26: $this->create_user('郑一诺',$class,$level,$bighead);
				break;
				case 27: $this->create_user('周千宸',$class,$level,$bighead);
				break;
				case 28: $this->create_user('周泽弘',$class,$level,$bighead);
				break;
				case 29: $this->create_user('朱思淇',$class,$level,$bighead);
				break;
				}
		}
		echo 'success';
	}
	
}

