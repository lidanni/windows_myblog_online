<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('admin/admin_model');
        $this->load->model('blog_model');
        $this->load->model('comment_model');
        $this->load->model('message_model');
    }

    //管理员登录
    public function login(){
        $this->load->view('admin/login');
    }
    public function check_login(){
        $admin_name = $this->input->post('admin_name');
        $admin_pwd = $this->input->post('admin_pwd');
        $row = $this->admin_model->get_by_name_pwd($admin_name, $admin_pwd);
        if($row){
//          开启一个session
            $this->session->set_userdata('admin',$row);

            $result = $this->blog_model->get_all();
            $data = array(
                'blogs' => $result
            );
            redirect('admin/show_blog', $data);
        }else{
            redirect('admin/login');
        }
    }
    //var_dump($data);
    //die();


    //文章管理
    public function show_blog(){
        $offset = $this->uri->segment(3);
        if($offset == ''){
            $offset = 0;
        }

        $this->load->library('pagination');//加载库

        $config['base_url'] = 'admin/show_blog';
        $config['total_rows'] = $this -> blog_model -> get_total_count();
        $config['per_page'] = 10;
//      $config['uri_segment'] = 3;//地址栏取第三段

        //以下这段代码放在pagination.php中
        /*$config['use_page_numbers'] = TRUE;//使用页数
        $config['first_link'] = '首页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '尾页';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['prev_link'] = '<<';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['next_link'] = '>>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="am-active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';*/

        $this->pagination->initialize($config);

        $result = $this->blog_model->get_by_page($config['per_page'], $offset);
        $data = array(
            'blogs' => $result,
            'total_rows' => $config['total_rows']
        );
        $this->load->view('admin/show_blog', $data);
    }
    public function delete_blog(){
        $blog_id = $this->input->get('blog_id');
        $rows = $this->blog_model->delete($blog_id);
        if($rows > 0){
            redirect('admin/show_blog');
        }
    }
    public function update_blog(){
        $blog_id = $this->input->get('blog_id');
        $row = $this->blog_model->get_by_id($blog_id);
        if($row){
            $data = array(
                'blog' => $row
            );
            $this->load->view('admin/update_blog', $data);
        }
    }
    public function confirm_update(){
        $blog_id = $this->input->post('blog_id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $img = $this->input->post('img');
        $author = $this->input->post('author');

        $rows = $this->blog_model->update($blog_id, $title, $content, $img, $author);
        if($rows > 0){
            redirect('admin/show_blog');
        }
    }
    public function blog_content(){
        $blog_id = $this->input->get('blog_id');
        $row = $this->blog_model->get_by_id($blog_id);
        if($row){
            $data = array(
                'blog' => $row
            );
            $this->load->view('admin/blog_content', $data);
        }
    }
    public function delete_more(){
        $str = $this->input->get('str');
        $rows = $this->blog_model->delete_more_in($str);
        if($rows > 0){
            redirect('admin/show_blog');
        }
    }
    public function add_blog_page(){
        $this->load->view('admin/add_blog');
    }

    public function add_blog(){
        $title = htmlspecialchars($this->input->post('title'));
        $content = htmlspecialchars($this->input->post('content'));
        $author = $this->input->post('author');

        /*******************图片上传*************************/
        $config['upload_path'] = './uploads/';//与根目录中所建权限为777的文件名保持一致
        $config['allowed_types'] = 'gif|jpg|png';//允许的文件类型
        $config['max_size'] = '3072';//这里是以k为单位,1M=1024K
        $config['file_name'] = date('YmdHis').'_'.rand(10000,99999);//给上传上来的图片重新命名,保证不能重复
//        $config['width'] = '315';
//        $config['height'] = '197';

        $this->load->library('upload', $config);
        $this->upload->do_upload('img');
        $upload_data = $this->upload->data();

        if($upload_data['file_size'] > 0){
            $img_url = 'uploads/'.$upload_data['file_name'];
            $rows = $this->blog_model->save($title,$content,$img_url,$author);
            if($rows > 0){
                redirect('admin/show_blog');
            }
        }
        /*************************************************/
    }


    //评论管理
    public function show_comment(){

        $offset = $this->uri->segment(3);
        if($offset == ''){
            $offset = 0;
        }

        $this->load->library('pagination');//加载库

        $config['base_url'] = 'admin/show_comment';
        $config['total_rows'] = $this -> comment_model -> get_total_count();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $result = $this->comment_model->get_by_page($config['per_page'], $offset);

        if($result){
            $data = array(
                'comments' => $result,
                'total_rows' => $config['total_rows']
            );
            $this->load->view('admin/show_comment', $data);
        }
    }
    public function delete_comment(){
        $id =  $this->input->get('id');
        $rows =  $this->comment_model->delete($id);
        if($rows > 0){
            redirect('admin/show_comment');
        }
    }
    public function delete_more_comment(){
        $str = $this->input->get('str');
        $rows = $this->comment_model->delete_more_in($str);
        if($rows > 0){
            redirect('admin/show_comment');
        }
    }


    //留言管理
    public function show_message(){

        $offset = $this->uri->segment(3);
        if($offset == ''){
            $offset = 0;
        }

        $this->load->library('pagination');//加载库

        $config['base_url'] = 'admin/show_message';
        $config['total_rows'] = $this -> message_model -> get_total_count();
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $result = $this->message_model->get_by_page($config['per_page'], $offset);

        if($result){
            $data = array(
                'messages' => $result,
                'total_rows' => $config['total_rows']
            );
            $this->load->view('admin/show_message', $data);
        }
    }
    public function delete_message(){
        $id =  $this->input->get('id');
        $rows = $this->message_model->delete($id);
        if($rows > 0){
            redirect('admin/show_message');
        }
    }
    public function delete_more_message(){
        $str = $this->input->get('str');
        $rows = $this->message_model->delete_more_in($str);
        if($rows > 0) {
            redirect('admin/show_message');
        }
    }


    //logout
    public function logout(){
//      关闭一个session
        $this->session->unset_userdata('admin');
        redirect('admin/login');
    }

}






