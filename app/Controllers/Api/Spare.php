<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Spare extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\SpareModel';

    public function index()
    {
        $data = $this->model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No record found');
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
            return $this->failNotFound('Spares not found');
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
            'item_code' => $this->request->getVar('item_code'),
            'item_name' => $this->request->getVar('item_name'),
            'description' => $this->request->getVar('description'),
            'item_image' => $this->request->getVar('item_image'),
            'basic_unit' => $this->request->getVar('basic_unit'),
            'unit_rate' => $this->request->getVar('unit_rate'),
            'rack_number' => $this->request->getVar('rack_number'),
            'shelf_number' => $this->request->getVar('shelf_number'),
            'critical_spare' => $this->request->getVar('critical_spare'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model')
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
            'id' => $id,
            'item_code' => $this->request->getVar('item_code'),
            'item_name' => $this->request->getVar('item_name'),
            'description' => $this->request->getVar('description'),
            'item_image' => $this->request->getVar('item_image'),
            'basic_unit' => $this->request->getVar('basic_unit'),
            'unit_rate' => $this->request->getVar('unit_rate'),
            'rack_number' => $this->request->getVar('rack_number'),
            'shelf_number' => $this->request->getVar('shelf_number'),
            'critical_spare' => $this->request->getVar('critical_spare'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model')
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
                    'success' => 'Spare deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Spare not found');
        }
    }
}