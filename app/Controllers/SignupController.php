<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('signup', $data);

    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'mobileNo' => 'required|min_length[10]|max_length[10]|is_unique[users.mobileNo]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]',
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
           
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'mobileNo' => $this->request->getVar('mobileNo'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $userModel->save($data);
            return redirect()->to('/signin');
        } else {
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }

    }

}
