<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->model('comment_model');
		$this->load->model('message_model');
	}


	//index页面
	public function index(){
		$this->load->view('index');
	}
	//index页面,显示所有文章
	public function get_blogs(){          //ajax传参数
		$page = $this->input->get('page');
		$limit = 6;
		$offset = ($page-1) * 6;
		$blogs = $this->blog_model->get_by_page($limit, $offset);
		$totalCount = $this->blog_model->get_total_count();
		if($blogs && $totalCount){
			$res = array(
					'data' => $blogs,
					'isEnd' => ceil($totalCount/6) == $page ? true : false
			);
			echo json_encode($res);
		}
	}


	//blog页面,显示"文章"及"评论"
	public function blog($blog_id){
//		$blog_id = $this->input->get('blog_id');//非ajax方式传参,普通方式?传参
		$blog = $this->blog_model->get_by_id($blog_id);
//		$comments = $this->comment_model->get_comment_by_blogId($blog_id);
		if($blog){
			$blog -> comments = $this->comment_model->get_comment_by_blogId($blog_id);
			$data = array(
//					'comments' => $comments,
					'blog' => $blog
			);
			$this->load->view('blog', $data);
		}
	}

	//blog页面,添加评论
	public function comment(){
		$blog_id = $this->input->post('blog_id');
		$comment = htmlspecialchars($this->input->post('comment'));
		$by_name = htmlspecialchars($this->input->post('by_name'));
		if($comment!=''&&$by_name!=''){
			$rows = $this->comment_model->save($blog_id, $comment, $by_name);
			if($rows > 0) {
//				调用blog方法,但是blog方法需要传参,blog_id
//				$this->blog($blog_id);  //这种方法会出现表单重新提交
				redirect('welcome/blog/'.$blog_id);
			}
		}else{
			redirect('welcome/blog/'.$blog_id);
		}
	}


	//contact页面
	public function contact(){
		$this->load->view('contact');//页面刷新
	}
	//contact页面,保存留言信息
	public function message(){
		$username = htmlspecialchars($this->input->post('username'));
		$email = htmlspecialchars($this->input->post('email'));
		$content = htmlspecialchars($this->input->post('content'));
		if($username == '' || $email == '' || $content == ''){
			echo 'fail';
		}else{
			$rows = $this->message_model->save($username, $email, $content);
			if($rows > 0){
				echo 'success';
			}
		}
	}



//  http://localhost/myblog_git/welcome/blog?blog_id=1 普通问号方式传参
//  http://localhost/myblog_git/welcome/blog/1/2/3 CI方式传参
//  1代表$xx, 2代表$yy, 3代表$zz
//	public function aa($xx, $yy, $zz){
//
//	}

//CI有一个特殊的语法,就是允许在调用控制器中的方法时,给这个方法传参


}

