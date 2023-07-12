<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;

class Embroidery extends ResourceController{

    protected $modelName = 'App\Models\EmbroideryModel';
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
            'software' => $json->software,
            'system_information' => $json->system_information,
            'display_type' => $json->display_type,
            'main_motor_drive' => $json->main_motor_drive,
            'needle_bar_rotating_motor_drive' => $json->needle_bar_rotating_motor_drive,
            'looper_up_down_motor_drive' => $json->looper_up_down_motor_drive,
            'looper_gear_rotating_motor_drive' => $json->looper_gear_rotating_motor_drive,
            'head_card' => $json->hear_card,
            'main_servo_motor_model' => $json->main_servo_motor_model,
            'head_board_model' => $json->head_board_model,
            'trimming_motor_drive' => $json->trimming_motor_drive,
            'mother_board' => $json->mother_board,
            'power_card' => $json->power_card,
            'single_sequence_card' => $json->single_sequence_card,
            'dual_sequence_card' => $json->dual_sequence_card,
            'quad_sequence_card' => $json->quad_sequence_card,
            'xy_motor_drive' => $json->xy_motor_drive,
            'tools_and_accessories' => $json->tools_and_accessories,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model_id

        ];
        $insert_id = $this->model->insert($data);
        if($insert_id){
            return $this->respondCreated($this->model->find($insert_id));
        }else{
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
            'software' => $json->software,
            'system_information' => $json->system_information,
            'display_type' => $json->display_type,
            'main_motor_drive' => $json->main_motor_drive,
            'needle_bar_rotating_motor_drive' => $json->needle_bar_rotating_motor_drive,
            'looper_up_down_motor_drive' => $json->looper_up_down_motor_drive,
            'looper_gear_rotating_motor_drive' => $json->looper_gear_rotating_motor_drive,
            'head_card' => $json->hear_card,
            'main_servo_motor_model' => $json->main_servo_motor_model,
            'head_board_model' => $json->head_board_model,
            'trimming_motor_drive' => $json->trimming_motor_drive,
            'mother_board' => $json->mother_board,
            'power_card' => $json->power_card,
            'single_sequence_card' => $json->single_sequence_card,
            'dual_sequence_card' => $json->dual_sequence_card,
            'quad_sequence_card' => $json->quad_sequence_card,
            'xy_motor_drive' => $json->xy_motor_drive,
            'tools_and_accessories' => $json->tools_and_accessories,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model_id
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
                        'success' => 'Embroidery machine details deleted successfully'
                    ]
                ];
            return $this->respond($response);
        }
        else{
            return $this->failNotFound('Machine details not found');
        }
    }
}
