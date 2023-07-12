<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SalesOrderModel;

class SalesOrder extends ResourceController{

    public function index(){
        $model = new SalesOrderModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null){
        $model = new SalesOrderModel();
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
        $model = new SalesOrderModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'order_number' => $this->request->getVar('order_number'),
            'order_date' => $this->request->getVar('order_date'),
            'due_date' => $this->request->getVar('due_date'),
            'status_id' => $this->request->getVar('status'),
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Sales Order created successfully',
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
        $model = new SalesOrderModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'order_number' => $this->request->getVar('order_number'),
            'order_date' => $this->request->getVar('order_date'),
            'due_date' => $this->request->getVar('due_date'),
            'status_id' => $this->request->getVar('status'),
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Sales Order updated successfully',
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
        $model = new SalesOrderModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Sales Order deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No sales order found');
        }
    }
}
