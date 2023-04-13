<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    /**
     * UserModel
     */
    private $userModel = '' ;

    private $seesion;

    public function __construct()
    {
        helper('form');
        $this->session = session();
        $this->userModel = new UserModel();       
    }

    public function index()
    {
        $data['users'] = $this->userModel->getUsers();
        $data['title'] = 'Users list';
        return view('user/index', $data);
    }

    // add user form
    public function create()
    {
        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('user/add', ['title' => 'Add a New User']);
        }

        $post = $this->request->getPost([
            'firstname', 
            'lastname',
            'phone',
            'email',
            'password',
            'confirm_password'
        ]);

        $rules = [
            'firstname'         => 'required|max_length[255]|min_length[3]',
            'lastname'          => 'required|max_length[255]|min_length[3]',
            'phone'             => 'required|max_length[255]|min_length[10]',
            'email'             => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]',
            'password'          => 'required|min_length[8]|max_length[255]',
            'confirm_password'  => 'matches[password]'
        ];

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validateData($post, $rules)) {
            // The validation fails, so returns the form.
            return view('user/add', ['title' => 'Add a New User']);
        }

        unset($post['confirm_password']);
        $postData = self::cleanRequestData($post);
        $postData['password'] = password_hash($postData['password'], PASSWORD_DEFAULT);
        
        $this->userModel->addUser($postData);
        
        $message = 'User created successfully';
        $this->setFlashMessage($message, 'success');

        return $this->response->redirect(base_url('/users-list'));
    }

    // show User by id
    public function edit($userId)
    {
        $data['user']   = $this->userModel->where('id', (int) $userId)->first();
        $data['title']  = 'Edit User';

        return view('user/edit', $data);
    }

    public function update()
    {
        $postData = $this->request->getPost([
            'firstname', 
            'lastname',
            'phone',
            'email',
        ]);

        $userId = (int) $this->request->getPost('user_id');

        $rules  = [
            'firstname' => 'required|max_length[255]|min_length[3]',
            'lastname'  => 'required|max_length[255]|min_length[3]',
            'phone'     => 'required|max_length[255]|min_length[10]',
            'email'     => 'required|min_length[4]|max_length[255]|valid_email',
        ];

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validateData($postData, $rules)) {
            // The validation fails, so returns the form.
            return view('user/edit', ['title' => 'Edit User']);
        }

        $this->userModel->updateUser(
            $userId, 
            self::cleanRequestData($postData)
        );

        $message = 'User profile updated successfully';
        $this->setFlashMessage($message, 'success');
        
        return $this->response->redirect(base_url('/users-list'));
    }

    // delete user
    public function delete($userId)
    {
        $data['user'] = $this->userModel->where('id', (int) $userId)->delete($userId);

        $message = 'User profile deleted successfully';
        $this->setFlashMessage($message, 'success');

        return $this->response->redirect(base_url('/users-list'));
    }    

    private static function cleanRequestData(array $postData): array
    {
        foreach($postData as $fieldName => &$fieldValue) {
            $fieldValue = \addslashes($fieldValue);
        }
        return $postData;
    }

    private function setFlashMessage(string $message, string $type): void
    {
        $this->session->setFlashdata(
            'msg', 
            ["message" => $message, "type" => $type]
        );
    }
}