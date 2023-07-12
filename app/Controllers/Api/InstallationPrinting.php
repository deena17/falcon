<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\InstallationPrintingModel;

class InstallationPrinting extends ResourceController{

    public function index()
    {
        $customer = $this->request->getVar('customer');
        $model = new InstallationPrintingModel();
        $data = $model->where('customer', $customer)->find();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $model = new InstallationPrintingModel();
        $data = $model->where('id', $id)->first();
        return $this->respond($data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new InstallationPrintingModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Printing machine details added successfully',
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
        $model = new InstallationPrintingModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Printing machine details updated successfully',
            'data' => $data
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
        $model = new InstallationPrintingModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Printing machine details deleted successfully',
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No machine details found with id = '.$id);
        }
    }
}
