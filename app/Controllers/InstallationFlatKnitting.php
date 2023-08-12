<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\InstallationFlatKnittingModel;

class InstallationFlatKnitting extends BaseController{

    public $data = [];

    protected $viewsFolder = '\App\Views\installation\flatknitting';

    protected $helpers = ['url', 'form'];

    public function index()
    {
        $model = new InstallationFlatKnittingModel();
        $customer = $this->request->getVar('customer');
        $data = $model->where('customer_id', $customer)->find();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No installations found');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new InstallationFlatKnittingModel();
        $data = $model->find($id);
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No installation with id='.$id);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new InstallationFlatKnittingModel();
        $this->data['pageTitle'] = 'Add Flat Knitting';

        return view($this->viewsFolder .'/'.'add', $this->data);
    
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => true,
            'message' => 'Flat Knitting machine details added successfully',
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
        $model = new InstallationFlatKnittingModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'install_date' => $this->request->getVar('install_date'),
            'serial_number' => $this->request->getVar('serial_number'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'picture' => $this->request->getVar('picture'),
            'remarks' => $this->request->getVar('remarks'),
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
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Flat Knitting machine details updated successfully',
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
        $model = new InstallationFlatKnittingModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Flat Knitting machine details deleted successfully'
                ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No machine details found with id = '.$id);
        }
    }
}
