<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\InvoiceItemModel;

class InvoiceItem extends ResourceController{

    public function index()
    {
        $model = new InvoiceItemModel();
        return $this->respond($model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new InvoiceItemModel();
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
        $json = $this->request->getJSON();
        $model = new InvoiceItemModel();
        $data = [
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'unit_price' => $this->request->getVar('unit_price'),
            'total_price' => $this->request->getVar('total_price'),
            'currency_id' => $this->request->getVar('currency'),
            'invoice_id' => $this->request->getVar('invoice'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Item added successfully',
            'data' => $model->find($data)
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
        $json = $this->request->getJSON();
        $model = new InvoiceItemModel();
        $data = [
            'id' => $id,
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'unit_price' => $this->request->getVar('unit_price'),
            'total_price' => $this->request->getVar('total_price'),
            'currency_id' => $this->request->getVar('currency'),
            'invoice_id' => $this->request->getVar('invoice'),
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
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
        $model = new InvoiceItemModel();
        $data = $model->find($id);
        if($data){
            $model.delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Item deleted successfully'
            ];
        }
    }
}
