<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 20:32
 */
class Pos extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pos_model','pos');
		$this->load->helper(array('url','form'));
		$this->load->library('pagination',null,'page');
		//$this->load->library('session');
	}
	//加载视图
	public function index(){
		$data = $this->pos->read();
		$this->load->vars('data',$data);
		$this->load->view('Pos/index');
	}

	//添加数据
	public function add(){
		$this->load->view('Pos/add');
	}

	//执行添加数据
	public function doadd(){
		$data['name'] = $this->input->post('name');
		$id = $this->pos->addData($data);
		if($id){
			redirect('Pos/index');
		}
	}

	//删除数据
	public function del(){
		$id = $this->uri->segment(3);//获取id值
		if($this->pos->delData($id)){//传递给删除数据的方法
			redirect('Pos/index');
		}
	}
	//修改数据
	public function edit(){
		$id = $this->uri->segment(3);//获取id值
		$data = $this->pos->find($id);
		$this->load->vars('data', $data);
		$this->load->view('Pos/edit');
	}
	//执行修改信息
	public function doedit(){
		$uri = $_SERVER['HTTP_REFERER'];
		$id = substr($uri,-1);
		$data['name'] = $this->input->post('name');
		$result = $this->pos->updateData($id, $data);
		if ($result) {
			redirect('Pos/index');
		}
		else{
			redirect('Pos/edit');
		}
	}

}
