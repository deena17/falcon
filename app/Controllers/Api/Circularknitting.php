<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Circularknitting extends ResourceController
{

    use ResponseTrait;

    protected $modelName = 'App\Models\CircularKnittingModel';

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
            return $this->failNotFound('Records not found');
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
            'dia' => $this->request->getVar('dia'),
            'guage' => $this->request->getVar('guage'),
            'number_of_feeders' => $this->request->getVar('number_of_feeders'),
            'main_motor_model' => $this->request->getVar('main_motor_model'),
            'main_driver_model' => $this->request->getVar('main_driver_model'),
            'control_panel_model' => $this->request->getVar('control_panel_model'),
            'take_up_type' => $this->request->getVar('take_up_type'),
            'storage_type' => $this->request->getVar('storage_type'),
            'quality_wheel' => $this->request->getVar('quality_wheel'),
            'storage_belt_size' => $this->request->getVar('storage_belt_size'),
            'main_motor_belt_size' => $this->request->getVar('main_motor_belt_size'),
            'quality_wheel_gear_type' => $this->request->getVar('quality_wheel_gear_type'),
            'quality_wheel_belt_size' => $this->request->getVar('quality_wheel_belt_size'),
            'tools_and_accessories' => $this->request->getVar('tools_and_accessories'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),

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
            'dia' => $this->request->getVar('dia'),
            'guage' => $this->request->getVar('guage'),
            'number_of_feeders' => $this->request->getVar('number_of_feeders'),
            'main_motor_model' => $this->request->getVar('main_motor_model'),
            'main_driver_model' => $this->request->getVar('main_driver_model'),
            'control_panel_model' => $this->request->getVar('control_panel_model'),
            'take_up_type' => $this->request->getVar('take_up_type'),
            'storage_type' => $this->request->getVar('storage_type'),
            'quality_wheel' => $this->request->getVar('quality_wheel'),
            'storage_belt_size' => $this->request->getVar('storage_belt_size'),
            'main_motor_belt_size' => $this->request->getVar('main_motor_belt_size'),
            'quality_wheel_gear_type' => $this->request->getVar('quality_wheel_gear_type'),
            'quality_wheel_belt_size' => $this->request->getVar('quality_wheel_belt_size'),
            'tools_and_accessories' => $this->request->getVar('tools_and_accessories'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
        ];
        $afftected_row = $this->model->update($id, $data);
        if ($afftected_row) {
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
                    'success' => 'Machine details deleted successfully'
                ]
            ];
            $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No record found');
        }
    }
}