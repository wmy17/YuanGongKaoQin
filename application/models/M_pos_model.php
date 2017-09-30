<?php
/*时间：2017年8月15日*/
header("content-type:text/html;charset=utf-8");



class M_pos_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();

	}

	public function read($tablename)//读取所有数据
	{
		$data=$this->db->get($tablename);
		return $data->result();
	}

	public function addData($tablename,$data=array())
	{
		$data=$this->db->insert($tablename,$data);
		return $this->db->insert_id();
	}

	public function delData($tablename,$data)
	{
		$data=$this->db->delete($tablename,$data);
		return $this->db->affected_rows();

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

	public function modifyData($tablename,$id,$name)
	{
		$sql="update $tablename set name='$name' where id='$id'";
		$data=$this->db->query($sql);
		return $this->db->affected_rows();
	}



	public function where($where='',$operator='')
	{
		if(empty($where))
		{
			throw new Exception('where condition empty!');
		}
		if(is_string($where))//传递进来的是字符串
		{
			$this->where = 'where'.$where;
		}
		if(is_array($where))
		{
			$keys = array_keys($where);//读取数组键名形成新的一维数组
			$values = array_values($where);
			if(count($keys) == 1)
			{
				$this->where = "where {$keys[0]} ='{$values[0]}'";
			}
			else
			{
				$sqlStr= "where";
				for($i=0;$i<count($keys);$i++)
				{
					$sqlStr.= " {$keys[$i]} = '{$values[$i]}' {$operator}";
				}
				$sqlStr = substr($sqlStr, 0,-3);
				$this->where = $sqlStr;
			}
		}
		return $this;
	}


}