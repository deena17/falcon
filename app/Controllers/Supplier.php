<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\SupplierContactModel;

class Supplier extends BaseController
{
    public $data = [];

    protected $viewsFolder = 'App\Views\supplier';

    public function __construct(){
        helper(['url', 'form']);
        $this->ionAuth = new \App\Libraries\IonAuth();
        $this->engineer = $this->ionAuth->user()->row();
        $this->supplier = new SupplierModel();
        $this->supplierContact = new SupplierContactModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $this->data['pageTitle'] = 'List Supplier';
        $this->data['suppliers'] = $this->supplier->findAll();
        return view($this->viewsFolder.'/'.'list', $this->data);
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
            return $this->failNotFound('Supplier not found');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $this->data['pageTitle'] = 'New Supplier';
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            return view($this->viewsFolder.'/'.'add', $this->data);
        }
        else{
            $rules = [
                'name' => 'required',
                'vendor_code' => 'required',
                'email' => 'required',
                'address' => 'required',
                'city' => 'required',
            ];
            $validation = $this->validate($rules);
            if(!$validation){
                return view(
                    $this->viewsFolder.'/'.'add',
                    $this->data,
                    [$this->validator]
                );
            }
            else{
                $data = [
                    'name' => $this->request->getPost('name'),
                    'vendor_code' => $this->request->getPost('vendor_code'),
                    'office_number' => $this->request->getPost('office_number'),
                    'fax_number' => $this->request->getPost('fax_number'),
                    'email' => $this->request->getPost('email'),
                    'address' => $this->request->getPost('address'),
                    'city' => $this->request->getPost('city'),
                    'country' => $this->request->getPost('country'),
                    'zipcode' => $this->request->getPost('zipcode'),
                    'website' => $this->request->getPost('website'),
                ];
                $id = $this->supplier->insert($data);
                if($id){
                    return redirect()->to('supplier/list');
                }
                else{
                    
                }
            }
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {   
        $this->data['pageTitle'] = 'Update Supplier';
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->data['supplier'] = $this->supplier->where('id', $id)->first();
            return view($this->viewsFolder. '/' .'edit', $this->data);
        }
        else{
            $rules = [
                'name' => 'required',
                'vendor_code' => 'required',
                'email' => 'required',
                'address' => 'required',
                'city' => 'required',
            ];
            $validation = $this->validate($rules);
            if(!$validation){
                return view(
                    $this->viewsFolder.'/'.'edit',
                    $this->data,
                    [$this->validator]
                );
            }
            else{
                $data = [
                    'name' => $this->request->getPost('name'),
                    'vendor_code' => $this->request->getPost('vendor_code'),
                    'office_number' => $this->request->getPost('office_number'),
                    'fax_number' => $this->request->getPost('fax_number'),
                    'email' => $this->request->getPost('email'),
                    'address' => $this->request->getPost('address'),
                    'city' => $this->request->getPost('city'),
                    'country' => $this->request->getPost('country'),
                    'zipcode' => $this->request->getPost('zipcode'),
                    'website' => $this->request->getPost('website'),
                ];
                if($this->supplier->update($id,$data)){
                    return redirect()->to('supplier');
                }
            }
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
                    'success' => 'Supplier deleted successfully'
                ]
            ];
            return $this->respondDeleted($response);
        }
        else{
            return $this->failNotFound('Supplier not found');
        }
        
    }

    public function detail($id=null){
        $this->data['pageTitle'] = 'Supplier Detail';
        $this->data['supplier'] = $this->supplier->where('id', $id)->first();
        $this->data['contacts'] = $this->supplierContact->where('supplier_id', $id)->find();

        return view($this->viewsFolder.'/'.'detail', $this->data);
    }
}
