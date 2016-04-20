<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function get_all(){
        return $this->db->get('t_comment')->result();
    }

    public function get_comment_by_blogId($blog_id){
        $this->db->order_by('add_time','desc');
        return $this->db->get_where('t_comment', array('blog_id' => $blog_id))->result();
    }

    public function save($blog_id, $comment, $by_name){
        $this->db->insert('t_comment',
            array('blog_id' => $blog_id, 'comment' => $comment, 'by_name' => $by_name)
        );
        return $this->db->affected_rows();
    }

    public function delete($id){
        $this->db->delete('t_comment', array('comment_id' => $id));
        return $this->db->affected_rows();
    }

    public function delete_more_in($str){
        $this->db->query("delete from t_comment where comment_id in($str)");
        return $this->db->affected_rows();
    }

    public function get_total_count(){
        return $this->db->count_all('t_comment');
    }

    public function get_by_page($limit, $offset){
        $this->db->limit($limit, $offset);
        $this->db->order_by('t_comment.add_time','desc');
        return $this->db->get('t_comment')->result();
    }

}
