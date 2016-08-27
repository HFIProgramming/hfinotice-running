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
		for($i=1;$i<=30;$i++){
			$class='morrison';
			$level='3';
			$bighead='../../../images/default.png';
			switch($i){
				case 1: $this->create_user('陈传烨 ',$class,$level,$bighead);
				break;
				case 2: $this->create_user('陈曼佳',$class,$level,$bighead);
				break;
				case 3: $this->create_user('陈诗霖',$class,$level,$bighead);
				break;
				case 4: $this->create_user('陈诗雨',$class,$level,$bighead);
				break;
				case 5: $this->create_user('邓学谦',$class,$level,$bighead);
				break;
				case 6: $this->create_user('冯浩源',$class,$level,$bighead);
				break;
				case 7: $this->create_user('冯佳媛',$class,$level,$bighead);
				break;
				case 8: $this->create_user('郭子熠',$class,$level,$bighead);
				break;
				case 9: $this->create_user('蒋子龙',$class,$level,$bighead);
				break;
				case 10: $this->create_user('李思达',$class,$level,$bighead);
				break;
				case 11: $this->create_user('林家帆',$class,$level,$bighead);
				break;
				case 12: $this->create_user('刘梦嘉',$class,$level,$bighead);
				break;
				case 13: $this->create_user('吕文逸',$class,$level,$bighead);
				break;
				case 14: $this->create_user('莫咏昕',$class,$level,$bighead);
				break;
				case 15: $this->create_user('欧阳紫玉',$class,$level,$bighead);
				break;
				case 16: $this->create_user('丘维凯',$class,$level,$bighead);
				break;
				case 17: $this->create_user('容子豪',$class,$level,$bighead);
				break;
				case 18: $this->create_user('沙子忻',$class,$level,$bighead);
				break;
				case 19: $this->create_user('唐子航',$class,$level,$bighead);
				break;
				case 20: $this->create_user('童婉秋',$class,$level,$bighead);
				break;
				case 21: $this->create_user('汪誉昊',$class,$level,$bighead);
				break;
				case 22: $this->create_user('王致远',$class,$level,$bighead);
				break;
				case 23: $this->create_user('吴诺',$class,$level,$bighead);
				break;
				case 24: $this->create_user('吴巧曈',$class,$level,$bighead);
				break;
				case 25: $this->create_user('张靖尧',$class,$level,$bighead);
				break;
				case 26: $this->create_user('郑翔予',$class,$level,$bighead);
				break;
				case 27: $this->create_user('钟茵婷',$class,$level,$bighead);
				break;
				case 28: $this->create_user('周君澍',$class,$level,$bighead);
				break;
				case 29: $this->create_user('朱海珲',$class,$level,$bighead);
				break;
				case 30: $this->create_user('朱潇润',$class,$level,$bighead);
				break;
				}
		}
		echo 'success';
	}
	
}

