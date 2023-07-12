<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Embroidery extends ResourceController
{

    use ResponseTrait;

    protected $modelName = 'App\Models\EmbroideryModel';

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
            'software' => $this->request->getVar('software'),
            'system_information' => $this->request->getVar('system_information'),
            'display_type' => $this->request->getVar('display_type'),
            'main_motor_drive' => $this->request->getVar('main_motor_drive'),
            'needle_bar_rotating_motor_drive' => $this->request->getVar('needle_bar_rotating_motor_drive'),
            'looper_up_down_motor_drive' => $this->request->getVar('looper_up_down_motor_drive'),
            'looper_gear_rotating_motor_drive' => $this->request->getVar('looper_gear_rotating_motor_drive'),
            'head_card' => $this->request->getVar('hear_card'),
            'main_servo_motor_model' => $this->request->getVar('main_servo_motor_model'),
            'head_board_model' => $this->request->getVar('head_board_model'),
            'trimming_motor_drive' => $this->request->getVar('trimming_motor_drive'),
            'mother_board' => $this->request->getVar('mother_board'),
            'power_card' => $this->request->getVar('power_card'),
            'single_sequence_card' => $this->request->getVar('single_sequence_card'),
            'dual_sequence_card' => $this->request->getVar('dual_sequence_card'),
            'quad_sequence_card' => $this->request->getVar('quad_sequence_card'),
            'xy_motor_drive' => $this->request->getVar('xy_motor_drive'),
            'tools_and_accessories' => $this->request->getVar('tools_and_accessories'),
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
        $json = $this->request->getJSON();
        $data = [
            'id' => $id,
            'software' => $this->request->getVar('software'),
            'system_information' => $this->request->getVar('system_information'),
            'display_type' => $this->request->getVar('display_type'),
            'main_motor_drive' => $this->request->getVar('main_motor_drive'),
            'needle_bar_rotating_motor_drive' => $this->request->getVar('needle_bar_rotating_motor_drive'),
            'looper_up_down_motor_drive' => $this->request->getVar('looper_up_down_motor_drive'),
            'looper_gear_rotating_motor_drive' => $this->request->getVar('looper_gear_rotating_motor_drive'),
            'head_card' => $this->request->getVar('hear_card'),
            'main_servo_motor_model' => $this->request->getVar('main_servo_motor_model'),
            'head_board_model' => $this->request->getVar('head_board_model'),
            'trimming_motor_drive' => $this->request->getVar('trimming_motor_drive'),
            'mother_board' => $this->request->getVar('mother_board'),
            'power_card' => $this->request->getVar('power_card'),
            'single_sequence_card' => $this->request->getVar('single_sequence_card'),
            'dual_sequence_card' => $this->request->getVar('dual_sequence_card'),
            'quad_sequence_card' => $this->request->getVar('quad_sequence_card'),
            'xy_motor_drive' => $this->request->getVar('xy_motor_drive'),
            'tools_and_accessories' => $this->request->getVar('tools_and_accessories'),
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
                    'success' => 'Embroidery machine details deleted successfully'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Records not found');
        }
    }
}