<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class FlatKnitting extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\FlatKnittingModel';

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
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'bed_width' => $this->request->getVar('bed_width'),
            'number_of_system' => $this->request->getVar('number_of_system'),
            'number_of_heads' => $this->request->getVar('number_of_heads'),
            'control_system' => $this->request->getVar('control_system'),
            'display_type' => $this->request->getVar('display_type'),
            'smps_type' => $this->request->getVar('smps_type'),
            'main_roller_driver_type' => $this->request->getVar('main_roller_driver_type'),
            'tools_and_accessories' => $this->request->getVar('tools_and_accessories'),
            'main_servo_motor_model' => $this->request->getVar('main_servo_motor_model'),
            'main_roller_driver_model' => $this->request->getVar('main_roller_driver_model'),
            'racing_motor_drive_model' => $this->request->getVar('racing_motor_drive_model'),
            'racing_servo_motor_model' => $this->request->getVar('racing_servo_motor_model'),
            'mother_board_model' => $this->request->getVar('mother_board_model'),
            'head_board_model' => $this->request->getVar('head_board_model'),
            'head_base_board_model' => $this->request->getVar('head_base_board_model'),
            'display_board' => $this->request->getVar('display_board'),
            'invertor_model' => $this->request->getVar('invertor_model'),
            'machine_configuration' => $this->request->getVar('machine_configuration'),
            'system_information' => $this->request->getVar('system_information'),
            'hardware' => $this->request->getVar('hardware'),
            'master' => $this->request->getVar('master'),
            'compile' => $this->request->getVar('compile'),
            'slave_version' => $this->request->getVar('slave_version'),
            'head1' => $this->request->getVar('head1'),
            'head2' => $this->request->getVar('head2'),
            'head3' => $this->request->getVar('head3'),
            'upper' => $this->request->getVar('upper'),
            'middle' => $this->request->getVar('middle'),
            'left_down' => $this->request->getVar('left_down'),
            'right_down' => $this->request->getVar('right_down'),
            'middle_down' => $this->request->getVar('middle_down'),
            'type' => $this->request->getVar('type'),
            'hardware_version' => $this->request->getVar('hardware_version'),
            'boot_loader_version' => $this->request->getVar('boot_loader_version'),
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
            'bed_width' => $this->request->getVar('bed_width'),
            'number_of_system' => $this->request->getVar('number_of_system'),
            'number_of_heads' => $this->request->getVar('number_of_heads'),
            'control_system' => $this->request->getVar('control_system'),
            'display_type' => $this->request->getVar('display_type'),
            'smps_type' => $this->request->getVar('smps_type'),
            'main_roller_driver_type' => $this->request->getVar('main_roller_driver_type'),
            'tools_and_accessories' => $this->request->getVar('tools_and_accessories'),
            'main_servo_motor_model' => $this->request->getVar('main_servo_motor_model'),
            'main_roller_driver_model' => $this->request->getVar('main_roller_driver_model'),
            'racing_motor_drive_model' => $this->request->getVar('racing_motor_drive_model'),
            'racing_servo_motor_model' => $this->request->getVar('racing_servo_motor_model'),
            'mother_board_model' => $this->request->getVar('mother_board_model'),
            'head_board_model' => $this->request->getVar('head_board_model'),
            'head_base_board_model' => $this->request->getVar('head_base_board_model'),
            'display_board' => $this->request->getVar('display_board'),
            'invertor_model' => $this->request->getVar('invertor_model'),
            'machine_configuration' => $this->request->getVar('machine_configuration'),
            'system_information' => $this->request->getVar('system_information'),
            'hardware' => $this->request->getVar('hardware'),
            'master' => $this->request->getVar('master'),
            'compile' => $this->request->getVar('compile'),
            'slave_version' => $this->request->getVar('slave_version'),
            'head1' => $this->request->getVar('head1'),
            'head2' => $this->request->getVar('head2'),
            'head3' => $this->request->getVar('head3'),
            'upper' => $this->request->getVar('upper'),
            'middle' => $this->request->getVar('middle'),
            'left_down' => $this->request->getVar('left_down'),
            'right_down' => $this->request->getVar('right_down'),
            'middle_down' => $this->request->getVar('middle_down'),
            'type' => $this->request->getVar('type'),
            'hardware_version' => $this->request->getVar('hardware_version'),
            'boot_loader_version' => $this->request->getVar('boot_loader_version'),
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
                    'success' => 'Flat Knitting machine details deleted successfully'
                ]
            ];
            $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Machine details not found');
        }
    }
}