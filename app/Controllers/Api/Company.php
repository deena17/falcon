<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Company extends ResourceController
{

    use ResponseTrait;

    protected $modelName = 'App\Models\CompanyModel';

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            return $this->respond($this->model->findAll());
        } else {
            return $this->failNotFound('Records not found');
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Company details not found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'landline' => $this->request->getVar('landline'),
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'email' => $this->request->getVar('email'),
            'website' => $this->request->getVar('website'),
            'pan_number' => $this->request->getVar('pan_number'),
            'gst_number' => $this->request->getVar('gst_number'),
            'logo' => $this->request->getVar('logo'),
            'is_active' => $this->request->getVar('is_active')
        ];
        $id = $this->model->insert($data);
        if ($id) {
            return $this->respondCreated($this->model->find($id));
        } else {
            return $this->fail($this->model->errors(), 400);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'landline' => $this->request->getVar('landline'),
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'email' => $this->request->getVar('email'),
            'website' => $this->request->getVar('website'),
            'pan_number' => $this->request->getVar('pan_number'),
            'gst_number' => $this->request->getVar('gst_number'),
            'logo' => $this->request->getVar('logo'),
            'is_active' => $this->request->getVar('is_active')
        ];
        $affected_row = $this->model->update($id, $data);
        if ($affected_row) {
            return $this->respond($this->model->find($id));
        } else {
            return $this->fail($this->model->errors(), 400);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'message' => [
                    'success' => 'Company details deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Company details not found');
        }
    }
}