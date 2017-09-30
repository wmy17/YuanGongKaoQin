<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 8:42
 */
class Edu extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Edu_model','edu');
		$this->load->helper(array('url','form'));
	}
	//加载视图,分页
	public function index(){
		$data = $this->edu->read();
		$this->load->vars('data',$data);
		$this->load->view('Edu/index');
	}

	//添加数据
	public function add(){
		$this->load->view('Edu/add');
	}

	//执行添加数据
	public function doadd(){
		$data['name'] = $this->input->post('name');
		$id = $this->edu->addData($data);
		if($id){
			redirect('Edu/index');
		}
	}

	//删除数据
	public function del(){
		$id = $this->uri->segment(3);//获取id值
		if($this->edu->delData($id)){//传递给删除数据的方法
			redirect('Edu/index');
		}
	}
	//修改数据
	public function edit(){
		$id = $this->uri->segment(3);//获取id值
		$data = $this->edu->find($id);
		$this->load->vars('data', $data);
		$this->load->view('Edu/edit');
	}
	//执行修改信息
	public function doedit(){
		$uri = $_SERVER['HTTP_REFERER'];
		$id = substr($uri,-1);
		$data['name'] = $this->input->post('name');
		$result = $this->edu->updateData($id, $data);
		if ($result) {
			redirect('Edu/index');
		}else{
			redirect('Edu/edit');
		}
	}
}