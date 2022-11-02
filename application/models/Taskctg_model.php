<?php

class Taskctg_model extends CI_Model{

    public function simpan($data){
        $this->db->insert('task_categories',$data);

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }

    }

    public function detail($id){
        $this->db->select('*');
        $this->db->from('task_categories');
        $this->db->where('id', $id);

        // SELECT * FROM taskctg WHERE id=1

        $get = $this->db->get();
        if($get->num_rows() !=0){
            return $get->row_object();
        }else{
            return null;
        }
    }

    public function hapus($id){
        $this->db->delete('task_categories',['id' => $id]);

        // SELECT * FROM taskctg WHERE id=1

        return $this->db->affected_rows() ? true : false;

        // if($this->db->affected_rows()){
        //     return true;
        // }else{
        //     return false;
        // }
    }

    public function ubah($id, $data){
        $this->db->where('id', $id);
        $this->db->update('task_categories', $data);
        return $this->db->affected_rows() ? true : false;
    }

    public function list_data(){
        $this->db->select('*');
        $this->db->from('task_categories');

        $get = $this->db->get();

        if($get->num_rows() > 0){
            return $get->result();
        }else{
            return [];
        }
    }
}