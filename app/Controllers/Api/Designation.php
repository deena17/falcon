<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Designation extends ResourceController
{
    use ResponseTrait;
    protected $modelName = 'App\Models\DesignationModel';

    public function index()
    {
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Department details',
            'data' => $this->model->findAll(),
        ];
        return $this->respond($response, 200);
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
            return $this->failNotFound('Designation not found');
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
            'designation' => $this->request->getVar('designation')
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
        $data = [
            'designation' => $this->request->getVar('designation')
        ];
        $affected_row = $this->model->update($id, $data);
        if ($affected_row) {
            return $this->respond($this->model->find($affected_row));
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
                    'status' => 'Designation deleted successfully',
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Designation not found');
        }
    }
}