<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**内容:通知区（默认主页）*/
class Notification extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('notification_m');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    /**
     * 加载特定$section的$limit条通知。
     *
     * $data['all'] 为'all'时表示需要加载所有通知。
     * $data['if_remind'] 为true时表示有未读提醒。
     * $data['notification'] 为通知内容。
     * $data['reminders'] 为未读提醒。
     * $data['reply'] 为回复。
     *
     * @param string $section
     * @param null|int $limit 为NULL时无限制
     */
    private function load_notification($section, $limit) {
        secondary_site_redirect($this->uri->segment(1), $this->uri->segment(2), $this->uri->segment(3), base_url());
        $data['notification'] = $this->notification_m->get_notification($section, $limit);
        $data['reply'] = $this->notification_m->get_all_reply();
        if ($limit == NULL) {
            $data['all'] = 'all';
        } else {
            $data['all'] = '';
        }
        $view = '';
        if ($this->session->userdata('logged')) { //验证是否登陆
            if ($this->session->userdata('email') == '')
                redirect('setup');

            $reminders = $this->notification_m->get_reminders();
            $data['if_remind'] = !empty($reminders[0]);
            if ($data['if_remind']) {
                $data['reminders'] = $reminders;
            }
            switch ($section) {
                case '':
                    $view = 'notification/notification';
                    break;
                case 'clubs':
                    $view = 'notification/clubs';
                    break;
                case 'study':
                    $view = 'notification/study';
                    break;
                case 'others':
                    $view = 'notification/others';
                    break;
            }
        } 
		else {
            switch ($section) {
                case '':
                    $view = 'unlogged/notification';
                    break;
                case 'clubs':
                    $view = 'unlogged/notification_clubs';
                    break;
                case 'study':
                    $view = 'unlogged/notification_study';
                    break;
                case 'others':
                    $view = 'unlogged/notification_others';
                    break;
            }
        }
        $this->load->view($view, $data);
    }

    /**
     * 首页。
     *
     * 加载30条各类通知。
     */
    function index() {
        $this->load_notification('', 30);
    }

    /**
     * 社团通知页。
     *
     * 加载30条来自社团的通知。
     */
    function clubs() {
        $this->load_notification('clubs', 30);
    }

    /**
     * 老师通知页。
     *
     * 加载30条来自老师的通知。
     */
    function study() {
        $this->load_notification('study', 30);
    }

    /**
     * 其他通知页。
     *
     * 加载30条来自管理员和普通学生的通知。
     */
    function others() {
        $this->load_notification('others', 30);
    }

    /**
     * 首页。
     *
     * 加载全部各类通知。
     */
    function get_all() {
        $this->load_notification('', NULL);
    }

    /**
     * 社团通知页。
     *
     * 加载全部来自社团的通知。
     */
    function get_all_clubs() {
        $this->load_notification('clubs', NULL);
    }

    /**
     * 老师通知页。
     *
     * 加载全部来自老师的通知。
     */
    function get_all_study() {
        $this->load_notification('study', NULL);
    }

    /**
     * 其他通知页。
     *
     * 加载全部来自管理员和普通学生的通知。
     */
    function get_all_others() {
        $this->load_notification('others', NULL);
    }

    /**
     * 返回单独一篇通知。
     *
     * $data['notification']为通知内容。
     *
     */
    function post() {
        $id = $this->uri->segment(3);
        if ($id != '') {
            $data['notification'] = $this->notification_m->get_notification('', 1, $id);
            $this->load->view('notification/post', $data);
        } else {
            redirect('notification');
        }
    }

    /**
     * 加载图片上传页面
     *
     * 要求：函数名：upload_image_page
     * 用户必须登录才能进行以下操作，否则重定向至notification
     * 加载视图notification/uploadimage
     * $data['error'] 默认设为''
     *
     */
    function upload_image_page() {
        if ($this->session->userdata('logged')) {
            if ($this->session->userdata('email') == '') {
                redirect('setup');
            }
			$reminders = $this->notification_m->get_reminders();
            $data['if_remind'] = !empty($reminders[0]);
            if ($data['if_remind']) {
            	$data['reminders'] = $reminders;
            }
            $data['error'] = '';
            $this->load->view('notification/uploadimage', $data);
        } 
		else {
            redirect('notification');
        }
    }

    /**
     * 上传用户选择的图片至服务器
     *
     * 要求：函数名：upload_image()，请参考files中的file_upload()，上传文件至image路径
     * 最大大小为10240KB,允许png,jpg,jpeg,bmp,gif格式。
     * 调用model 中的upload_image进行上传操作。
     * 上传成功加载视图uploadsuccess,参数：
     * $data['link'] 格式为 "[img-src]图片的链接[img-end]" 这是用户指向图片的代码
     *
     * 异常处理：
     * 1. 用户必须已登陆才能进行上传操作，否则重定向至notification
     * 2. 上传错误则加载视图notification/uploadimage，传入错误参数:
     * $data['error'] 内容为SAE上传函数中报错的信息
     *
     */
    function upload_image() {
        if ($this->session->userdata('logged')) {
            if ($this->session->userdata('email') == '')
                redirect('setup');

            $config['upload_path'] = 'image';
            $config['allowed_types'] = 'png|jpg|jpeg|bmp|gif';
            $config['max_size'] = '10240';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
				$reminders = $this->notification_m->get_reminders();
            	$data['if_remind'] = !empty($reminders[0]);
            	if ($data['if_remind']) {
              	  $data['reminders'] = $reminders;
           		}
                $data['error'] = $this->upload->display_errors();
                $this->load->view('notification/uploadimage', $data);
            } 
			else {
                $data = $this->upload->data();
				$link = '0';
				foreach ($data as $item => $value) {
                    if ($item == 'file_url') {
						$link = $value;
                        break;
                    }
				}
				$username = $this->session->userdata('username');
                $this->notification_m->upload_image($link,$username);
				
				$reminders = $this->notification_m->get_reminders();
            	$data['if_remind'] = !empty($reminders[0]);
            	if ($data['if_remind']) {
              	  $data['reminders'] = $reminders;
           		}
                $data['link'] = '[img-src]'.$link.'[img-end]';
                $this->load->view('notification/uploadsuccess', $data);
            }
        } 
		else {
            redirect('notification');
        }
    }


    /**
     * 发送新通知。
     */
    function postnew() {
        /*日期以H:MM YYYY/M/D显示
        （小时，月份和天不带前导0）*/
        $date = date('G:i Y/n/j');
        $username = $this->input->post('username');
        $bighead = $this->input->post('bighead');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $level1 = $this->input->post('level');
        $ifclubs = $this->input->post('ifclubs');

        //如果用户填写了班级，则显示大写班级名的前3位+'.'
        $class = $this->session->userdata('class');
        if (!empty($class)) {
            $class = strtoupper(substr($class, 0, 3)) . '.';
        }

        //根据$level1的不同决定$level('1'为'Admin','2'为'Teacher','3'为'',4为社团)
        $level = '';

        if ($ifclubs && $level1 == '4') {
            $level = $this->notification_m->get_user_club_name($username);
        }
        if ($level1 == '1')
            $level = 'Admin';
        if ($level1 == '2')
            $level = 'Teacher';

        if ($content != '') {
            $this->notification_m->post_notification($date, $username, $bighead, $title, $content, $level, $class);
        }
        redirect('notification');
    }

    /**
     * 回复通知。
     */
    function reply() {
        /*日期以H:MM YYYY/M/D显示
        （小时，月份和天不带前导0）*/
        $date = date('G:i Y/n/j');
        $username = $this->input->post('username');
        $bighead = $this->input->post('bighead');
        $content = $this->input->post('content');
        $id = $this->input->post('id');
        $section = $this->input->post('section');
        $not_title = $this->input->post('title');
        $not_user = $this->input->post('user');

        //如果用户填写了班级，则显示大写班级名的前3位+'.'
        $class = $this->session->userdata('class');
        if ($class != '') {
            $class = strtoupper(substr($class, 0, 3)) . '.';
        }

        if ($content != '') {
            $this->notification_m->reply($date, $username, $bighead, $content, $id, $class, $not_title, $not_user);
        }

        switch ($section) {
            case 'all':
                redirect('notification');
                break;
            case 'clubs':
                redirect('notification/clubs');
                break;
            case 'study':
                redirect('notification/study');
                break;
            case 'mynotification':
                redirect('usersetting/mynotification');
                break;
            default:
                redirect('notification/others');
        }
    }

    /**
     * 删除回复。
     */
    function reply_delete() {
        $id = $this->uri->segment(3);
        $section = $this->uri->segment(4);
        if ($this->session->userdata('logged')) {
            $this->notification_m->delete_reply($id);
        }

        switch ($section) {
            case 'all':
                redirect('notification');
                break;
            case 'clubs':
                redirect('notification/clubs');
                break;
            case 'study':
                redirect('notification/study');
                break;
            case 'mynotification':
                redirect('usersetting/mynotification');
                break;
            default:
                redirect('notification/others');
        }
    }

    /**
     * 删除通知。
     */
    function not_delete() {
        $id = $this->uri->segment(3);
        if ($this->session->userdata('logged')) {
            $this->notification_m->delete_notification($id);
        }
        redirect('usersetting/mynotification');
    }

    /**
     * 获取通知标题。
     *
     * 这是一个AJAX接口。
     */
    function get_edit_title() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('notification');
        foreach ($data->result() as $row) {
            echo $row->title;
        }
    }

    /**
     * 获取通知内容。
     *
     * 这是一个Ajax接口，*/
    function get_edit_content() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $data = $this->db->get('notification');
        foreach ($data->result() as $row) {
            echo $row->content;
        }
    }

    /**
     * 修改通知。
     *
     * 这是一个Ajax借口。
     */
    function edit() {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $level1 = $this->input->post('level');
        $ifclubs = $this->input->post('ifclubs');
        $level = '';

        if ($ifclubs == true && $level1 == '4') {
            $level = $this->notification_m->get_user_club_name($username);
        }
        if ($level1 == '1')
            $level = 'Admin';
        if ($level1 == '2')
            $level = 'Teacher';

        if ($content != '') {
            $this->notification_m->edit_notification($id, $title, $content, $level);
        }
        redirect('usersetting/mynotification');
    }

    /**
     * 将提醒设为已阅。
     *
     * 这是一个Ajax接口。*/
    function markasread() {
        $idkey = $this->input->post('idkey');
        $arr = explode('/', $idkey);
        $username = $this->session->userdata('username');
        for($i = 0; $i < count($arr)-1; $i++) {
			$data=array(
					'reminder_id' => $arr[$i],
					'readuser' => $username
				);
			$this->db->insert('readreminders',$data);
		}
    }

}