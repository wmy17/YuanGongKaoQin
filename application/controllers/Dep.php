<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 20:28
 */

class Dep extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dep_model','dep');
		$this->load->helper(array('url','form'));
		//$this->load->library('session');
		//$this->load->library('form_validation',null,'valid');
		//$this->load->library('pagination',null,'page');

	}
	//加载视图,分页
	public function index(){
		$data = $this->dep->read();
		$this->load->vars('data',$data);
		$this->load->view('Dep/index');
	}

	//添加数据
	public function add(){
		$this->load->view('Dep/add');
	}

	//执行添加数据
	public function doadd(){
		$data['name'] = $this->input->post('name');
		$id = $this->dep->addData($data);
		if($id){
			redirect('Dep/index');
		}
	}

	//删除数据
	public function del(){
		$id = $this->uri->segment(3);//获取id值
		if($this->dep->delData($id)){//传递给删除数据的方法
			redirect('Dep/index');
		}
	}
	//修改数据
	public function edit(){
		$id = $this->uri->segment(3);//获取id值
		$data = $this->dep->find($id);
		$this->load->vars('data', $data);
		$this->load->view('Dep/edit');
	}
	//执行修改信息
	public function doedit(){
		$uri = $_SERVER['HTTP_REFERER'];
		$id = substr($uri,-1);
		$data['name'] = $this->input->post('name');
		$result = $this->dep->updateData($id, $data);
		if ($result) {
			redirect('Dep/index');
		} else{
			redirect('Dep/edit');
		}
	}

}
