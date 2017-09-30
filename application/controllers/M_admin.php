<?php
/*时间：2017年8月12日*/
header("content-type:text/html;charset=utf-8");

class M_admin extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('M_admin_model','admin');
		$this->load->helper('url');
		session_start();
	}
	
	public function index()
	{
		$this->load->view('M_admin/index');
	}
	
	public function login()
	{
		$this->load->view('M_admin/login');
	}
	
	public function stripCharacter($value)
	{
		$value=str_replace("'","", $value);
		$value=str_replace('"',"", $value);
		$value=str_replace('#',"", $value);
		$value=str_replace('\\',"", $value);// 一个斜杠表示对其后的引号进行转译操作
		return $value;
	}
	
	public function check_login()
	{
		if(isset($_POST['submit']))
		{
			
			$name=trim($_POST['username']);
			$password=trim($_POST['password']);
			$name=$this->stripCharacter($name);
			$password=$this->stripCharacter($password);
			$this->load->model('M_admin_model','admin');
			$data=$this->admin->find('admin','name',$name);
			if($name==$data->name && $password==$data->pwd)
			{
				$_SESSION['name']=$name;
				
				$this->load->view('M_admin/index');
			}
			else{				
				$this->load->view('M_admin/login');
			}
		}
	}
	
	public function logout()
	{
		if(isset($_SESSION['name']));
		{
			session_destroy();//删除关于session所有文件及文件夹
			setcookie(session_name(),'',1,'/');
			$this->load->view('M_admin/login');
		}
	}
	
	public function modify_pwd()
	{
		$this->load->view('M_admin/modify_pwd');
	}
	
	public function do_modify_pwd()
	{
		if(isset($_POST['submit']))
		{
			$name=$_POST['name'];
			$password=trim($_POST['password']);
			$password=$this->stripCharacter($password);
			$this->load->model('M_admin_model','admin');
			//$where=$this->admin->where("name=$name");
			$data=$this->admin->modifyData('admin',$name,$password);
			if($data)
			{
				echo "<script>alert('密码修改成功!');</script>";
				
			}
		}
	}
	
	public function add()
	{
		$this->load->view('M_admin/add_emp');
	}
	
	public function doadd()
	{
	
	}
	public function del()
	{
	
	}
	
	public function edit()
	{
	
	}
	
	public function doedit()
	{
	
	}
	
	public function read()
	{
		$data=$this->admin->read('admin');
		$this->load->vars("data",$data);
		$this->load->view('Admin/index');
	}
	
	public function print_att()
	{
	
	}
}
