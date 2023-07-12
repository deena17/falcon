<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Supplier extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\SupplierModel';

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No records found');
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
            return $this->failNotFound('Supplier not found');
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
            'vendor_code' => $this->request->getVar('vendor_code'),
            'office_number' => $this->request->getVar('office_number'),
            'fax_number' => $this->request->getVar('fax_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'zipcode' => $this->request->getVar('zipcode'),
            'website' => $this->request->getVar('website'),
        ];
        $insert_id = $this->model->insert($data);
        if ($insert_id) {
            return $this->respondCreated($this->model->find($insert_id));
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
        $json = $this->request->getJSON();
        $data = [
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'vendor_code' => $this->request->getVar('vendor_code'),
            'office_number' => $this->request->getVar('office_number'),
            'fax_number' => $this->request->getVar('fax_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'zipcode' => $this->request->getVar('zipcode'),
            'website' => $this->request->getVar('website'),
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
                    'success' => 'Supplier deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Supplier not found');
        }
    }
}