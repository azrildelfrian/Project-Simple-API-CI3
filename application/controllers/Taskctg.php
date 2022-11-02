<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Taskctg extends RestController{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('taskctg_model');
    }

    public function categories_post(){

        $data = $this->post();

        $success = $this->taskctg_model->simpan($data);

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

    public function categories_get(){
        $id = $this->get('id');

        $data = $this->taskctg_model->detail($id);

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

    public function categories_delete(){
        $id = $this->get('id');

        if($id){
            $success = $this->taskctg_model->hapus($id);

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

        $success = $this->taskctg_model->ubah($id, $data);

        $newData = $this->taskctg_model->detail($id);

        $this->response( [
            'status' => true,
            'message' => 'Update Success',
            'data' => $newData
        ], 200 );
        
    }

    public function list_get(){
        $data = $this->taskctg_model->list_data();

        $this->response( [
            'status' => true,
            'message' => 'List Success',
            'data' => $data
        ], 200 );
    }

}