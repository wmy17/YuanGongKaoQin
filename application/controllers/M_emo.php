<?php
/*时间：2017年8月15日*/
header("content-type:text/html;charset=utf-8");



class M_emo extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination','null','page');
	}

	
	
	public function index()
	{
		//$config['base_url']=base_url()."course/index";
		// 当配置文件默认在路径后加.html时使用
		
		$config['base_url']=site_url('M_emo/index');
		$this->load->model('M_emo_model','emo');
		$config['total_rows']=$this->emo->getTotalRow();
		$config['per_page']=4;
		$config['next_link']="下一页";
		$config['prev_link']="上一页";
		$config['next_tag_open']='<p>';
		$config['next_tag_close']='</p>';
		$config['cur_tag_open']='<p>';
		$config['cur_tag_close']='</p>';
		$config['prev_tag_open']='<p>';
		$config['prev_tag_close']='</p>';
		$config['num_tag_open']='<p>';
		$config['num_tag_close']='</p>';
		$offset=$this->uri->segment(3);
		//初始化分页类 并设置指定的值
		$this->page->initialize($config);
		
		
		$data=$this->emo->page_read($config['per_page'],$offset);
		//显示分页标签
		$this->load->vars('link',$this->page->create_links());
		$this->load->vars("data",$data);
		$this->load->view('M_emo/index');
	}

	public function add()
	{
		$this->load->model('M_emo_model','emo');
		$pos=$this->emo->read('pos');
		$dep=$this->emo->read('dep');
		$edu=$this->emo->read('edu');
		$data=array(
				'pos'=>$pos,
				'dep'=>$dep,
				'edu'=>$edu				
		);
		$this->load->vars("data",$data);
		$this->load->view('M_emo/add_emo');		
	}

	public function doadd()
	{
		if(isset($_POST['submit']))
		{
			$e_no=$_POST['empno'];
			$e_name=$_POST['name'];
			$e_pwd=$_POST['pwd'];
			$e_sex=$_POST['female'];
			$e_birth=$_POST['birth'];
			$e_birth=strtotime($e_birth);
			$e_pos=$_POST['pos'];
			$e_edu=$_POST['edu'];
			$e_dep=$_POST['dep'];
			$e_del=$_POST['phone'];
			$data=array(
					'e_id'=>"null",
					'e_no'=>$e_no,
					'e_name'=>$e_name,
					'e_pwd'=>$e_pwd,
					'e_sex'=>$e_sex,
					'e_birth'=>$e_birth,
					'e_pos'=>$e_pos,
					'e_edu'=>$e_edu,
					'e_dep'=>$e_dep,
					'e_del'=>$e_del
			);
			$this->load->model('M_emo_model','emo');
			$data=$this->emo->addData('emo',$data);
			if($data)
			{
				$this->read();
			}
		}
	}
    public function  detail()
    {
    	    $e_no=$_POST['detail_submit'];
    		$this->load->model('M_emo_model','emo');
    		$pos=$this->emo->read('pos');
    		$dep=$this->emo->read('dep');
    		$edu=$this->emo->read('edu');
    		$emo=$this->emo->find('emo','e_no',$e_no);
    		$data=array(
    				'pos'=>$pos,
    				'dep'=>$dep,
    				'edu'=>$edu,
    				'emo'=>$emo
    		);
    		$this->load->vars("data",$data);
    		$this->load->view('M_emo/detail');
    	
    }
    public function  show_dep()
    {
    	$this->load->model('M_emo_model','emo');
    	$caiw=$this->emo->find1('emo','e_dep','1');
    	$shic=$this->emo->find1('emo','e_dep','2');
    	$rens=$this->emo->find1('emo','e_dep','3');
    	$jis=$this->emo->find1('emo','e_dep','4');
    	$data=array(
    			'caiw'=>$caiw,
    			'shic'=>$shic,
    			'rens'=>$rens,
    			'jis'=>$jis
    	);
    	$this->load->vars("data",$data);
    	$this->load->view('M_emo/show_dep');
    }

	public function edit()
	{
		
			$e_no=$_POST['edit_submit'];
			$this->load->model('M_emo_model','emo');
			$pos=$this->emo->read('pos');
			$dep=$this->emo->read('dep');
			$edu=$this->emo->read('edu');
			$emo=$this->emo->find('emo','e_no',$e_no);
			$data=array(
					'pos'=>$pos,
					'dep'=>$dep,
					'edu'=>$edu,
					'emo'=>$emo
			);
			if($data)
			{
				$this->load->vars("data",$data);
				$this->load->view('M_emo/edit_emo');
			}
		
	}

	public function doedit()
	{
		if(isset($_POST['submit']))
		{
			$e_no=$_POST['empno'];
			$e_name=$_POST['name'];
			$e_pwd=$_POST['pwd'];
			$e_sex=$_POST['female'];
			$e_birth=$_POST['birth'];
			$e_birth=strtotime($e_birth);
			$e_pos=$_POST['pos'];
			$e_edu=$_POST['edu'];
			$e_dep=$_POST['dep'];
			$e_del=$_POST['phone'];
			$data=array(
					'e_pwd'=>$e_pwd,
					'e_sex'=>$e_sex,
					'e_birth'=>$e_birth,
					'e_pos'=>$e_pos,
					'e_edu'=>$e_edu,
					'e_dep'=>$e_dep,
					'e_del'=>$e_del
			);
			$this->load->model('M_emo_model','emo');
			$data=$this->emo->modifyData1('emo',$data,array('e_no'=>$e_no));
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
					'e_no'=>$id
			);
			$this->load->model('M_emo_model','emo');
			$data=$this->emo->delData('emo',$data);
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
		
		if(isset($_POST['detail_submit']))
		{
			$this->detail();
		}
		
		if(isset($_POST['show_dep_submit']))
		{
			$this->show_dep();
		}
	}


	public function read()
	{
		$this->load->model('M_emo_model','emo');
		$data=$this->emo->read('emo');
		$this->load->vars("data",$data);
		$this->index();
	}

}
