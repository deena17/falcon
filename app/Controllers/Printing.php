<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;

class Printing extends ResourceController
{
    protected $modelName = 'App\Models\PrintingModel';
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
        }
        else{
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
        $json = $this->request->getJSON();
        $data = [
            'main_servo_driver_model' => $json->main_servo_driver_model,
            'main_servo_motor_model' => $json->main_servo_motor_model,
            'plc_input_model' => $json->plc_input_model,
            'plc_output_model' => $json->plc_output_model,
            'display_model' => $json->display_model,
            'smps' => $json->smps,
            'pallet_model' => $json->pallet_model,
            'piston_model' => $json->piston_model,
            'relay_board' => $json->relay_board,
            'cylinder_model' => $json->cylinder_model,
            'placer_cure_type' => $json->placer_cure_type,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model_id

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
            'main_servo_driver_model' => $json->main_servo_driver_model,
            'main_servo_motor_model' => $json->main_servo_motor_model,
            'plc_input_model' => $json->plc_input_model,
            'plc_output_model' => $json->plc_output_model,
            'display_model' => $json->display_model,
            'smps' => $json->smps,
            'pallet_model' => $json->pallet_model,
            'piston_model' => $json->piston_model,
            'relay_board' => $json->relay_board,
            'cylinder_model' => $json->cylinder_model,
            'placer_cure_type' => $json->placer_cure_type,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model_id
        ];
        $affected_row = $this->model->update($id, $data);
        if($affected_row){
            return $this->respond($this->model->find($id));
        }
        else{
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
                        'success' => 'Machine details deleted successfully'
                    ]
                ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Machine details not found');
        }
    }
}
