<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierContactModel;
use App\Models\SupplierModel;

class SupplierContact extends BaseController
{
    
    public $data = [];

    protected $viewsFolder = '\App\Views\supplier_contact';

    public function __construct(){
        helper(['url', 'form']);
        $this->supplier = new SupplierModel();
        $this->supplierContact = new SupplierContactModel();
    }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if($data){
            return $this->respond($data);
        }
        else{
            return $this->failNotFound('Contact details not found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create($supplier=null)
    {
        $this->data['pageTitle'] = 'New Contact';
        $this->data['supplier'] = $this->supplier->where('id', $supplier)->first();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'add', $this->data);
        }else {
            $validation = $this->validate([
                'contact_name' => 'required',
                'contact_mobile' => 'required|numeric',
                'contact_alternate' => 'required',
                'contact_email' => 'required|valid_email',
                'contact_designation' => 'required'
            ]);
            if (!$validation) {
                return view($this->viewsFolder . '/' . 'add', $this->data, [$this->validator]);
            } else {
                $data = [
                    'supplier_id' => $supplier,
                    'name' => $this->request->getVar('contact_name'),
                    'contact_number' => $this->request->getVar('contact_mobile'),
                    // 'contact_alternate' => $this->request->getVar('contact_alternate'),
                    'email' => $this->request->getVar('contact_email'),
                    'designation' => $this->request->getVar('contact_designation'),
                    'notes' => $this->request->getVar('contact_remarks'),
                ];
                $result = $this->supplierContact->insert($data);
                return redirect()->to('supplier/'.$supplier.'/detail');
            }
        }

        $insert_id = $this->model->insert($data);
        if($insert_id){
            return $this->respondCreated($this->model->find($insert_id));
        }
        else{
            return $this->fail($this->model->errors(), 400);
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($supplier=null, $id=null)
    {
        $this->data['pageTitle'] = 'Edit Contact';
        $this->data['supplier'] = $this->supplier->where('id', $supplier)->first();
        $this->data['contact'] = $this->supplierContact->where('id', $id)->first();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'edit', $this->data);
        }
        $json = $this->request->getJSON();
        $data = [
            'id' => $id,
            'name' => $json->name,
            'contact_number' => $json->contact_number,
            'email' => $json->email,
            'designation' => $json->designation,
            'notes' => $json->notes,
            'supplier_id' => $json->supplier,
        ];
        $affected_row = $this->model->update($id, $data);
        if($affected_row){
            return $this->respond($this->model->find($id));
        }
        else{
            return $this->fail($this->model->errors(), 400);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if($data){
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'message' => [
                    'success' => 'Supplier contact deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Contact details not found');
        }
    }
}
