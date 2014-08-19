<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syscheck extends CI_Controller
{
    /**
     * Syscheck index
     *
     * @params none
     * @return 
     */
    public function index()
    {
        try {
            $this->load->library('SyscheckClass');
            // @@ see オブジェクト名は小文字
            $now = $this->syscheckclass->doCheck()->now;
            
            $render = 
                array(
                    'now' => $now,
                );
            
            $this->load->view('syscheck', $render);
            
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
}
