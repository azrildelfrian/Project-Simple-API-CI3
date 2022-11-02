<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Task extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('task_model');
    }

    public function tasking_post(){

        $data = $this->post();

        $success = $this->task_model->simpan($data);

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

    public function tasking_get(){
        $id = $this->get('id');

        $data = $this->task_model->detail($id);

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

    public function tasking_delete(){
        $id = $this->get('id');

        if($id){
            $success = $this->task_model->hapus($id);

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

        $success = $this->task_model->ubah($id, $data);

        $newData = $this->task_model->detail($id);

        $this->response( [
            'status' => true,
            'message' => 'Update Success',
            'data' => $newData
        ], 200 );
        
    }

    public function list_get(){
        $data = $this->task_model->list_data();

        $this->response( [
            'status' => true,
            'message' => 'List Success',
            'data' => $data
        ], 200 );
    }

}