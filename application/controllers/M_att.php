<?php
/*时间：2017年8月16日*/
header("content-type:text/html;charset=utf-8");



class M_att extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('form_validation',null,'valid');
		$this->load->library('session');
		$this->load->library('pagination','null','page');
	}

	
	
	public function index()
	{

		//$config['base_url']=base_url()."course/index";
		// 当配置文件默认在路径后加.html时使用
		
		$config['base_url']=site_url('M_att/index');
		$this->load->model('M_att_model','att');
		$config['total_rows']=$this->att->getTotalRow();
		$config['per_page']=5;
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
		
		
		$data=$this->cou->read($config['per_page'],$offset);
		//显示分页标签
		$this->load->vars('link',$this->page->create_links());
		$this->load->vars("data",$data);
		
		$this->load->view('M_att/index');
	}


    public function pick()
    {
    	$this->load->model('M_att_model','att');
    	$today=date('Y-m-d',time());
    	$pick=$this->att->read('att','emo',$today,1); 
    	foreach ($pick as $v)
    	{
    		echo $v->e_status;    		
    	}
    		
    	$pos=$this->att->read('pos');
    	$dep=$this->att->read('dep');
    	$data=array(
    			'dep'=>$dep,
    			'pick'=>$pick,
    			'pos'=>$pos
    	);
    	var_dump($pick); die;
    		$this->load->vars("data",$data);
    		$this->load->view('M_att/pick_att');   	
    }

	public function  detail()
	{
		$e_no=$this->uri->segment(3);
		$this->load->model('M_att_model','att');
		$pos=$this->att->read('pos');
		$dep=$this->att->read('dep');
		$edu=$this->att->read('edu');
		$today=date('Y-m-d',time());		
		$att=$this->att->find('emo','att',$today,'empno',$e_no);
		$data=array(
				'pos'=>$pos,
				'dep'=>$dep,
				'edu'=>$edu,
				'att'=>$att
		);
		
		$this->load->vars("data",$data);
		$this->load->view('M_att/detail_att');
		 
	}
	
	public function  recently()
	{
		
		$this->load->view('M_att/recently_att');	
	}
	
	public function do_rec()
	{
		    $e_no=$this->uri->segment(3);
			$start=$this->input->post('start');
			$end=$this->input->post('end');
			$this->load->model('M_att_model','att');
			$emo=$this->att->find1('emo',"e_no",$e_no);
			$dep=$this->att->read('dep');
			$pos=$this->att->read('pos');
			$att=$this->att->find('att','','','empno',$e_no,$start,$end);
			
			$data=array(
					'emo'=>$emo,
					'att'=>$att,
					'dep'=>$dep,
					'pos'=>$pos
			);
			$this->load->vars("data",$data);
			$this->load->view('M_att/recently_att');
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




	public function read()
	{
		$this->load->model('M_att_model','att');
		$pos=$this->att->read('pos');
		$dep=$this->att->read('dep');
		$today=date('Y-m-d',time());		
		$att=$this->att->read('emo','att',$today);
		$data=array(
				'dep'=>$dep,				
				'att'=>$att,
				'pos'=>$pos
		);
		
		$this->load->vars("data",$data);
		$this->load->view('M_att/index');
	}

}
