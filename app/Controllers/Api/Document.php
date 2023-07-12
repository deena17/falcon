<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DocumentModel;

class Document extends ResourceController{

    public function index()
    {
        $model = new DocumentModel();
        $customer = $this->request->getVar('customer');
        $data = $model->where('customer_id', $customer)->findAll();
        if($data)
            return $this->respond($data);
        return $this->failNotFound('No documents related to the customer');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new DocumentModel();
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
        $model = new DocumentModel();
        $data = [
            'customer_id' => $this->request->getVar('customer'),
            'name' => $this->request->getVar('name'),
            'url' => $this->request->getVar('url'),
            'attachment' => $this->request->getVar('attachment')
        ];
        $insert_id = $model->insert($data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Document created successfully',
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
        $model = new DocumentModel();
        $data = [
            'id' => $id,
            'customer_id' => $this->request->getVar('customer'),
            'name' => $this->request->getVar('name'),
            'url' => $this->request->getVar('url'),
            'attachment' => $this->request->getVar('attachment')
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => 'Document updated successfully',
            'data' => $model->find($id)
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
        $model = new DocumentModel();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Document deleted successfully'
            ];
            $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('No document found');
        }
    }
}
