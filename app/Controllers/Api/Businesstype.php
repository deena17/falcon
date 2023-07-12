<?php

namespace App\Controllers\Api;

use App\Models\BusinessTypeModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Businesstype extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\BusinessTypeModel';

    public function index()
    {
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'BusinessType details',
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
        $model = new BusinessTypeModel();
        $data = $model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Business type not found');
        }
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new BusinessTypeModel();
        $data = [
            'type' => $this->request->getVar('type'),
            'display' => 'Y'
        ];
        $insert_id = $model->insert($data);
        if ($insert_id) {
            return $this->respondCreated($model->find($insert_id));
        } else {
            return $this->fail($model->errors(), 400);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new BusinessTypeModel();
        $id = $this->request->getVar('id');
        $data = [
            'type' => $this->request->getVar('type')
        ];
        $affected_row = $model->update($id, $data);
        if ($affected_row) {
            return $this->respond($model->find($id));
        } else {
            return $this->fail($model->errors(), 400);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new BusinessTypeModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = array(
                'status'   => 200,
                'messages' => array(
                    'success' => 'Business type successfully deleted'
                )
            );
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Business type not found');
        }
    }
}