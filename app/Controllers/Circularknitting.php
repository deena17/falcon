<?php

namespace App\Controllers\Masters;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;

class Circularknitting extends ResourceController{

    protected $modelName = 'App\Models\CircularKnittingModel';
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
            return $this->failNotFound('Circular knitting machine details not found');
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
            'dia' => $json->dia,
            'guage' => $json->guage,
            'number_of_feeders' => $json->number_of_feeders,
            'main_motor_model' => $json->main_motor_model,
            'main_driver_model' => $json->main_driver_model,
            'control_panel_model' => $json->control_panel_model,
            'take_up_type' => $json->take_up_type,
            'storage_type' => $json->storage_type,
            'quality_wheel' => $json->quality_wheel,
            'storage_belt_size' => $json->storage_belt_size,
            'main_motor_belt_size' => $json->main_motor_belt_size,
            'quality_wheel_gear_type' => $json->quality_wheel_gear_type,
            'quality_wheel_belt_size' => $json->quality_wheel_belt_size,
            'tools_and_accessories' => $json->tools_and_accessories,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model,

        ];
        $insert_id = $model->insert($data);
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
        $json= $this->request->getJSON();
        $data = [
            'id' => $id,
            'dia' => $json->dia,
            'guage' => $json->guage,
            'number_of_feeders' => $json->number_of_feeders,
            'main_motor_model' => $json->main_motor_model,
            'main_driver_model' => $json->main_driver_model,
            'control_panel_model' => $json->control_panel_model,
            'take_up_type' => $json->take_up_type,
            'storage_type' => $json->storage_type,
            'quality_wheel' => $json->quality_wheel,
            'storage_belt_size' => $json->storage_belt_size,
            'main_motor_belt_size' => $json->main_motor_belt_size,
            'quality_wheel_gear_type' => $json->quality_wheel_gear_type,
            'quality_wheel_belt_size' => $json->quality_wheel_belt_size,
            'tools_and_accessories' => $json->tools_and_accessories,
            'product_id' => $json->product,
            'product_model_id' => $json->product_model,
        ];
        $afftected_row = $this->model->update($id, $data);
        if($afftected_row){
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
