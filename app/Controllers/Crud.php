<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CrudModel;

class Crud extends BaseController
{
    public function index()
    {
        echo 'Hello Codeigniter 4';

        $crudModel = new CrudModel();

        $data['user_data'] = $crudModel->orderBy('id', 'DESC')->paginate(10);

        $data['pagination_link'] = $crudModel->pager;

        return view('crud_view', $data);
    }

    public function add()
    {
        return view('add_data');
    }

    public function add_validation()
    {
        helper(['form', 'url']);

        $error = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'gender' => 'required',
        ]);

        if (!$error) {
            echo view('add_data', [
                'error' => $this->validator,
            ]);
        } else {
            $crudModel = new CrudModel();

            $crudModel->save([
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
            ]);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Added');

            return $this->response->redirect(site_url('/crud'));
        }

    }

    // show single user
    public function fetch_single_data($id = null)
    {
        $crudModel = new CrudModel();

        $data['user_data'] = $crudModel->where('id', $id)->first();

        return view('edit_data', $data);
    }

    public function edit_validation()
    {
        helper(['form', 'url']);

        $error = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'gender' => 'required',
        ]);

        $crudModel = new CrudModel();

        $id = $this->request->getVar('id');

        if (!$error) {
            $data['user_data'] = $crudModel->where('id', $id)->first();
            $data['error'] = $this->validator;
            echo view('edit_data', $data);
        } else {
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'gender' => $this->request->getVar('gender'),
            ];

            $crudModel->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'User Data Updated');

            return $this->response->redirect(site_url('/crud'));
        }
    }

    public function delete($id)
    {
        $crudModel = new CrudModel();

        $crudModel->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'User Data Deleted');

        return $this->response->redirect(site_url('/crud'));
    }
}
