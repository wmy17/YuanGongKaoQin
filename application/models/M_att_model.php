<?php
/*时间：2017年8月16日*/
header("content-type:text/html;charset=utf-8");



class M_att_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();

	}

	public function read($tablename,$tablename2='',$today='',$where='')//读取所有数据
	{
		if($where)
		{
			
			$time= strtotime($today);
			$time1=$time+86400;
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->join($tablename2," $tablename.empno = $tablename2.e_no");
			$data=$this->db->where(array("$tablename.work_time>="=>"$time","$tablename.work_time<="=>"$time1","$tablename.s_ststus"!='1'))  ->get();
			 return $data->result();
			//return $this->db->last_query();
		}
		elseif($tablename2){
			$time= strtotime($today);
			$time1=$time+86400;
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->join($tablename2," $tablename.e_no = $tablename2.empno");		 	
			$data=$this->db->where(array("$tablename2.work_time>="=>"$time","$tablename2.work_time<="=>"$time1"))->get();
			return $data->result();
		}
		else{
			$data=$this->db->get($tablename);
			return $data->result();
		}
	}


	public function find($tablename,$tablename2='',$today='',$key,$value,$start='',$end='')//读取单条记录
	{
	if($tablename2){
			$time= strtotime($today);
			$time1=$time+86400;
			$this->db->select('*');
			$this->db->from($tablename);
			$this->db->join($tablename2," $tablename.e_no = $tablename2.empno");		 	
			$data=$this->db->where(array("$tablename2.work_time>="=>"$time","$tablename2.work_time<="=>"$time1","$tablename2.$key="=>"$value"))->get();
			return $data->row();
		}
		else{
			$start=strtotime($start);
			$end=strtotime($end)+86400;
			$data=$this->db->where(array("$tablename.$key="=>"$value","$tablename.work_time >"=>"$start","$tablename.work_time< "=> "$end"))->get($tablename);
			
			return $data->result();
		}
		

	}
	public function find1($tablename,$key,$value)//读取单条记录
	{
		if(empty($key))
		{
			$sql="select * from {$tablename} limit 1";
		}
		else
		{
			$sql="select * from {$tablename} where {$key}='{$value}'";
		}
		$data=$this->db->query($sql);
		return $data->row();

	}

	

}