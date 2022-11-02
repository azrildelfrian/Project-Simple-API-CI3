<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class User extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get( 'id' );

        if ( $id === null )
        {
            // Check if the users data store contains users
            if ( $users )
            {
                // Set the response and exit
                $this->response( $users, 200 );
            }
            else
            {
                // Set the response and exit
                $this->response( [
                    'status' => false,
                    'message' => 'No users were found'
                ], 404 );
            }
        }
        else
        {
            if ( array_key_exists( $id, $users ) )
            {
                $this->response( $users[$id], 200 );
            }
            else
            {
                $this->response( [
                    'status' => false,
                    'message' => 'No such user found',
                    'meta' => ['page' => 1, 'per-page' => 5]
                ], 404 );
            }
        }
    }

    public function user_post(){
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];
        
        $post_request = $this->post();

        $users[] =  $post_request;

        $this->response( [
            'status' => false,
            'message' => $users
        ], 200 );
    }

    public function user_delete(){
        $users = [
            ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
            ['id' => 2, 'name' => 'Johny', 'email' => 'johny@example.com'],
        ];
        
        unset($users[count($users)-1]);

        $this->response( [
            'status' => false,
            'message' => $users
        ], 200 );
    }
}