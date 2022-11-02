<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Student extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('student_model');
    }

    public function index_post(){

        $data = $this->post();

        $success = $this->student_model->simpan($data);

        if($success){
            $this->response( [
                'status' => true,
                'message' => 'Insert Success',
                'data' => $data
            ], 200 );
        }else{
            $this->response( [
                'status' => false,
                'message' => 'Insert Failed'
            ], 400 );
        }

    }

    public function index_get(){
        $id = $this->get('id');

        $data = $this->student_model->detail($id);

        if($data){
            $this->response( [
                'status' => true,
                'message' => 'Get Detail Success',
                'data' => $data
            ], 200 );
        }else{
            $this->response( [
                'status' => false,
                'message' => 'Failed get detail with id = '.$id,
            ], 400 );
        }
        
    }

    public function index_delete(){
        $id = $this->get('id');

        if($id){
            $success = $this->student_model->hapus($id);

            if($success){
                $this->response( [
                    'status' => true,
                    'message' => 'Delete Success'
                ], 200 );
            }else{
                $this->response( [
                    'status' => false,
                    'message' => 'Delete Failed'
                ], 400 );
            }
        } else{
            $this->response( [
                'status' => false,
                'message' => 'Undenified'
            ], 400 );
        }
        

    }

    public function update_post(){
        $id = $this->get('id');
        $data = $this->post();

        $success = $this->student_model->ubah($id, $data);

        $newData = $this->student_model->detail($id);

        $this->response( [
            'status' => true,
            'message' => 'Update Success',
            'data' => $newData
        ], 200 );
        
    }

    public function list_get(){
        $page = $this->get('page');
        $per_page = $this->get('per-page');
        $data = $this->student_model->list_data($page, $per_page);

        $this->response( [
            'status' => true,
            'message' => 'List Success',
            'data' => $data
        ], 200 );
    }


}