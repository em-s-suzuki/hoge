<?php
class Syscheck_model extends CI_Model
{
    protected $ci;
    
    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }
    public function getNow()
    {
        if (($data = $this->ci->db->query('SELECT NOW()')->result()) === false) {
          throw new Exception ("getting Data Failed.");
        }
        return $data[0];
    }
}
