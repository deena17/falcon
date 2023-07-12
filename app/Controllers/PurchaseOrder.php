<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PurchaseOrderModel;

class PurchaseOrder extends ResourceController
{

    public function index()
    {
        $model = new PurchaseOrderModel();
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
        $model = new PurchaseOrderModel();
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
        $model = new PurchaseOrderModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'invoice_number' => $this->request->getVar('invoice_number'),
            'invoice_date' => $this->request->getVar('invoice_date'),
            'due_date' => $this->request->getVar('due_date'),
            'status_id' => $this->request->getVar('status'),
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Purchase order created successfully',
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
        $model = new PurchaseOrderModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'invoice_number' => $this->request->getVar('invoice_number'),
            'invoice_date' => $this->request->getVar('invoice_date'),
            'due_date' => $this->request->getVar('due_date'),
            'status_id' => $this->request->getVar('status'),
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Purchase order updated successfully',
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
        $model = new PurchaseOrderModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Purchase order deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No invoice found');
        }
    }
}
