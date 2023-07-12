<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ContactModel;

class Contact extends ResourceController
{
    public function index()
    {
        $model = new ContactModel();
        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->fail('No records found');
        }
    }

    public function show($id = null)
    {
        $model = new ContactModel();
        $data = $model->find($id);
        if ($data) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Contact details retrived successfully',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'message' => 'Contact details not found with id=' . $id,
            ];
        }
        return $this->respond($response);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new ContactModel();
        $data = [
            'customer_id' => $this->request->getVar('customer_id'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'designation' => $this->request->getVar('designation'),
            'notes' => $this->request->getVar('notes')
        ];
        $id = $model->insert($data);
        if ($id) {
            return $this->respondCreated($model->find($id));
        } else {
            return $this->fail($model->errors());
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new ContactModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer_id'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'email' => $this->request->getVar('email'),
            'designation' => $this->request->getVar('designation'),
            'notes' => $this->request->getVar('notes')
        ];
        $affected_row = $model->update($id, $data);
        if ($affected_row) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Contact details updated successfully',
                'data' => $model->find($id)
            ];
        } else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $model->errors()
            ];
        }
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new ContactModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Customer details deleted successfully'
            ];
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'message' => 'Customer details not found with id=' . $id
            ];
        }
        $this->respondDeleted($response);
    }
}