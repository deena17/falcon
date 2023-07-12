<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\EnquiryModel;

class Enquiry extends ResourceController{

    public function index()
    {
        $model = new EnquiryModel();
        $data = $model->findAll();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No enquiries found');
    }

    public function enquiryByParams(){
        $customer = $this->request->getVar('customer');
        $user = $this->request->getVar('user');
        if($customer)
            $data = $model->where('customer_id', $customer)->findAll();
        if($user)
            $data = $model->where('user', $user)->findAll();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No enquiries found');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new EnquiryModel();
        $data = $model->find($id);
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No enquiry found');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new EnquiryModel();
        $data = [
            'enquiry_number' => $this->request->getVar('enquiry_number'),
            'enquiry_date' => $this->request->getVar('enquiry_date'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'landline' => $this->request->getVar('landline'),
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'area' => $this->request->getVar('area'),
            'distance' => $this->request->getVar('distance'),
            'website' => $this->request->getVar('website'),
            'marketting_reference' => $this->request->getVar('marketting_reference'),
            'from_time' => $this->request->getVar('from_time'),
            'to_time' => $this->request->getVar('to_time'),
            'travelling_kms' => $this->request->getVar('travelling_kms'),
            'remarks' => $this->request->getVar('remarks'),
            'followup_date' => $this->request->getVar('followup_date'),
            'department_id' => $this->request->getVar('department'),
            'forward_id' => $this->request->getVar('forward'),
            'status_id' => $this->request->getVar('status')
        ];
        $insert_id = $model->insert($data);
        if($insert_id){
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Enquiry details added successfully',
                'data' => $model->find($insert_id)
            ];
        return $this->respondCreated($response);
        }
        else{
            return $this->failNotFound('Unable to create');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new EnquiryModel();
        $data = [
            'id' => $id,
            'enquiry_number' => $this->request->getVar('enquiry_number'),
            'enquiry_date' => $this->request->getVar('enquiry_date'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
            'landline' => $this->request->getVar('landline'),
            'street' => $this->request->getVar('street'),
            'city' => $this->request->getVar('city'),
            'district' => $this->request->getVar('district'),
            'state' => $this->request->getVar('state'),
            'pincode' => $this->request->getVar('pincode'),
            'area' => $this->request->getVar('area'),
            'distance' => $this->request->getVar('distance'),
            'website' => $this->request->getVar('website'),
            'marketting_reference' => $this->request->getVar('marketting_reference'),
            'from_time' => $this->request->getVar('from_time'),
            'to_time' => $this->request->getVar('to_time'),
            'travelling_kms' => $this->request->getVar('travelling_kms'),
            'remarks' => $this->request->getVar('remarks'),
            'followup_date' => $this->request->getVar('followup_date'),
            'department_id' => $this->request->getVar('department'),
            'forward_id' => $this->request->getVar('forward'),
            'status_id' => $this->request->getVar('status')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Enquiry details updated successfully'
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
        $model = new EnquiryModel();
        $data = $model->find($id);
        if($data){
            $model.delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Enquiry details deleted successfully'
            ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Unable to delete enquiry details');
        }
    }
}
