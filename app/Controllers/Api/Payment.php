<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PaymentModel;

class Payment extends ResourceController{

    public function index()
    {
        $model = new PaymentModel();
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
        $model = new PaymentModel();
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
        $model = new PaymentModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'date' => $this->request->getVar('date'),
            'receipt_number' => $this->request->getVar('receipt_number'),
            'amount' => $this->request->getVar('amount'),
            'payment_mode' => $this->request->getVar('payment_mode'),
            'reference_number' => $this->request->getVar('reference_number'),
            'remarks' => $this->request->getVar('remarks'),
            'receipt' => $this->request->getVar('receipt')
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Payment created successfully',
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
        $model = new PaymentModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'date' => $this->request->getVar('date'),
            'receipt_number' => $this->request->getVar('receipt_number'),
            'amount' => $this->request->getVar('amount'),
            'payment_mode' => $this->request->getVar('payment_mode'),
            'reference_number' => $this->request->getVar('reference_number'),
            'remarks' => $this->request->getVar('remarks'),
            'receipt' => $this->request->getVar('receipt')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Payment updated successfully',
            'data' => $data,
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
        $model = new PaymentModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Payment deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No payment found with id = '.$id);
        }
    }
}
