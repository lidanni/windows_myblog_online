<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function get_all(){
        return $this->db->get('t_blog')->result();
    }


    public function get_by_id($blog_id){
        $this->db->select('blog.*, admin.admin_name,admin.admin_photo');
        $this->db->from('t_blog blog');
        $this->db->join('t_admin admin','blog.author=admin.admin_id');
        $this->db->where('blog.blog_id',$blog_id);
        return $this->db->get()->row();
    }


    public function delete($blog_id){
        $this->db->delete('t_blog', array('blog_id' => $blog_id));
        return $this->db->affected_rows();
    }

    
    public function update($blog_id, $title, $content, $img, $author){
        $data = array(
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'author' => $author
        );
        $this->db->where('blog_id', $blog_id);
        $this->db->update('t_blog', $data);
        return $this->db->affected_rows();
    }


    /*****************以下两个查询必须同步,如果不同步怎么办*******************/
    public function get_by_page($limit, $offset){
        $this->db->select('*');
        $this->db->from('t_blog blog');
        $this->db->join('t_admin admin','blog.author=admin.admin_id');
        $this->db->order_by('blog.add_time','desc');

        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function get_total_count(){
        return $this->db->count_all('t_blog');
    }
    /**********************************/




    public function delete_more_in($str){
        $this->db->query( " delete from t_blog where blog_id in( $str ) " );
//      双引号中的变量可以直接写
//      单引号中的变量要用.拼
        return $this->db->affected_rows();
    }

    public function save($title,$content,$img_url,$author){
        $this->db->insert('t_blog',array(
            'title' => $title,
            'content' => $content,
            'img' => $img_url,
            'author' =>$author
        ));
        return $this->db->affected_rows();
    }









}
