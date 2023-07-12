<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\FollowUpModel;

class FollowUp extends ResourceController{

    public function index()
    {
        $model = new FollowUpModel();
        $customer = $this->request->getVar('customer');
        $data = $model->where('customer_id', $customer)->find();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No followup found for customer');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new FollowUpModel();
        $data = $model->find($id);
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No followup found with id='.$id);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new FollowUpModel();
        
        $data = [
            'from_time' => $this->request->getVar('from_time'),
            'to_time' => $this->request->getVar('to_time'),
            'travelling_kms' => $this->request->getVar('travelling_kms'),
            'followup_date' => $this->request->getVar('followup_date'),
            'remarks' => $this->request->getVar('remarks'),
            'enquiry_id' => $this->request->getVar('enquiry'),
            'forward_id' => $this->request->getVar('forward'),
            'status_id' => $this->request->getVar('status')
        ];
        $insert_id = $model->insert($data);
        if($insert_id){
            $response = [
                'status' => 200,
                'error' => false,
                'message' =>  'Follow up details added successfully',
                'data' => $model->find($insert_id)
            ];
            return $this->respondCreated($response);
        }
        else{
            return $this->fail();
        }
    }
    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new FollowUpModel();

        $data = [
            'id' => $id,
            'from_time' => $this->request->getVar('from_time'),
            'to_time' => $this->request->getVar('to_time'),
            'travelling_kms' => $this->request->getVar('travelling_kms'),
            'followup_date' => $this->request->getVar('followup_date'),
            'remarks' => $this->request->getVar('remarks'),
            'enquiry_id' => $this->request->getVar('enquiry'),
            'forward_id' => $this->request->getVar('forward'),
            'status_id' => $this->request->getVar('status')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Follow up details added successfully'
        ];
        return $this->respondCreated($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new FollowUpModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Followup details deleted successfully'
            ];
            return $this->respondDeleted($response);
        }
    }
}
