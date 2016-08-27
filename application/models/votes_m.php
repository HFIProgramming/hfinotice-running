<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:用户投票*/
class Votes_m extends CI_Model  {
		
		/**
		 * 从数据库加载全部Votes
		 *
		 * @return CI_DB_RESULT
		 */
		function get_all_votes() {
			$class = $this->session->userdata('class');
			$object = '';
			if ($class == "baldwin" || $class == "douglass" || $class == "morrison" || $class == "sotomayor"){
				$object = '10';
			}
			if ($class == "stanton" || $class == "earhart" || $class == "carson" || $class == "barton"){
				$object = '11';
			}
			if ($class == "williams" || $class == "joplin" || $class == "copland" || $class == "gershwin"){
				$object = '12';
			}
			
			if ($object == ''){
				$this->db->order_by('id','desc');
				$data = $this->db->get('votes');
			}
			else{
				$this->db->order_by('id','desc');
				$this->db->where('object',$object);
				$this->db->or_where('object','all');
				$data = $this->db->get('votes');
			}
			return $data;
		}
		
		/**
		 * 从数据库加载全部Voted,即已投票。
		 *
		 * @return CI_DB_RESULT
		 */
		function get_all_voted(){
			return $this->db->get('voted');
		}
		
		
		/**
		 * 检查Vote是否开放
		 *
		 * @param string $voteid
		 *
		 * @return Boolean
		 */
		function if_vote_open($voteid){
			$this->db->where('id',$voteid);
			$trans = $this->db->get('votes');
			$start_date = '';
			$end_date = '';
			foreach($trans->result() as $row){
				$start_date = $row->startdate;
				$end_date = $row->enddate;
			}
			$this->load->helper('votes');
			if (cal_if_start($start_date,$end_date) == 'true'){
				return true;
			}
			else{
				return false;
			}
		}
		
		/**
		 * 检查用户是否已经投票
		 *
		 * @param string $voteid
		 *
		 * @return Boolean
		 */
		function if_has_vote($voteid){
			$username = $this->session->userdata('username');
			$this->db->where('voteid',$voteid);
			$this->db->where('username',$username);
			$data = $this->db->get('voted');
			if ($data->num_rows() >= 1)
				return true;
			else
				return false;
		}
		
		/**
		 * 从数据库加载投票的内容。
		 *
		 * @param string $voteid
		 *
		 * @return CI_DB_RESULT
		 */
		function get_current_vote($voteid){
			$this->db->where('id',$voteid);
			$this->db->order_by('id','asc');
			$data = $this->db->get('votes');
			return $data;
		}
		
		/**
		 * 从数据库加载投票的选项，结果。
		 *
		 * @param string $voteid
		 *
		 * @return CI_DB_RESULT
		 */
		function get_current_options($voteid) {
			$this->db->where('voteid',$voteid);
			$this->db->order_by('id','asc');
			$data = $this->db->get('voteitem');
			return $data;
		}
		
		/**
		 * 从数据库加载投票的选项，结果。
		 *
		 * @param CI_DB_RESULT $vote
		 *
		 * @return String
		 */
		function get_current_title($vote){
			foreach($vote->result() as $row){
				return $row->title;
			}
		}
		
		/**
		 * 将投票信息上传至数据库
		 *
		 * @param String $username
		 * @param String $vote_id 选项对应的Vote的id
		 * @param String $choice_id 选项对应的id
		 */
		function upload_votes($username,$vote_id,$choice_id){
			$data = array(
				'username' => $username,
				'voteid' => $vote_id,
				'itemid' => $choice_id
			);
			$this->db->insert('voted',$data);
			
			$this->db->where('itemid',$choice_id);
			$trans = $this->db->get('voted');
			$votenum = $trans->num_rows();
			
			$data2 = array('votenum' => $votenum);
			$this->db->where('id',$choice_id);
			$this->db->update('voteitem',$data2);
		}
}