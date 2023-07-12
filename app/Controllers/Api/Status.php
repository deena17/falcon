<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Status extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\StatusModel';

    public function index()
    {
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Currency details',
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
            return $this->failNotFound('Status not found');
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
            'status' => $this->request->getVar('status')
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
            'status' => $this->request->getVar('status')
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
                    'success' => 'Status deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Status not found');
        }
    }
}