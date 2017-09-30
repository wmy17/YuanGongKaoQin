<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 20:37
 */


class Dep_model extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //读取查询信息
    public function read(){
        $data = $this->db->get('dep');
        return $data->result();
    }
    //添加信息
    public function addData($data = array()){
        if($this->db->insert('dep',$data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    //删除信息
    public function delData($id){
        return $this->db->delete('dep',array('id'=>$id));
    }
    //读取单条数据
    public function find($id){
        $data = $this->db->where('id',$id)->get('dep');
        return $data->row_array();
    }
    //更新信息
    public function updateData($id,$data = array()){
        return $this->db->where('id',$id)->update('dep',$data);
    }
    //获取总行数
    public function getTotalRow(){
        return $this->db->count_all('dep');
    }

}