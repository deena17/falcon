<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CallModel;

class Call extends ResourceController
{
    public function index()
    {
        $model = new CallModel();

        $data = $model->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->fail('No records found');
        }
    }

    public function byCustomer($customer)
    {
        $model = new CallModel();
        $data = $model->where('customer_id', $customer)->find();
        if ($data) {
            return $this->respond($data);
        }
        return $this->fail('No records found');
    }

    public function show($id = null)
    {
        $model = new CallModel();
        $data = $model->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->fail('No records found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new CallModel();
        $data = [
            'customer_id' => $this->request->getVar('customer_id'),
            'call_date' => $this->request->getVar('call_date'),
            'call_time' => $this->request->getVar('call_time'),
            'description' => $this->request->getVar('description'),
            'call_type' => $this->request->getVar('call_type'),
            'related' => $this->request->getVar('related')
        ];
        $insert_id = $model->insert($data);
        if ($insert_id) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Call created successfully',
                'data' => $model->find($insert_id)
            ];
        } else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $model->errors()
            ];
        }

        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new CallModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer_id'),
            'call_date' => $this->request->getVar('call_date'),
            'call_time' => $this->request->getVar('call_time'),
            'description' => $this->request->getVar('description'),
            'call_type' => $this->request->getVar('call_type'),
            'related' => $this->request->getVar('related')
        ];
        $affected_row = $model->update($id, $data);
        if ($affected_row) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Call details updated successfully',
                'data' => $model->find($id)
            ];
        } else {
            $response = [
                'status' => 500,
                'error' => true,
                'message' => $model->errors()
            ];
        }
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new CallModel();
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' =>  'Call details deleted successfully',
            ];
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'message' =>  'No Call details found with id=' . $id,
            ];
        }
        $this->respondDeleted($response);
    }
}