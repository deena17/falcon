<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SalesOrderItemModel;

class QuotationItem extends ResourceController
{

    public function index()
    {
        $model = new SalesOrderItemModel();
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
        $model = new SalesOrderItemModel();
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
        $model = new SalesOrderItemModel();
        $data = [
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'unit_of_measure' => $this->request->getVar('unit_of_measure'),
            'unit_price' => $this->request->getVar('unit_price'),
            'total_price' => $this->request->getVar('total_price'),
            'slaes_order_id' => $this->request->getVar('slaes_order')
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Item created successfully',
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
        $model = new SalesOrderItemModel();
        $data = [
            'id' => $id,
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'unit_of_measure' => $this->request->getVar('unit_of_measure'),
            'unit_price' => $this->request->getVar('unit_price'),
            'total_price' => $this->request->getVar('total_price'),
            'slaes_order_id' => $this->request->getVar('slaes_order')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Item updated successfully',
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
        $model = new SalesOrderItemModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Item deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No item found');
        }
    }
}
