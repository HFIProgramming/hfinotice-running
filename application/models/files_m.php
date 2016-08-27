<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**内容:文件*/
class Files_m extends CI_Model  {
		function __construct() {
			parent::__construct();
			$this->load->library('session');
		}

		/**
		 * 返回$limit个文件。
		 *
		 * @param null|int $limit 为NULL时无限制
		 *
		 * @return CI_DB_RESULT
		 */
		function get_files($limit = NULL) {
			$this->db->order_by('id','desc');
			if ($limit != NULL)
				$this->db->limit($limit);
			$files = $this->db->get('files');
			return $files;
		}

		/**
		 * 名为$author，头像为$bighead，班级为$class的用户上传文件名为$filename，日期为$date的文件到名为$folder_name，id为$folder_id的文件夹里。
		 *
		 * @param string $link
		 * @param string $filename
		 * @param string $author
		 * @param mixed $bighead
		 * @param mixed $date
		 * @param mixed $folder_id
		 * @param string $folder_name
		 * @param string $class
		 */
		function upload_file($link,$filename,$author,$bighead,$date,$folder_id,$folder_name,$class) {
			$data = array(
				'link' => $link,
				'name' => $filename,
				'author' => $author,
				'bighead' => $bighead,
				'date' => $date,
				'sectionid' => $folder_id,
				'section' => $folder_name,
				'class' => $class
			);
			$this->db->insert('files',$data);	//添加到files
			
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			$this->db->select('id');
			$newest_id_bundle = $this->db->get('files');
			$newest_id = '';
			foreach($newest_id_bundle->result() as $row){
				$newest_id = $row->id;
			}   //识别最新的files，以便添加到reminders时一一对应
			
			$data2=array(
					'touser' => 'all',
					'kind' => 'posted a new file',
					'author' => $author,
					'title' => $filename,
					'sourceid' => $newest_id
				);
			$this->db->insert('reminders',$data2);  //添加到reminders

			$data3=array(
				'latest' => $filename,
				'last' => $date
				);
			$this->db->where('id',$folder_id);  //更新section最后编辑

			$this->db->update('sections',$data3);
		}

		/**
		 * 删除id为$file_id的文件，并同时更新id为$folder_id的文件夹。
		 *
		 * @param mixed $file_id
		 * @param mixed $folder_id
		 */
		function delete_file($file_id,$folder_id) {
			$this->db->where('id',$file_id);
			$this->db->delete('files');
			
			$this->db->where('sourceid',$file_id);
			$this->db->where('kind','posted a new file');
			$this->db->delete('reminders');

			$this->db->order_by('id','desc');
			$this->db->where('sectionid',$folder_id);
			$this->db->select('name,date,sectionid');
			$a = $this->db->get('files');
			$n_name = '';
			$n_date = '';
			if ($a->num_rows()>0) {
				foreach ($a->result() as $row) {
					$n_name = $row->name;
					$n_date = $row->date;
					break;
				}
			}else {
				$n_name = 'none';
				$n_date = 'none';
			}
			$data=array(
				'latest' => $n_name,
				'last' => $n_date
				);
			$this->db->where('id',$folder_id);
			$this->db->update('sections',$data);  //确认section内最新文档
		}

		/**
		 * 返回$limit个文件夹。
		 *
		 * @param null|int $limit 为NULL时无限制
		 *
		 * @return CI_DB_RESULT
		 */
		function get_folders($limit = NULL) {
			$this->db->order_by('id','asc');
			if ($limit != NULL)
				$this->db->limit($limit);
			$folders = $this->db->get('sections');
			return $folders;
		}

		/**
		 * 返回id为$folder_id的文件夹内$limit个文件。
		 *
		 * @param mixed $folder_id
		 * @param null|int $limit
		 *
		 * @return CI_DB_RESULT
		 */
		function get_folder_files($folder_id, $limit = NULL) {
			$this->db->order_by('id','desc');
			$this->db->where('sectionid',$folder_id);
			if ($limit != NULL)
				$this->db->limit($limit);
			$files = $this->db->get('files');
			return $files;
		}

		/**
		 * 返回id为$folder_id的文件夹的名字。
		 *
		 * @param mixed $folder_id
		 *
		 * @return string
		 */
		function get_folder_name($folder_id) {
			$this->db->where('id',$folder_id);
			$data = $this->db->get('sections');
			$folder_name = $data->row()->name;
			return $folder_name;
		}
}