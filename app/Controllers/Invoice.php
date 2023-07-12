<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\CustomerModel;

class Invoice extends BaseController
{
    public $data = [];

    protected $viewsFolder = '\App\Views\invoice';

    public function __construct()
    {
        helper(['url', 'form']);
        $this->model = new InvoiceModel();
        $this->customer = new CustomerModel();
    }

    public function index($customer)
    {
        $this->data['pageTitle'] = 'Invoice List';
        $this->data['invoices'] = $this->model->findAll();
        $this->data['customer'] = $this->customer->find($customer);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'list', $this->data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new InvoiceModel();
        $data = $model->where('id', $id)->first();
        return $this->respond($data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create($customer=null)
    {
        $this->data['pageTitle'] = 'New Invoice';
        if(!empty($customer))
            $this->data['customer'] = $this->customer->find($customer);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'create', $this->data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new InvoiceModel();
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
            'message' => 'Invoice updated successfully',
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
        $data = $model->find($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'Invoice deleted successfully'
            ];
            $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No invoice found');
        }
    }

    public function customerInvoice($customer= null)
    {
        $this->data['pageTitle'] = 'New Invoice';
        $this->data['customer'] = $this->customer->find($customer);
        return view($this->viewsFolder . DIRECTORY_SEPARATOR . 'create', $this->data);
    }
}