<?php
/*
谢雅龙PHP
时间$date;
*/

header("content-type:text/html;charset=utf-8");

class Manager extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		session_start();
	}
	
	public function index()
	{
		$this->load->view('public/header');
		$this->load->view('Manager/index');
		$this->load->view('public/footer');
	}
	
	public function login()
	{
		$this->load->view('Manager/login');
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
			
			$e_no=trim($_POST['e_no']);
			$e_pwd=trim($_POST['e_pwd']);
			$e_no=$this->stripCharacter($e_no);
			$e_pwd=$this->stripCharacter($e_pwd);
			$this->load->model('Manager_model','emo');
			$data=$this->emo->find('emo','e_no',$e_no);
			
			if($e_no == $data->e_no && $e_pwd == $data->e_pwd)
			{
				$_SESSION['e_no']=$e_no;
			
				$this->index();
			}
			else{				
				$this->load->view('Manager/login');
			}
		}
	}
	
	public function modify_pwd()
	{
		
		$this->load->view('public/header');
		$this->load->view('Manager/modify_pwd');
		$this->load->view('public/footer');
	}
	
	public function do_modify_pwd()
	{
		if(isset($_POST['submit']))
		{
			$e_no=$_POST['e_no'];
			
			$e_pwd=trim($_POST['e_pwd']);
			$e_pwd=$this->stripCharacter($e_pwd);
			$this->load->model('Manager_model','emo');
			//$where=$this->admin->where("name=$name");
			$data=$this->emo->modifyData('emo',$e_no,$e_pwd);
			if($data)
			{
				echo "<script>alert('密码修改成功!');</script>";
			}
		}
	}
	
	public function logout(){
		
		if(isset($_SESSION['e_no'])){
			session_destroy();
			setcookie(session_name(),'',1,'/');
			$this->load->view('Manager/login');
			$this->load->view('public/footer');
		}
	}
	
	public function show(){
		$empno = $_SESSION['e_no'];
		$this->load->model('Manager_model','show');
		$data = $this->show->find('att', 'empno', $empno);
		$this->load->vars('data', $data);
		$this->load->view('public/header');
		$this->load->view('Manager/show');
		$this->load->view('public/footer');
	}
	
	public function check(){	
		$this->load->view('public/header');
		$this->load->view('Manager/check');	
		$this->load->view('public/footer');
		$empno = $_SESSION['e_no'];
				
		 //上班打卡
		if(isset($_POST['work_submit'])){													
			$time = $_POST['check_time'];
			$time = date('Y-m-d H:i:s', $time);
			$H = explode(" ", $time);
			$H = explode(":", $H[1]);
				
			if($H[0] > 9){
				$s_status = 2;//迟到
				$this->load->model('Manager_model',work);
				$data = array('empno'=>$empno, 'work_time'=>$_POST['check_time'], 'start'=>$_POST['check_time'], 'end'=>0, 's_status'=>$s_status);
				$data = $this->work->add('att',$data);
				
				if($data){
					echo "<script>alert('打卡成功!你已迟到！');</script>";
					redirect('Manager/show');
				}
			}else{
				$s_status = 1;//上班
				$this->load->model('Manager_model',work);
				$data = array('empno'=>$empno, 'work_time'=>$_POST['check_time'], 'start'=>$_POST['check_time'], 'end'=>0, 's_status'=>$s_status);
				$data = $this->work->add('att',$data);
				if($data){
					echo "<script>alert('打卡成功!上班！');</script>";
					redirect('Manager/show');
				}
			}
			
		}
					//下班打卡
					if(isset($_POST['leave_submit'])){
						$time = $_POST['check_time'];
						$time = date('Y-m-d H:i:s', $time);
						$H = explode(" ", $time);
						$H = explode(":", $H[1]);
							
						if($H[0] < 18){
							$e_status = 2;//早退
							$this->load->model('Manager_model', leave);
								
							$data = $this->leave->modify('att',$end = $_POST['check_time'],'e_status',$e_status,$empno);
							if($data){
								echo "<script>alert('打卡成功!早退！');</script>";
								redirect('Manager/show');
							}
						}else{
							$e_status = 1;//下班
							$this->load->model('Manager_model', leave);
							$data = $this->leave->modify('att',$end = $_POST['check_time'],'e_status',$e_status,$empno);
						
							if($data){
								echo "<script>alert('打卡成功!下班');</script>";
								redirect('Manager/show');
								
							}
						}
					} 
								
	}
}
					

		
	
	
	
	
	
	
	
	
	

