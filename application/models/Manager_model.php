<?php
/*
谢雅龙PHP
时间$date;
*/

header("content-type:text/html;charset=utf-8");

class Manager_model extends CI_Model{
	//模型的自动加载
	public function __construct(){
		parent::__construct();
	}
	
	
	public function find($tablename,$key,$value)//读取单条记录
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
	
	public function modifyData($tablename,$e_no,$e_pwd)
	{
		$sql="update $tablename set e_pwd='$e_pwd' where e_no='$e_no'";
		$data=$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	public function read($tablename){
		$data = $this->db->get($tablename);
		return  $data->result();
	}
	
	
	
	public function modify($tablename,$end,$key,$v,$empno)
	{
		$sql="update $tablename set end=$end,$key=$v where empno='$empno'";
		$data=$this->db->query($sql);
		//return $this->db->last_query($data);
		return $this->db->affected_rows();
		
	}
	
	public function add($tablename, $data=array()){
		$data = $this->db->insert($tablename,$data);
		return $this->db->insert_id();
	}
	
	
	
}





