<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    //defualte index page
    public function index()
    {
        $UserModel = new UserModel();

        $data['users'] = $UserModel->orderBy('id', 'DESC')->paginate(10);

        $data['pagination_link'] = $UserModel->pager;
        $data['page'] = "dashboard";

        return view('master', $data);
    }

    //delete user record
    public function delete($id)
    {
        $UserModel = new UserModel();

        $UserModel->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'User Data Deleted');

        $data['page'] = "/dashboard";

        return redirect()->to($data);
    }

    // show single user
    public function get_record($id = null)
    {
        $UserModel = new UserModel();

        $data['user_data'] = $UserModel->where('id', $id)->first();

        
        return view('edit_user', $data);
    }

    public function edit_validation()
    {
        helper(['form', 'url']);

        $error = $this->validate([

            //    'userfile' => ['uploaded[userfile]',
            //                 'is_image[userfile]',
            //                 'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            //                 'max_size[userfile,100]',
            //                 'max_dims[userfile,1024,768]'],
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'mobileNo' => 'required',
        ]);

        $UserModel = new UserModel();

        $id = $this->request->getVar('id');

        if (!$error) {
            $data['user_data'] = $UserModel->where('id', $id)->first();
            $data['error'] = $this->validator;
            echo view('edit_data', $data);
        } else {
            $file = $this->request->getFile('userfile');
            if ($file != "") {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newname = $file->getRandomName();
                    $oldprofile = $this->request->getPost('oldprofile');
                    $profilefile = 'uploads/profile/' . $oldprofile;
                    if (file_exists($profilefile) && !empty($oldprofile)) {
                        unlink($profilefile);
                    }
                    $file->move('uploads/profile/', $newname);
                }
            } else {
                $newname = $this->request->getPost('oldprofile');
            }
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'mobileNo' => $this->request->getVar('mobileNo'),
                'profile_pic' =>$newname
            ];

            $UserModel->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');
            return redirect()->to('/dashboard');
        }

        // }
    }

}
