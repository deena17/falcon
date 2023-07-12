<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ServiceModel;

class Service extends ResourceController{


    public function index()
    {
        $model = new ServiceModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ServiceModel();
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
        $model = new ServiceModel();
        $data = [
            'call_number_id' => $this->request->getVar('call_number'),
            'service_date' => $this->request->getVar('service_date'),
            'in_time' => $this->request->getVar('in_time'),
            'out_time' => $this->request->getVar('out_time'),
            'kilometer' => $this->request->getVar('kilometer'),
            'action_taken' => $this->request->getVar('action_taken'),
            'remarks' => $this->request->getVar('remarks'),
            'feature_expansion' => $this->request->getVar('feature_expansion'),
            'report_number' => $this->request->getVar('report_number'),
            'amount' => $this->request->getVar('amount'),
            'status' => $this->request->getVar('status'),
            'engineer_id' => $this->request->getVar('engineer'),
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Service created successfully',
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
        $model = new ServiceModel();
        $data = [
            'id' => $id,
            'call_number_id' => $this->request->getVar('call_number'),
            'service_date' => $this->request->getVar('service_date'),
            'in_time' => $this->request->getVar('in_time'),
            'out_time' => $this->request->getVar('out_time'),
            'kilometer' => $this->request->getVar('kilometer'),
            'action_taken' => $this->request->getVar('action_taken'),
            'remarks' => $this->request->getVar('remarks'),
            'feature_expansion' => $this->request->getVar('feature_expansion'),
            'report_number' => $this->request->getVar('report_number'),
            'amount' => $this->request->getVar('amount'),
            'status' => $this->request->getVar('status'),
            'engineer_id' => $this->request->getVar('engineer'),
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Service updated successfully'
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
        $model = new ServiceModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Service deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No service found');
        }
    }
}
