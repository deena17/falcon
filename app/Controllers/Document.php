<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DocumentModel;

use App\Models\CustomerModel;


class Document extends BaseController
{

    public $data = [];

    protected $session;

    protected $validation;

    protected $validationListTemplate = 'list';

    protected $viewsFolder = '\App\Views\document';

    public function __construct()
    {
        $this->model = new DocumentModel();
        $this->customer = new CustomerModel();
    }
    public function index($customer)
    {
        $this->data['pageTitle'] = 'Document List';
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
        $this->data['documents'] = $this->model->where('customer_id', $customer)->findAll();
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    public function show($id = null)
    {
        $model = new CallModel();
        $data = $model->find($id);
        if ($data) {
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Call details retrived successfully',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 404,
                'error' => true,
                'message' => 'Call details not found with id=' . $id,
            ];
        }
        return $this->respond($response);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create($customer)
    {
        $this->data['pageTitle'] = 'Add new document';
        $this->data['customer'] = $this->customer->where('id', $customer)->first();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'create', $this->data);
        }
        else{
            $rules = [
                'document_date' => 'required',
                'document_title' => 'required',
                'document_file' => [
                    
                ]
            ];
        }
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

    private function call_type($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('mst_call_type');        // 'mytablename' is the name of your table
        $builder->select('id', 'type');       // names of your columns
        $builder->where('id', $id);                // where clause
        $query = $builder->get();
        return $query();
    }
}