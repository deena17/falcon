<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Printing extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\PrintingModel';

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
            return $this->failNotFound('Machine details not found');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'main_servo_driver_model' => $this->request->getVar('main_servo_driver_model'),
            'main_servo_motor_model' => $this->request->getVar('main_servo_motor_model'),
            'plc_input_model' => $this->request->getVar('plc_input_model'),
            'plc_output_model' => $this->request->getVar('plc_output_model'),
            'display_model' => $this->request->getVar('display_model'),
            'smps' => $this->request->getVar('smps'),
            'pallet_model' => $this->request->getVar('pallet_model'),
            'piston_model' => $this->request->getVar('piston_model'),
            'relay_board' => $this->request->getVar('relay_board'),
            'cylinder_model' => $this->request->getVar('cylinder_model'),
            'placer_cure_type' => $this->request->getVar('placer_cure_type'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model_id')

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
            'main_servo_driver_model' => $this->request->getVar('main_servo_driver_model'),
            'main_servo_motor_model' => $this->request->getVar('main_servo_motor_model'),
            'plc_input_model' => $this->request->getVar('plc_input_model'),
            'plc_output_model' => $this->request->getVar('plc_output_model'),
            'display_model' => $this->request->getVar('display_model'),
            'smps' => $this->request->getVar('smps'),
            'pallet_model' => $this->request->getVar('pallet_model'),
            'piston_model' => $this->request->getVar('piston_model'),
            'relay_board' => $this->request->getVar('relay_board'),
            'cylinder_model' => $this->request->getVar('cylinder_model'),
            'placer_cure_type' => $this->request->getVar('placer_cure_type'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model_id')
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
                    'success' => 'Machine details deleted successfully'
                ]
            ];
            $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Machine details not found');
        }
    }
}