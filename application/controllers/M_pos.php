<?php
/*时间：2017年8月15日*/
header("content-type:text/html;charset=utf-8");



class M_pos extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
		
	}

	
	public function index()
	{
		$this->load->view('M_pos/index');
	}

	public function add()
	{
		$this->load->view('M_pos/add_pos');
	}

	public function doadd()
	{
		if(isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$id=$_POST['id'];
			$data=array(
					'id'=>$id,
					'name'=>$name
			);
			$this->load->model('M_pos_model','pos');
			$data=$this->pos->addData('pos',$data);
			if($data)
			{
				$this->read();
			}
		}
	}


	public function edit()
	{
		if(isset($_POST['edit_submit']))
		{
			$id=$_POST['edit_submit'];
			$this->load->model('M_pos_model','pos');
			$data=$this->pos->find('pos','id',$id);
			if($data)
			{
				$this->load->vars("data",$data);
				$this->load->view('M_pos/edit_pos');
			}
		}
	}

	public function doedit()
	{
		if(isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$id=$_POST['id'];
			$this->load->model('M_pos_model','pos');
			$data=$this->pos->modifyData('pos',$id,$name);
			if($data)
			{
				$this->read();
			}
		}
	}

	public function exec()
	{
		if(isset($_POST['del_submit']))
		{
			$id=$_POST['del_submit'];
			$data=array(
					'id'=>$id
			);
			$this->load->model('M_pos_model','pos');
			$data=$this->pos->delData('pos',$data);
			if($data)
			{
				$this->read();
			}
		}

		if(isset($_POST['add_submit']))
		{
			$this->add();
		}

		if(isset($_POST['edit_submit']))
		{
			$this->edit();
		}
	}


	public function read()
	{
		$this->load->model('M_pos_model','pos');
		$data=$this->pos->read('pos');
		$this->load->vars("data",$data);
		$this->load->view('M_pos/index');
	}

}
