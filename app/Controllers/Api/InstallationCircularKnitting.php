<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\InstallationCircularKnittingModel;

class InstallationCircularKnitting extends ResourceController{

    public function index()
    {
        $model = new InstallationCircularKnittingModel();
        $customer = $this->request->getVar('customer');
        $data = $model->where('customer', $customer)->find();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No Installation Found');
    }

    public function show($id = null)
    {
        $model = new InstallationCircularKnittingModel();
        $data = $model->find($id);
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No installation found with id='.$id);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new InstallationCircularKnittingModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Circular Knitting machine details added successfully',
            'data' => $model->find($insert_id)
        ];
        return $this->respondCreated($response);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new InstallationCircularKnittingModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Circular Knitting machine details updated successfully'
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new InstallationCircularKnittingModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Circular Knitting machine details deleted successfully'
                ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No machine details found with id = '.$id);
        }
    }
}
