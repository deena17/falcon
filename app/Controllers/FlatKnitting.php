<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;

class FlatKnitting extends ResourceController
{
    protected $modelName = 'App\Models\FlatKnittingModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if($data){
            return $this->respond($data);
        }else{
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
        $json = $this->request->getJSON();
        $data = [
            'bed_width' => $json->bed_width,
            'number_of_system' => $json->number_of_system,
            'number_of_heads' => $json->number_of_heads,
            'control_system' => $json->control_system,
            'display_type' => $json->display_type,
            'smps_type' => $json->smps_type,
            'main_roller_driver_type' => $json->main_roller_driver_type,
            'tools_and_accessories' => $json->tools_and_accessories,
            'main_servo_motor_model' => $json->main_servo_motor_model,
            'main_roller_driver_model' => $json->main_roller_driver_model,
            'racing_motor_drive_model' => $json->racing_motor_drive_model,
            'racing_servo_motor_model' => $json->racing_servo_motor_model,
            'mother_board_model' => $json->mother_board_model,
            'head_board_model' => $json->head_board_model,
            'head_base_board_model' => $json->head_base_board_model,
            'display_board' => $json->display_board,
            'invertor_model' => $json->invertor_model,
            'machine_configuration' => $json->machine_configuration,
            'system_information' => $json->system_information,
            'hardware' => $json->hardware,
            'master' => $json->master,
            'compile' => $json->compile,
            'slave_version' => $json->slave_version,
            'head1' => $json->head1,
            'head2' => $json->head2,
            'head3' => $json->head3,
            'upper' => $json->upper,
            'middle' => $json->middle,
            'left_down' => $json->left_down,
            'right_down' => $json->right_down,
            'middle_down' => $json->middle_down,
            'type' => $json->type,
            'hardware_version' => $json->hardware_version,
            'boot_loader_version' => $json->boot_loader_version,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model

        ];
        $insert_id = $this->model->insert($data);
        if($insert_id){
            return $this->respondCreated($this->model->find($insert_id));
        }
        else{
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
            'bed_width' => $json->bed_width,
            'number_of_system' => $json->number_of_system,
            'number_of_heads' => $json->number_of_heads,
            'control_system' => $json->control_system,
            'display_type' => $json->display_type,
            'smps_type' => $json->smps_type,
            'main_roller_driver_type' => $json->main_roller_driver_type,
            'tools_and_accessories' => $json->tools_and_accessories,
            'main_servo_motor_model' => $json->main_servo_motor_model,
            'main_roller_driver_model' => $json->main_roller_driver_model,
            'racing_motor_drive_model' => $json->racing_motor_drive_model,
            'racing_servo_motor_model' => $json->racing_servo_motor_model,
            'mother_board_model' => $json->mother_board_model,
            'head_board_model' => $json->head_board_model,
            'head_base_board_model' => $json->head_base_board_model,
            'display_board' => $json->display_board,
            'invertor_model' => $json->invertor_model,
            'machine_configuration' => $json->machine_configuration,
            'system_information' => $json->system_information,
            'hardware' => $json->hardware,
            'master' => $json->master,
            'compile' => $json->compile,
            'slave_version' => $json->slave_version,
            'head1' => $json->head1,
            'head2' => $json->head2,
            'head3' => $json->head3,
            'upper' => $json->upper,
            'middle' => $json->middle,
            'left_down' => $json->left_down,
            'right_down' => $json->right_down,
            'middle_down' => $json->middle_down,
            'type' => $json->type,
            'hardware_version' => $json->hardware_version,
            'boot_loader_version' => $json->boot_loader_version,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model
        ];
        $affected_row = $this->model->update($id, $data);
        if($affected_row){
            return $this->respond($this->model->find($id));
        }else{
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
        if($data){
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'message' => [
                        'success' => 'Flat Knitting machine details deleted successfully'
                    ]
                ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Machine details not found');
        }
    }
}
