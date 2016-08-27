<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:作业*/
class Homework_m extends CI_Model  {
		function __construct() {
			parent::__construct();
			$this->load->library('session');
		}

		/**各种获取作业，getall是ajax传输接口*/
		function getclass3() {
			$this->db->order_by('id','desc');
			$this->db->where('class','morrison');
			$this->db->limit(1);
			$data = $this->db->get('homework');
			return $data;
		}
		function getclass3all() {
			$this->db->order_by('id','desc');
			$this->db->where('class','morrison');
			$data = $this->db->get('homework');
			$trans = '';
			$i = 0;
			if ($data->num_rows() > 0):
			foreach($data->result() as $row) {
				if ($i>0) {
					$trans = $trans.'<div class="displayer"><p class="relative_date">';
					$trans = $trans.$row->day.'</p><p class="actual_date">';
					$trans = $trans.$row->date.'</p><div class="line"></div>';
					$trans = $trans.'<p class="edit" id="'.$row->id.'"  onClick="edit(this.id)">EDIT</p>';
					$trans = $trans.'<div class="homework">';
					$hw = $row->homework;
					$hw1 = str_replace(' ','&nbsp;',$hw);
					$trans = $trans.nl2br($hw1).'</div></div>';
				}
				$i++;
			}
			endif;
			return $trans;
		}
		
		function getclass1() {
			$this->db->order_by('id','desc');
			$this->db->where('class','baldwin');
			$this->db->limit(1);
			$data = $this->db->get('homework');
			return $data;
		}
		function getclass1all() {
			$this->db->order_by('id','desc');
			$this->db->where('class','baldwin');
			$data = $this->db->get('homework');
			$trans = '';
			$i = 0;
			if ($data->num_rows() > 0):
			foreach($data->result() as $row) {
				if ($i>0) {
					$trans = $trans.'<div class="displayer"><p class="relative_date">';
					$trans = $trans.$row->day.'</p><p class="actual_date">';
					$trans = $trans.$row->date.'</p><div class="line"></div>';
					$trans = $trans.'<p class="edit" id="'.$row->id.'"  onClick="edit(this.id)">EDIT</p>';
					$trans = $trans.'<div class="homework">';
					$hw = $row->homework;
					$hw1 = str_replace(' ','&nbsp;',$hw);
					$trans = $trans.nl2br($hw1).'</div></div>';
				}
				$i++;
			}
			endif;
			return $trans;
		}
		
		function getclass2() {
			$this->db->order_by('id','desc');
			$this->db->where('class','douglass');
			$this->db->limit(1);
			$data = $this->db->get('homework');
			return $data;
		}
		function getclass2all() {
			$this->db->order_by('id','desc');
			$this->db->where('class','douglass');
			$data = $this->db->get('homework');
			$trans = '';
			$i = 0;
			if ($data->num_rows() > 0):
			foreach($data->result() as $row) {
				if ($i>0) {
					$trans = $trans.'<div class="displayer"><p class="relative_date">';
					$trans = $trans.$row->day.'</p><p class="actual_date">';
					$trans = $trans.$row->date.'</p><div class="line"></div>';
					$trans = $trans.'<p class="edit" id="'.$row->id.'"  onClick="edit(this.id)">EDIT</p>';
					$trans = $trans.'<div class="homework">';
					$hw = $row->homework;
					$hw1 = str_replace(' ','&nbsp;',$hw);
					$trans = $trans.nl2br($hw1).'</div></div>';
				}
				$i++;
			}
			endif;
			return $trans;
		}
		
		function getclass4() {
			$this->db->order_by('id','desc');
			$this->db->where('class','sotomayor');
			$this->db->limit(1);
			$data = $this->db->get('homework');
			return $data;
		}
		function getclass4all() {
			$this->db->order_by('id','desc');
			$this->db->where('class','sotomayor');
			$data = $this->db->get('homework');
			$trans = '';
			$i = 0;
			if ($data->num_rows() > 0):
			foreach($data->result() as $row) {
				if ($i>0) {
					$trans = $trans.'<div class="displayer"><p class="relative_date">';
					$trans = $trans.$row->day.'</p><p class="actual_date">';
					$trans = $trans.$row->date.'</p><div class="line"></div>';
					$trans = $trans.'<p class="edit" id="'.$row->id.'"  onClick="edit(this.id)">EDIT</p>';
					$trans = $trans.'<div class="homework">';
					$hw = $row->homework;
					$hw1 = str_replace(' ','&nbsp;',$hw);
					$trans = $trans.nl2br($hw1).'</div></div>';
				}
				$i++;
			}
			endif;
			return $trans;
		}
		
		/**发送作业*/
		function hw_post($date,$content,$class,$day) {
			$data = array(
			'date' => $date,
			'homework' => $content,
			'class' => $class,
			'day' => $day
			);
			$this->db->insert('homework',$data);
		}
		
		/**修改作业*/
		function hw_edit($id,$content) {
			$data = array(
			'homework' => $content
			);
			$this->db->where('id',$id);
			$this->db->update('homework',$data);
		}
		
		/**删除作业*/
		function deletehw($id) {
			$this->db->where('id',$id);
			$this->db->delete('homework');
		}
}