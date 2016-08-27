<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:用来玩的＋文件夹对调功能*/
class Test extends CI_Controller {
	/*
	function index() {
		$config['upload_path'] = 'image';
		$config['allowed_types'] = 'png|jpg|bmp|docx';
		$config['max_size'] = '5120';
		 
	    $this->load->library('upload', $config);
			$data=$this->upload->multiple('gallery');
			foreach ($data['error'] as $row) {
				echo $row.'<br>';
			}
			foreach ($data['files'] as $row) {
				echo $row['file_url'].'<br>';
			}
	}
	function a() {
		$data['error']='';
		$this->load->view('test',$data);
	}
	*/

	/**切换文件夹顺序*/
	function section_swap() {
		$o1 = $this->uri->segment(3);
		$o2 = $this->uri->segment(4);

		if ($o2 != '' && $o1 != '') {
			$temp = array('sectionid' => '99999');
			$this->db->where('sectionid',$o1);
			$this->db->update('files',$temp);

			$data1 = array('sectionid' => $o1);
			$this->db->where('sectionid',$o2);
			$this->db->update('files',$data1);

			$data2 = array('sectionid' => $o2);
			$this->db->where('sectionid','99999');
			$this->db->update('files',$data2);

			$this->db->where('id',$o1);
			$sectiondump1 = $this->db->get('sections');
			$name1 = '';
			$latest1 = '';
			$last1 = '';
			foreach ($sectiondump1->result() as $row) {
				$name1 = $row->name;
				$latest1 = $row->latest;
				$last1 = $row->last;
			}

			$this->db->where('id',$o2);
			$sectiondump2 = $this->db->get('sections');
			$name2 = '';
			$latest2 = '';
			$last2 = '';
			foreach ($sectiondump2->result() as $row) {
				$name2 = $row->name;
				$latest2 = $row->latest;
				$last2 = $row->last;
			}

			$reverse1 = array('name' => $name2,'latest' => $latest2,'last' => $last2);
			$reverse2 = array('name' => $name1,'latest' => $latest1,'last' => $last1);

			$this->db->where('id',$o1);
			$this->db->update('sections',$reverse1);

			$this->db->where('id',$o2);
			$this->db->update('sections',$reverse2);

			echo 'success';
		}else {
			echo 'failed';
		}
	}
	
}