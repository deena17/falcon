<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductItemModel;

class ProductItems extends BaseController
{
    public $data = [];

    public function index()
    {
        $model = new ProductItemModel();
        $data = $model->findAll();
        return view('product_models/list');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new ProductItemModel();
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
        $product = new ProductModel();
        $model = new ProductItemModel();
        $this->data['product'] = $product->findAll();
        $data = [
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'currency_id' => $this->request->getVar('currency'),
            'unit_price' => $this->request->getVar('unit_price'),
            'total_price' => $this->request->getVar('total_price')
        ];

        return view('product_models/add', $this->data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new ProductItemModel();
        $data = [
            'id' => $id,
            'product_id' => $this->request->getVar('product'),
            'product_model_id' => $this->request->getVar('product_model'),
            'description' => $this->request->getVar('description'),
            'specification' => $this->request->getVar('specification'),
            'quantity' => $this->request->getVar('quantity'),
            'currency_id' => $this->request->getVar('currency'),
            'unit_price' => $this->request->getVar('unit_price'),
            'total_price' => $this->request->getVar('total_price')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Product item updated successfully',
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
        $model = new ProductItemModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Product item deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No item found');
        }
    }
}
