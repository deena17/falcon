<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\ServiceCallModel;

class ServiceCall extends BaseController
{

    public $data = [];

    protected $viewsFolder = '\App\Views\customer\service_call';

    public function __construct()
    {
        $this->model = new ServiceCallModel();
    }

    public function index()
    {
        $this->data['pageTitle'] = 'Service Call List - Golden Falcon International Ltd.';
        $this->data['calls'] = $this->model->findAll();
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ServiceCallModel();
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
        $this->data['pageTitle'] = 'New Service Call';
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'add', $this->data);
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'serial_number' => $this->request->getVar('serial_number'),
            'installation_date' => $this->request->getVar('installation_date'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'call_date' => $this->request->getVar('call_date'),
            'call_time' => $this->request->getVar('call_time'),
            'person_name' => $this->request->getVar('person_name'),
            'contact_number' => $this->request->getVar('contact_number'),
            'nature_of_complaint' => $this->request->getVar('nature_of_complaint'),
            'service_type' => $this->request->getVar('service_type'),
            'remarks' => $this->request->getVar('remarks'),
            'status' => $this->request->getVar('status'),
            'is_combined_call' => $this->request->getVar('is_combined_call')
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Service call created successfully',
            'data' => $model->insert($insert_id)
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
        $model = new ServiceCallModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'serial_number' => $this->request->getVar('serial_number'),
            'installation_date' => $this->request->getVar('installation_date'),
            'expiry_date' => $this->request->getVar('expiry_date'),
            'call_date' => $this->request->getVar('call_date'),
            'call_time' => $this->request->getVar('call_time'),
            'person_name' => $this->request->getVar('person_name'),
            'contact_number' => $this->request->getVar('contact_number'),
            'nature_of_complaint' => $this->request->getVar('nature_of_complaint'),
            'service_type' => $this->request->getVar('service_type'),
            'remarks' => $this->request->getVar('remarks'),
            'status' => $this->request->getVar('status'),
            'is_combined_call' => $this->request->getVar('is_combined_call')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Service call updated successfully',
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
        $model = new ServiceCallModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Service call deleted successfully'
            ];
            $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No service call found');
        }
    }
}