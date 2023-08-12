<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\InstallationEmbroideryModel;

class InstallationEmbroidery extends ResourceController{

    public $data = [];

    protected $viewsFolder = '\App\Views\installation\embroidery';

    protected $helpers = ['url', 'form'];

    public function index()
    {
        $model = new InstallationEmbroideryModel();
        $customer = $this->request->getVar('customer');
        $data = $model->where('customer_id', $customer)->find();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('Installations not found');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new InstallationEmbroideryModel();
        $data = $model->find($id);
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No Installation found with id='.$id);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new InstallationEmbroideryModel();

        $this->data['pageTitle'] = 'Add Embroidery';

        return view($this->viewsFolder .'/'.'add', $this->data);

        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Embroidery machine details added successfully',
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
        $model = new InstallationEmbroideryModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Embroidery machine details updated successfully'
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
        $model = new InstallationEmbroideryModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Embroidery machine details deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No machine details found with id = '.$id);
        }
    }
}
