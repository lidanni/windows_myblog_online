<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function get_all(){
        return $this->db->get('t_admin')->result();
    }

    public function get_by_name_pwd($name, $pwd){
        $data = array(
            'admin_name' => $name,
            'admin_pwd' => $pwd
        );
        return $this->db->get_where('t_admin', $data)->row();
    }

}



















