<?php
/**
 * Created by PhpStorm.
 * User: whdn1
 * Date: 2017/8/17
 * Time: 8:44
 */


class Edu_model extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //读取查询信息
    public function read(){
        $data = $this->db->get('edu');
        return $data->result();
    }
    //添加信息
    public function addData($data = array()){
        if($this->db->insert('edu',$data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    //删除信息
    public function delData($id){
        return $this->db->delete('edu',array('id'=>$id));
    }
    //读取单条数据
    public function find($id){
        $data = $this->db->where('id',$id)->get('edu');
        return $data->row_array();
    }
    //更新信息
    public function updateData($id,$data = array()){
        return $this->db->where('id',$id)->update('edu',$data);
    }
    //获取总行数
    public function getTotalRow(){
        return $this->db->count_all('edu');
    }

}