<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
        $this->load->database(); // defaultの情報を基に生成
        if ($this->db->conn_id === FALSE) {
            // データベースに接続されていません。
            error_log(__METHOD__.' '.__LINE__."\tデータベースに接続されていません。", 3, '/tmp/debug.log'); // DEBUG
        } else {
            // データベースに接続されています。
            error_log(__METHOD__.' '.__LINE__."\tデータベースに接続されています。", 3, '/tmp/debug.log'); // DEBUG
            $query = $this->db->query('SELECT * FROM users;');
            $users = $query->result();
            error_log(__METHOD__.' '.__LINE__."\n".var_export($users, true), 3, '/tmp/debug.log'); // DEBUG
        }

		$this->load->view('user');
	}

	public function add()
	{
		$this->load->view('user_add');
	}

	public function add_do()
	{
        $name = $this->input->get_post('name');
        $this->load->database(); // defaultの情報を基に生成
        $this->load->model('User');
        $this->user->insert_user($name);

        $this->load->view('user_add_done', array('name' => $name));
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */