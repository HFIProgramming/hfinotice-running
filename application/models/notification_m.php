<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:通知*/
class Notification_m extends CI_Model  {
		function __construct() {
			parent::__construct();
			$this->load->library('session');
		}

		/**
		 * 返回特定$section的$limit条通知或id为$id的通知。
		 *
		 * @param string $section
		 * @param null|int $limit 为NULL时无限制\
		 * @param null|String $id 获取某条通知的有关内容
		 *
		 * @todo 增加异常处理
		 *
		 * @return CI_DB_RESULT
		 */
		function get_notification($section = '',$limit = NULL,$id = NULL) {
			$this->db->order_by('id','desc');
			switch ($section) {
				case '':
					break;
				case 'clubs':
					$cont = array('Admin','Teacher','');
					$this->db->where_not_in('level',$cont);
					break;
				case 'study':
					$this->db->where('level','Teacher');
					break;
				case 'others':
					$others = array('','Admin');
					$this->db->where_in('level',$others);
					break;
				default:
			}
			if ($limit != NULL)
				$this->db->limit($limit);
			if ($id != NULL)
				$this->db->where('id',$id);
			$data = $this->db->get('notification');
			return $data;
		}
		
		/**
		 * 返回所有回复。
		 *
		 * @return CI_DB_RESULT
		 */
		function get_all_reply() {
			$this->db->order_by('id','desc');
			$data = $this->db->get('reply');
			return $data;
		}
		
		/**
		 * 返回名为$username的用户发送的通知。
		 *
		 * @param string $username
		 *
		 * @return CI_DB_RESULT
		 */
		function get_user_notification($username) {
			$this->db->order_by('id','desc');
			$this->db->where('username',$username);
			$data = $this->db->get('notification');
			return $data;
		}

		/**
		 * 名为$username，头像为$bighead，级别为$level，班级为$class的用户发送日期为$date，标题为$title，正文为$content的通知。
		 *
		 * @param mixed $date
		 * @param string $username
		 * @param mixed $bighead 头像
		 * @param string $title
		 * @param string $content
		 * @param string $level
		 * @param string $class
		 */
		function post_notification($date,$username,$bighead,$title,$content,$level,$class) {
			$data = array(
				'date' => $date,
				'username' => $username,
				'bighead' => $bighead,
				'title' => $title,
				'content' => $content,
				'level' => $level,
				'class' => $class
			);
			$this->db->insert('notification',$data);
			
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			$this->db->select('id');
			$newest_id_bundle = $this->db->get('notification');
			$newest_id = '';
			foreach($newest_id_bundle->result() as $row){
				$newest_id = $row->id;
			}  //识别最新的notification，以便添加到reminders时一一对应
				
			if ($level!='') {
				$data2 = array(
					'touser' => 'all',
					'title' => $title,
					'kind' => 'posted a new notification',
					'author' => $username,
					'sourceid' => $newest_id
					);
				$this->db->insert('reminders',$data2);
			}
		}

		/**
		 * 修改id为$id的通知的标题为$title，正文为$content，级别为$level.
		 *
		 * @param mixed $id
		 * @param string $title
		 * @param string $content
		 * @param string $level
		 */
		function edit_notification($id,$title,$content,$level) {
			$notification = array(
				'title' => $title,
				'content' => $content,
				'level' => $level
			);
			$this->db->where('id',$id);
			$this->db->update('notification',$notification);
		}

		/**
		 * 删除id为$id的通知及其所有的回复。
		 *
		 * @param mixed $id
		 */
		function delete_notification($id) {
			$this->db->where('id',$id);
			$this->db->delete('notification');
			$this->db->where('not_id',$id);
			$this->db->delete('reply');
			
			$this->db->where('sourceid',$id);
			$this->db->where('kind','posted a new notification');
			$this->db->delete('reminders');
		}

		/**
		 * 名为$from_username，头像为$bighead，班级为$class的用户发出日期为$date，正文$content，回复的通知的id为$id，班别为$class的通知。
		 * 同时名为$from_username的用户向名为$to_username的用户发出标题为$reminder_title的提醒。
		 *
		 * @param mixed $date
		 * @param string $from_username
		 * @param mixed $bighead 头像
		 * @param string $content
		 * @param mixed $id
		 * @param string $class
		 * @param string $reminder_title
		 * @param string $to_username
		 */
		function reply($date,$from_username,$bighead,$content,$id,$class,$reminder_title,$to_username) {
			$data = array(
				'date' => $date,
				'username' => $from_username,
				'bighead' => $bighead,
				'content' => $content,
				'not_id' => $id,
				'class' => $class
			);
			$this->db->insert('reply',$data);
			
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			$this->db->select('id');
			$newest_id_bundle = $this->db->get('reply');
			$newest_id = '';
			foreach($newest_id_bundle->result() as $row){
				$newest_id = $row->id;
			}    //识别最新的reply，以便添加到reminders时一一对应
			
			$data2 = array(
				'touser' => $to_username,
				'title' => $reminder_title,
				'kind' => 'replied your notification',
				'author' => $from_username,
				'sourceid' => $newest_id
				);
			$this->db->insert('reminders',$data2);
		}

		/**
		 * 删除id为$id的回复。
		 *
		 * @param mixed $id
		 */
		function delete_reply($id) {
			$this->db->where('id',$id);
			$this->db->delete('reply');
			
			$this->db->where('sourceid',$id);
			$this->db->where('kind','replied your notification');
			$this->db->delete('reminders');
		}

		/**
		 * 获得名为$username的用户拥有的社团名称。
		 *
		 * @param string $username
		 *
		 * @return string
		 */
		function get_user_club_name($username) {
			$this->db->where('username',$username);
			$this->db->select('ownclub');
			$data = $this->db->get('userinfo');
			$club_name = '';
			foreach($data->result() as $row){
				$club_name = $row->ownclub;
			}
			return $club_name;
		}

		/**
		 * 获取$limit条当前session用户未读的提醒。
		 *
		 * @param int $limit
		 *
		 * @return array 以嵌套数组包含*至多*$limit条未读提醒
		 **/
		function get_reminders($limit = 10) {
			$username = $this->session->userdata('username');
			$this->db->order_by('id','desc');
			$this->db->limit($limit);
			/** @var array $affected_users 会波及到当前用户的用户名*/
			$affected_users = array('all',$username);
			$this->db->where_in('touser',$affected_users);
			$data1 = $this->db->get('reminders');
			
			$data2 = $this->db->get('readreminders');
			$rid = array();
			$title = array();
			$kind = array();
			$author = array();
			if ($data1->num_rows() > 0) {
				foreach ($data1->result() as $row) {
					$read = false;

					if ($data2->num_rows() > 0) {
						foreach ($data2->result() as $line) {
							if ($row->id == $line->reminder_id && $line->readuser == $username) {
								$read = true;
								break;
							}
						}
					}

					if (!$read) {
						array_push($rid, $row->id);
						array_push($author, $row->author);
						array_push($kind, $row->kind);
						array_push($title, $row->title);
					}
				}
			}
			return array($rid,$author,$kind,$title);
			
		}
		
		/**
		 * 上传图片
		 *
		 * 要求：函数名：upload_image
		 * 将得到的参数全部传入数据库的'image'表中，数据库title名与变量名一致
		 *
		 * @param string $link 图片的纯链接
		 * @param string $username 上传该图片的用户名
		 *
		 */
		 function upload_image($link,$username) {
			 $data = array(
			   'link' => $link,
			   'username' => $username
			   );
			 $this->db->insert('image',$data);
		 }
}